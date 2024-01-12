<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\User;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        //$this->middleware('guest:admin')->except('logout');
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        $username = $request->input($this->username());
    
        // Check if the username exists in the database
        $user = User::where($this->username(), $username)->first();
    
        if (!$user) {
            return redirect()->route('register')
                ->withErrors([
                    'name' => trans('global.no_user_record'),
                ])
                ->withInput($request->only($this->username()));
        }
    
        return redirect()->route('login')
            ->withErrors([
                'password' => trans('global.password'),
            ])
            ->withInput($request->only($this->username(), 'remember'));
    }    

    public function username()
    {
        return 'name';
    }
}
