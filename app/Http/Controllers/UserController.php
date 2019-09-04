<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\User;
class UserController extends Controller
{

    public function createUser()
    {
        return view('user.create-user');
    }
    public function addAdmin(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'username' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|confirmed',
            'role' => 'required'
        ]);
        if ($validate->passes()) {
            $addAdmin = new User();
            $addAdmin->username = $request->username;
            $addAdmin->email = $request->email;
            $addAdmin->role = $request->role;
            $addAdmin->password = Hash::make($request->password);
            $addAdmin->save();
            return response()->json(['successMsg' => 'New Admin Created Successfully :)']);
        }else{
           
            return response()->json(['errorMsg'=> $validate->errors()->all()]);
            
        }
    }
    
}
