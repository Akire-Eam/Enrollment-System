<?php

namespace App\Http\Controllers;

use App\Course;
use App\User;
use App\Cart;
use App\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EnrollmentController extends Controller
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
            /*
            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
            ]);*/
            
            $usersign = User::where('name', '=', $request->input('name')) -> first();
            if($usersign -> role_id != 3){
                if(auth() ->guard('admin')->attempt([
                'name' => $request->input(name), 
                'password' => $Hash::make($request->input('password'))])){
                    if($usersign->is_admin == 1){
                        return redirect()->route('admin.home')->with('success','You are Logged in sucessfully.');
                    }
                }else {
                    return back()->with('fail');
                }
                }
                
                //$request->get('remember'));)
            //}
            
            
            auth()->login($user);
        }
        
        $course->enrollments()->create(['user_id' => auth()->user()->id]);
        return redirect()->route('enroll.myCourses');
        // if($course -> slots >= 1){
        //     $course->enrollments()->create(['user_id' => auth()->user()->id]);
        //     return redirect()->route('enroll.myCourses');
        // } else{
        //     return redirect()-> back()->withFail('Slots are already FULL.');
        // }
        
    }

    public function handleLogin(Course $course)
    {
        return redirect()->route('enroll.create', $course->id);
    }

    public function myCourses()
    {
        $breadcrumb = "My Courses";

        $userEnrollments = auth()->user()
            ->enrollments()
            ->with('course.institution')
            ->orderBy('id', 'desc')
            ->paginate(6);

        return view('enrollment.courses', compact(['breadcrumb', 'userEnrollments']));
    }

    public function deleteAndTransfer()
    {
        $enrollments = Cart::all();

        foreach ($enrollments as $enrollment) {
            $course = $enrollment->course;

            // Decrement the available slots for the course
            $course->slots--;
            $course->save();

            // Create a new enrollment
            Enrollment::create([
                'course_id' => $enrollment->course_id,
                'user_id' => $enrollment->user_id,
            ]);
        }

        Cart::truncate();
        return redirect()->back()->with('success', 'Enrollments have been deleted and transferred successfully.');
    }


    public function removeCourseFromCart(Course $course)
    {
        $user = auth()->user();

        if ($user) {
            $cartEntry = Cart::where('course_id', $course->id)
                ->where('user_id', $user->id)
                ->first();

            if ($cartEntry) {
                $cartEntry->delete();
                return redirect()->back()->with('success', 'Course has been removed from your cart successfully.');
            }
        }

        return redirect()->back()->with('error', 'Course not found in your cart.');
    }

}
