<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    /* Home Page showing all products */
    public function index() {

        return 'home';

    }

    /* Detail Page showing a specified product's details */
    public function show() {

        return 'detail';

    }

    /* Page showing all products belonging to a category */
    public function productByCategory() {

        return 'Product By Category';
    }






}
