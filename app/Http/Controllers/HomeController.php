<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class HomeController extends Controller
{
    public function index() {
        $products = Product::take(4)->get();
        
        return view('home.index', [
            'title' => 'seduhin kopi bareng',
            'products' => $products
        ]);
    }
}
