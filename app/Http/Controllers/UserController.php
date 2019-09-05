<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\User;
class UserController extends Controller
{

    public function createUser()
    {
        if (Auth::user()->role == 1) {
            return view('user.create-user');
        }else {
            abort(403);
        }
        
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
            if (Auth::user()->role == 1) {
            $addAdmin->username = $request->username;
            $addAdmin->email = $request->email;
            $addAdmin->role = $request->role;
            $addAdmin->password = Hash::make($request->password);
            $addAdmin->save();
            return response()->json(['successMsg' => 'New Admin Created Successfully :)']);
            }
            
        }else{
            return response()->json(['errorMsg'=> $validate->errors()->all()]);
        }
    }
    public function showProfile()
    {
        return view('users-profile.user-profile-details');
    }
    public function changePasswordForm()
    {
        return view('user.change-password');
    }
    public function changePassword(Request $request){

        $valid = Validator::make($request->all(),
            [
                'old_password' => 'required',
                'password' => 'required|confirmed'
            ] 
        );

        $HastedPassword = Auth::user()->password;

        $checkOldPassword = Hash::check($request->old_password, $HastedPassword);
        if ($valid->passes()) {
            if ($checkOldPassword) {
                if (!Hash::check($request->password, $HastedPassword)) {
                    $changePassword = User::find(Auth::user()->id);
                    $changePassword->password = Hash::make($request->password);
                    $changePassword->save();
                    return response()->json(['successMsg' => 'Password changed successfully :)']);
                      
                }else {
                    return response()->json(['errorMsg' => 'Old password and new password are same :)']);
                }

            }else {
                return response()->json(['errorMsg' => 'Old password does not match :)']); 
            }

        }else {
            
            return response()->json(['errorMsg' => $valid->errors()->all()]);
        }
        
        


    }
}
