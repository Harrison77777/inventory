<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Customer;
class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::select(['id', 'name', 'address', 'email', 'phone', 'shop_or_company'])->get();
        return view('customer.all_customer', ['customers' => $customers]);
       
    }

    public function create()
    {
        return view('customer.create');
    }
    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'name' => 'required',
            'email' => 'required|email|unique:customers,email',
            'phone' => 'required',
            'shop_or_company' => 'required',
            'address' => 'required',
            
            
        ]);
      
        if ($validator->passes()) {
            $customer = new Customer();
            $customer->name = $request->name;
            $customer->email =strtolower($request->email);
            $customer->phone = $request->phone;
            $customer->shop_or_company = $request->shop_or_company;
            $customer->address = $request->address;
            $customer->bank_account = $request->bank_account;
            $customer->bank_holder = $request->bank_holder;
            $customer->bank_branch = $request->bank_branch;
            $customer->save();
            return response()->json(['successMsg'=> 'Customer created successfully.:)']);
        }else{
            return response()->json(['errorMsg'=> $validator->errors()->all()]);
        }
    }
    public function details($customerId)
    {   
        $customer = Customer::where('id', $customerId)->firstOrFail();
        return view('customer.details', compact('customer'));
    }
    public function delete($customerId)
    {   
        $customer = Customer::find($customerId);
        $customer->delete();
        \session()->flash('successMsg', 'Successfully you have deleted a customer :)');
        return redirect()->back();
    }
}
