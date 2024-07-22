<?php

namespace App\Http\Controllers;

use App\Models\Panier;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PanierController extends Controller
{
    public function index() {
    // list all products in the basket
        $paniers = Panier::where('user_id', auth()->user()->id)
                            ->get();
    // calculate total price of all products
        $totalPrice = 0;

            foreach ($paniers as $panier) {
                $totalPrice += $panier->quantite * $panier->product->price;
            }
    
        return view('panier.lister', compact('paniers', 'totalPrice'));
    }

    public function ajouter(Product $product) {
    // search  product in user cart 
       $existProduct = Panier::where('user_id','=' ,auth()->user()->id)
                                ->where ('product_id' , '=' ,$product->id)
                                ->first() ; 
        // dd($existProduct);

        //dd(empty($existProduct)) ; 

    // if product exist update quantities
        //if($existProduct->count() > 0) {
        if(isset($existProduct)){

        $existProduct->quantite = $existProduct->quantite + 1 ; 
        $existProduct->save() ;

    // else add the product 
        }else{

            Panier::create([ 
                'user_id' => auth()->user()->id,
                'product_id' => $product->id]) ;
            }
            
            return  redirect()->route('panier.lister') ;
        }
        
    // remove one product from quantity in the cart
    public function removeOne(Panier $panier)
    {

        if ($panier->quantite == 1) {
            $panier->delete();
        } else {
            $panier->quantite -= 1;
            $panier->save();
        }
        return back();
    }

    // delete a specified product from cart clicking on an icon
    public function removeAll(Panier $panier)
    {
        $panier->delete();
        return back();
    }

    // empty all products from basket
    public function emptyBasket()
    {
        $paniers = Panier::where('user_id', '=', auth()->user()->id)
                            ->get();

        foreach ($paniers as $panier) {
            $panier->delete();
        }

        return back();
    }
        
            
public function commander() 
{
    $paniers = Panier::where('user_id', auth()->user()->id)
                        ->get();

    

    return "commander";
}


}