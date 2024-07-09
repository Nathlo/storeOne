<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    /* Home Page showing all products */
    public function index() {

        $categories = Category::all();
        // dd($categories);
        $products = Product::orderBy('id', 'desc')->paginate(8);
        // dd( $products);

        return view('product.products', compact('categories', 'products'));
    }

    /* Detail Page showing a specified product's details */
    public function show(Product $product) {

        /* Display products from similar category */
        $products = Product::where('category_id', $product->category_id)
                    ->inRandomOrder()
                    ->limit(4)
                    ->get();
        
        // dd($products);

        return view( 'product.show', compact('product', 'products') );
    }

    /* Page showing all products from same category */
    public function productByCategory($id) {

        $categories = Category::all();
        // Filtering products from a category
        $products = Product::where('category_id', $id)
                            ->orderBy('id', 'desc')
                            ->paginate(8);
        
        return view('product.products', compact('categories', 'products'));
    }






}
