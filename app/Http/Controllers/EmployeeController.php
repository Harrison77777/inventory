<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;
use App\Employe;

class EmployeeController extends Controller
{
    public function index(){
        $employees = Employe::select(['id', 'name', 'email', 'city', 'address','photo', 'phone', 'experience', 'salary'])->get();
        return view('employees.index', compact('employees'));
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
                $create->email = strtolower($request->email);
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

    public function details($employeeId)
    {
        $id = Crypt::decrypt($employeeId);
        if ($id) {
            $employee = Employe::find($id);
            return view('employees.details', compact('employee')); 
        }else{
            return redirect()->back();
        }
    }

    public function edit($employeeId)
    {
        $employee = Employe::where('id', $employeeId)->firstOrFail();
        return view('employees.edit', compact('employee'));
    }

    public function update(Request $request, $employeeId)
    {
       
       $validate = Validator::make($request->all(),
       [
            'name' => 'required',
            'city' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'salary' => 'required',
            'experience' => 'required',
       ]
    );
    $employee = Employe::find($employeeId);
    if ($validate->passes()) {
        $employee->name = $request->name;
        $employee->city = $request->city;
        $employee->phone = $request->phone;
        $employee->address = $request->address;
        $employee->salary = $request->salary;
        $employee->save();

        return response()->json(['successMsg'=> 'Employee information updated successfully']);

    }else {
       return response()->json(['errorMsg'=> $validate->errors()->all()]);
    }
    
    
    }

    public function delete($employeeId)
    {
        $employee = Employe::find($employeeId);
        $employee->delete();
        return \redirect()->back();
    }


}
