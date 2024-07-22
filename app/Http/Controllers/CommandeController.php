<?php

namespace App\Http\Controllers;

use App\Models\Panier;
use App\Models\Commande;
use App\Models\CommandeItem;
use Illuminate\Http\Request;

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

        if(count($paniers) == 0) { return 'vide' ;}

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


        return 'commander';

    }



}
