<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function showLoginForm()
    {
       
            return view('auth.login');
            
            
    }
    protected function validateLogin(Request $request)
    {
        return $request->validate([
            'email' => ['required','email'],
            'password' => ['required'],
        ]);
    }
    public function login(Request $request)
    {

        $this->validateLogin($request);
        
        $user = User::where('email', $request->email)->first();
        if ($user) {
            if (Auth::guard()->attempt(['email'=>$request->email, 'password' => $request->password])) {
                return redirect()->intended(route('dashboard'));
            }else {
                session()->flash('errorMsg', 'Email or Password not matched!');
                return redirect()->back();
            }  
        }else{
            session()->flash('errorMsg', 'Email or Password not matched!');
            return redirect()->back();
        }
        
    }
}
