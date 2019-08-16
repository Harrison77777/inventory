<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Supplier;

class SupplierController extends Controller
{
    public function index()
    {   $suppliers = Supplier::select('id', 'name', 'email', 'phone', 'type', 'payment_way', 'photo')->get();
        return view('suppliers.index', compact('suppliers'));
    }
    public function create()
    {   
        return view('suppliers.create');
    }
    public function store(Request $request)
    {   
        $validator = Validator::make($request->all(), 
        [
            'name' => 'required',
            'email' => 'required|email|unique:suppliers,email',
            'phone' => 'required',
            'address' => 'required',
            'type' => 'required',
            'payment_way' => 'required',
            'shop_address' => 'required',
            'photo' => 'sometimes|image',

        ]);
        $photo = $request->file('photo');
        if ($validator->passes()) {
            if ($request->hasFile('photo')) {
               $photoName = \uniqid().'.'. $photo->getClientOriginalExtension();
               $resizePhoto = Image::make($photo)->resize(500, 450)->save($photoName);
               if (!Storage::disk('public')->exists('supplier')) {
                   Storage::disk('public')->makeDirectory('supplier');
               }
               Storage::disk('public')->put('supplier/'.$photoName,$resizePhoto);
               $createSupplier = new Supplier();
               $createSupplier->name = $request->name;
               $createSupplier->email = $request->email;
               $createSupplier->phone = $request->phone;
               $createSupplier->address = $request->address;
               $createSupplier->type = $request->type;
               $createSupplier->payment_way = $request->payment_way;
               $createSupplier->shop_address = $request->shop_address;
               $createSupplier->photo = $photoName;
               $createSupplier->save();
               return \response()->json(['successMsg'=> 'Supplier Added Successfully :)']);
            }else{
                $createSupplier = new Supplier();
                $createSupplier->name = $request->name;
                $createSupplier->email = $request->email;
                $createSupplier->phone = $request->phone;
                $createSupplier->address = $request->address;
                $createSupplier->type = $request->type;
                $createSupplier->payment_way = $request->payment_way;
                $createSupplier->shop_address = $request->shop_address;
                $createSupplier->save(); 
                return \response()->json(['successMsg'=> 'Supplier Added Successfully :)']);
            }
        }else{
            return \response()->json(['errorMsg'=> $validator->errors()->all()]);
        }
    }
    public function details($supplierId)
    {   $supplier = Supplier::where('id', $supplierId)->firstOrFail();
        return view('suppliers.details', compact('supplier'));
    }
    public function delete($supplierId)
    {   
        $supplier = Supplier::find($supplierId);
        if ($supplier->photo == "default.png") {
            $supplier->delete();
            session()->flash('successMsg', 'Successfully you have deleted a supplier :)');
            return redirect()->back();
        }elseif (Storage::disk('public')->exists('supplier/'.$supplier->photo)) {
            Storage::disk('public')->delete('supplier/'.$supplier->photo);
            $supplier->delete();
            session()->flash('successMsg', 'Successfully you have deleted a supplier :)');
            return redirect()->back();
        }
       
    }
    public function edit($supplierId)
    {
        $supplier = Supplier::where('id', $supplierId)->firstOrFail();
        return view('suppliers.edit', compact('supplier'));
    }
    public function update(Request $request, $supplierId)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'shop_address' => 'required',
            'payment_way' => 'required',
            'photo' => 'sometimes|image',
        ]);
        
        $photo = $request->file('photo');
        $supplier = Supplier::find($supplierId);
        if ($request->hasFile('photo')) {
            $photoName = \uniqid().'.'. $photo->getClientOriginalExtension();
            $resizePhoto = Image::make($photo)->resize(500, 450)->save($photoName);
            if (!Storage::disk('public')->exists('supplier')) {
                Storage::disk('public')->makeDirectory('supplier');
            }
            if ($supplier->photo == 'default.png') {
                Storage::disk('public')->put('supplier/'.$photoName,$resizePhoto);
            }else {
                Storage::disk('public')->delete('supplier/'.$supplier->photo);
                Storage::disk('public')->put('supplier/'.$photoName,$resizePhoto);
            }
            $supplier->name = $request->name;
           
            $supplier->phone = $request->phone;
            $supplier->address = $request->address;
            $supplier->type = $request->type;
            $supplier->payment_way = $request->payment_way;
            $supplier->shop_address = $request->shop_address;
            $supplier->photo = $photoName;
            $supplier->save();
            session()->flash('successMsg','Supplier Information Updated Successfully :)');
            return \redirect()->back();
         }else{
             
             $supplier->name = $request->name;
             
             $supplier->phone = $request->phone;
             $supplier->address = $request->address;
             $supplier->type = $request->type;
             $supplier->payment_way = $request->payment_way;
             $supplier->shop_address = $request->shop_address;
             $supplier->save(); 
             session()->flash('successMsg','Supplier Information Updated Successfully :)');
             return \redirect()->back();
         }
        
       

        
    }
}
