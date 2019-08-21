<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;    
class PosController extends Controller
{
    public function index(){
        $products = Product::latest()->get();
        return view('pos.index', compact('products'));

    }
}
