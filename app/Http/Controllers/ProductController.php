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
        $products = Product::orderBy('id', 'desc')->paginate(10);
        // dd( $products);

        return view('product.products', compact('categories', 'products'));

    }

    /* Detail Page showing a specified product's details */
    public function show() {

        return view('product.show');

    }

    /* Page showing all products belonging to a category */
    public function productByCategory() {

        return 'Product By Category';
    }






}
