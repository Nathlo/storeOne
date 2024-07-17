<?php

namespace App\Http\Controllers;

use App\Models\Panier;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PanierController extends Controller
{
    public function index() {
        

        return 'liste';
    }

    public function ajouter(Product $product) {

        // dd($product);
        Panier::create([
            'user_id' => auth()->user()->id,
            'product_id' => $product->id]);
        
        return 'ajouter';
    }

    public function commander() {

        return 'commander';
    }



}
