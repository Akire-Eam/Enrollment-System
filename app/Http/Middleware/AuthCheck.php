<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\User;
use App\Role;
use Closure;
use Session;

class AuthCheck
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    // protected function redirectTo($request)
    // {
    //     if (! $request->expectsJson()) {
    //         return route('login');
    //     }
    // }
    public function handle(Request $request, Closure $next): Response
    {
        if(!Session()->has('loginId')){
            return redirect('login')->with('fail', 'You have to login first.');
        }
        else if(Session()->has('loginId')){
            $info = User::where('user_id', '=', Session::get('loginId'))-> first();
            $role = User::join('role_user', 'role_user.user_id', '=', 'users.user_id')
                        ->where('users.user_id', '=', Session::get('loginId'))
                        ->get('role_user.role_id');
            $roled = Role::where('user_id', '=', Session::get('loginId')) -> first();
            //Yung Role na model ata di pa naka-use -> nilagay ko na
            //tanggal muna nasa baba?
            //tama ba yung role id? oo role id is role_id 
            //request url nga
            //if(url('account/buyer') == $request -> url() && $info -> roleid == 1)
            /*if(url('/home') == $request -> url() && $roled ->role_id == 3){
                return redirect('home');
            }
            else if(url('/home') == $request -> url()){
                return redirect('admin.home');
            }*/
            if($roled ->role_id == 3){
                //url('/home') yung dashboard ni admin
                //return back();
                // return redirect('home');
                //3 si user 1 si admin 
                //echo 'You are not an admin';
                return redirect('home');

            }
            return $next($request);
        }
    }
}

