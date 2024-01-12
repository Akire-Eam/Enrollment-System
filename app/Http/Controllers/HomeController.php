<?php

namespace App\Http\Controllers;

use App\Course;
use App\Institution;
use Gate;

class HomeController extends Controller
{
    public function index()
    {
        if(Gate::denies('role_access')){
            $newestCourses = Course::orderBy('id', 'desc')->take(3)->get();
            $randomInstitutions = Institution::inRandomOrder()->get();
            return view('home', compact(['newestCourses', 'randomInstitutions']));
        }
        return view('admin.home');
        
    }
    public function dashboard()
    {
        if(Gate::denies('role_access')){
            $newestCourses = Course::orderBy('id', 'desc')->take(3)->get();
            $randomInstitutions = Institution::inRandomOrder()->get();
            return redirect() -> route('home');
        }
        $newestCourses = Course::orderBy('id', 'desc')->take(3)->get();
        $randomInstitutions = Institution::inRandomOrder()->get();
        return view('home', compact(['newestCourses', 'randomInstitutions']));
        
    }
}
