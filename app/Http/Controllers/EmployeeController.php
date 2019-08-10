<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Employe;

class EmployeeController extends Controller
{
    public function index(){
        
        return view('employees.index');
    }
    public function create(){
        
        return view('employees.create');
        
    }
    public function store(Request $request){
        
        $validate = Validator::make($request->all(),[
            'photo' => 'required|image',
            'city' => 'required',
            'salary' => 'required',
            'experience' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:employes,email',
            'name' => 'required',
            ]);
            $photo = $request->file('photo');
        if ($validate->passes()) {
           if ($request->hasFile('photo')) {
                $uniquePhoto = uniqid().'.'.$photo->getClientOriginalExtension();
                $resizePhoto = Image::make($photo)->resize(600, 600)->save($uniquePhoto);
                if (!Storage::disk('public')->exists('employeesPhoto')) {
                    Storage::disk('public')->makeDirectory('employeesPhoto');
                }
                Storage::disk('public')->put('employeesPhoto/'.$uniquePhoto,$resizePhoto);
                $create = new Employe();
                $create->name = $request->name;
                $create->email = $request->email;
                $create->phone = $request->phone;
                $create->address = $request->address;
                $create->experience = $request->experience;
                $create->city = $request->city;
                $create->salary = $request->salary;
                $create->photo = $uniquePhoto;
                $create->save();
                return \response()->json(['successMsg'=> 'Employee added successfully..']);
           }
        }else{
            return \response()->json(['errorMsg'=> $validate->errors()->all()]);
        }

        
    }


}
