<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Category;
use App\Supplier;
use App\Product;
class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('supplier', 'category')
        ->select(['id', 'name', 'category_id', 'supplier_id', 'vendor_price', 'photo', 'brand', 'storage_no', 'quantity', 'price'])
        ->get();
        return view('product.index', compact('products'));
    }
    public function create()
    {
        $categories = Category::select([ 'id', 'name'])->get();
        $suppliers = Supplier::select([ 'id', 'name'])->get();
        return view('product.create', compact('categories', 'suppliers'));
    }
    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:products,name',
            'brand' => 'required',
            'vendor_price' => 'required',
            'price' => 'required',
            'storage_no' => 'required',
            'photo' => 'required|image',
            'supplier_id' => 'required',
            'category_id' => 'required',
            'quantity' => 'required',
        ],[
            'supplier_id.required' => 'Supplier name field must not be empty.',
            'category_id.required' => 'Category name field must not be empty.'
        ]);
        $photo = $request->file('photo');
        if ($validator->passes()) {
            if ($request->hasFile('photo')) {
                $photoName = \uniqid().'.'. $photo->getClientOriginalExtension();
                $resizePhoto = Image::make($photo)->resize(700, 700)->save($photoName);
                if (!Storage::disk('public')->exists('product')) {
                    Storage::disk('public')->makeDirectory('product');
                }
                Storage::disk('public')->put('product/'.$photoName,$resizePhoto);
                $createProduct = new product();
                $createProduct->name = $request->name;
                $createProduct->brand = $request->brand;
                $createProduct->vendor_price = $request->vendor_price;
                $createProduct->price = $request->price;
                $createProduct->storage_no = $request->storage_no;
                $createProduct->quantity = $request->quantity;
                $createProduct->supplier_id = $request->supplier_id;
                $createProduct->category_id = $request->category_id;
                $createProduct->photo = $photoName;
                $createProduct->save();
                return \response()->json(['successMsg'=> 'Product Added Successfully :)']);
             }
        }else {
            return \response()->json(['errorMsg'=> $validator->errors()->all()]);
        }
        
    }
    public function delete($proId)
    {
        $delProduct = Product::find($proId);
        if (Storage::disk('public')->exists('product/'.$delProduct->photo)) {
            Storage::disk('public')->delete('product/'.$delProduct->photo);
        }
        $delProduct->delete();
        session()->flash('successMsg', 'Product deleted successfully..:)');

        return \redirect()->back();
    }
    public function details($proId)
    {
        $product = Product::where('id', $proId)->firstOrFail();
        return view('product.details', compact('product'));
    }
}
