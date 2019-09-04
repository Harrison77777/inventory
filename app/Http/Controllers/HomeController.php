<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Product;
use App\Category;
use App\Employe;
use App\Supplier;
class HomeController extends Controller
{
  
  public function index(){
    $countProducts = Product::all()->count();
    $countCategories = Category::all()->count();
    $countBrands = Product::select('brand')->distinct()->get();
    $brandCount = $countBrands->count();
    $countSupplier = Supplier::all()->count();
    $countEmployees = Employe::all()->count();
      return view('dashboard.index', compact('countProducts', 'countCategories', 'brandCount', 'countSupplier', 'countEmployees'));
  }

 

}
