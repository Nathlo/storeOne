<?php

namespace App\Http\Controllers;

use App\Models\Panier;
use App\Models\Commande;
use App\Models\CommandeItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class CommandeController extends Controller
{

// display list of orders
    public function index() {

        $commandes = Commande::where('user_id', auth()->user()->id)->orderBy('id', 'desc')->get();

        return view('commande.lister', compact('commandes') );
    }


// create an order and add products from cart
    public function create() {

        // read products in cart
        $paniers = Panier::where('user_id', auth()->user()->id)->get();
        // dd($paniers);
        // dd($commande->id);

        if(count($paniers) == 0) { return 'vide' ;} // if cart empty then notify user

        $commande = Commande::create([
            'user_id'=> auth()->user()->id,
            'numero' => 0,
            'total' => 0
        ]);


        $total = 0;
        foreach ($paniers as $panier) {
            
            $commandeId = $commande->id;        // order ID
            $productId = $panier->product_id;  // product ID
            $quantite = $panier->quantite;     // product quantity
            $price = $panier->product->price;   // product price
            $total += $price * $quantite; 

            // insert in CommandeItem Tab
            CommandeItem::create([
                'commande_id' => $commandeId,
                'product_id' => $productId,
                'quanntite' => $quantite,
                'price' => $price
            ]);

            // dd($total);

        }
        
        // update order with price calculated
        $commande->update(['numero' => 9999, 'total' => $total]);
        $commande->save();

        // empty basket
        Panier::where('user_id', auth()->user()->id)->delete();

        $urlPaiement = $this->stripeCheckout($total, $commande->id);

        return redirect ($urlPaiement);

    }

// create payment session response
    public function stripeCheckout($total, $commandeId)
    {
        // API setting up
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        // url payment confirmation
        $redirectUrl = route('commande.success') . '?session_id={CHECKOUT_SESSION_ID}';
        
        // payment session creations
        $response =  $stripe->checkout->sessions->create([
            'success_url' => $redirectUrl,
            'payment_method_types' => ['link', 'card'],
            'customer_email' => auth()->user()->email,
            'client_reference_id' => $commandeId,
            'line_items' => [
                [
                    'price_data'  => [
                        'product_data' => [
                            'name' => $commandeId,
                        ],
                        'unit_amount'  => 100 * $total,
                        'currency'     => 'EUR',
                    ],
                    'quantity'    => 1
                ],
            ],
            'mode' => 'payment',
            'allow_promotion_codes' => false
        ]);

        // generate payment url
        return $response['url'];
    }


// check and confirm payment is successfull
    public function success(Request $request) {

        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

        $session = $stripe->checkout->sessions->retrieve($request->session_id);
        // dd(info($session));
        // dd($session);

        // info ($session->payment_intent);
        if($request->objet == 'checkout.session' &&
                $request->payment_status === 'paid' &&
                $request->status === 'complete') {

            $commande =Commande::find($request->client_reference_id);

            $commande->update(['numero' => $request->payment_intent]);
            $commande->save();
        }

        // return 'success';
        return redirect(route('commande.lister'));
    }

// webhook to get Stripe notifications
    public function webhook(Request $request) {

        // dd($request);
        return 'ok';
    }

}
