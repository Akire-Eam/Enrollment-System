<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request; 
//use Illuminate\Support\Facades\Auth; 
use Gate;
//use Response; okaay na?? ithink
use Symfony\Component\HttpFoundation\Response;

//use Auth;
class HomeController
{
    public function index()
    {
        abort_if(Gate::denies('role_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.home');
    }
}
