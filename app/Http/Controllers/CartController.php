<?php

namespace App\Http\Controllers;

use App\Course;
use App\User;
use App\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CartController extends Controller
{
    public function create(Course $course)
    {
        $breadcrumb = "Enroll in $course->name course";

        return view('enrollment.enroll', compact('course', 'breadcrumb'));
    }

    public function store(Request $request, Course $course)
    {
        if(auth()->guest())
        {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
            ]);

            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
            ]);

            auth()->login($user);
        }
       
            $course->cart()->create(['user_id' => auth()->user()->id]);
            return redirect()->route('cart.myCart');
    }

    public function handleLogin(Course $course)
    {
        return redirect()->route('cart.create', $course->id);
    }

    public function myCart()
    {
        $breadcrumb = "My Cart";

        $userEnrollments = auth()->user()
            ->cart()
            ->with('course.institution')
            ->orderBy('id', 'desc')
            ->paginate(6);

        return view('enrollment.cart', compact(['breadcrumb', 'userEnrollments']));
    }

    public function deleteAndTransfer()
    {
        $enrollments = Cart::all();

        foreach ($enrollments as $enrollment) {
            Enrollment::create([
                'course_id' => $enrollment->course_id,
                'user_id' => $enrollment->user_id,
            ]);
        }
        Cart::truncate();
        return redirect()->back()->with('success', 'Enrollments have been deleted and transferred successfully.');
    }

}