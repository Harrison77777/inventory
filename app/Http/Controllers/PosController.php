<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;    
use App\PrepareProduct;    
use App\ConfirmProduct;    
use App\BuyerCustomer;    
class PosController extends Controller
{
    public function index(){
        $products = Product::latest()->get();
        return view('pos.index', compact('products'));

    }
    public function prepareProductToSale(Request $request){
        $productId = $request->productId;
        $checkDuplicateProduct = PrepareProduct::where('product_id', $productId)->get();
        if ($checkDuplicateProduct->count() > 0) {
            return \response()->json(['errorMsg' => 'This product already added in selling point.']);
        }else {
            $prepareProduct = new PrepareProduct();
            $prepareProduct->product_id = $productId;
            $prepareProduct->quantity = 1;
            $prepareProduct->save();
            return \response()->json(['successMsg' => 'Successfully product added in point of sale.']);
        }
    }
    public function getAllPrepareProducts(){

        $prepareProducts = PrepareProduct::with(['product', 'product.category'])->where('status', 1)->get();
        return \response()->json(['prepareProducts'=>$prepareProducts]);
    }
    public function updateQuantity(Request $request){
        $id = $request->id;
        $updateQuantity = PrepareProduct::find($id);
        if ($request->qty < 1) {
            $updateQuantity->delete(); 
        }else{
            $updateQuantity->quantity = $request->qty;
            $updateQuantity->save();
        }
        

        return \response()->json(['successMsg'=> 'Quantity updated successfully']);
    }
   public function deleteProFromPos(Request $request){

    $proId = $request->proId;
    $deleteProFromPos = PrepareProduct::find($proId);
    $deleteProFromPos->delete();
    // return response()->json(['successMsg'=> $request->proId]);
     return response()->json(['successMsg'=> 'Successfully product deleted form point of sale']);
   }
   public function confirmProduct(Request $request){
    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'address' => 'required'
    ]);
    date_default_timezone_set('Asia/Dhaka');
    $addBuyer_customer = new BuyerCustomer();
    $addBuyer_customer->name = $request->name;
    $addBuyer_customer->email = $request->email;
    $addBuyer_customer->address = $request->address;
    $addBuyer_customer->date = date('d-m-Y');
    $addBuyer_customer->month = date('F');
    $addBuyer_customer->year = date('Y');
    $addBuyer_customer->save();
    $prepareProducts = PrepareProduct::where('status', 1)->get();
    foreach ($prepareProducts as  $product) {
        $addConfirmProducts = new ConfirmProduct();
        $addConfirmProducts->product_id = $product->product_id;
        $addConfirmProducts->buyer_customer_id = $addBuyer_customer->id;
        $addConfirmProducts->quantity = $product->quantity;
        $addConfirmProducts->date = date('d-m-Y');
        $addConfirmProducts->month = date('F');
        $addConfirmProducts->year = date('Y');
        $addConfirmProducts->save();
    }
    foreach ($prepareProducts as $key => $delPro) {
        $delPro->delete(); 
    }
    return \redirect()->back();
   }
}
