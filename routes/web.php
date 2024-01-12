<?php

use App\Http\Controllers\Auth\LoginController;

Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('home')->with('status', session('status'));
    }

    return redirect()->route('home'); 
});//-> middleware('isAdmin');

//
Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard'); 
//

Auth::routes(['register' => true]);

Route::get('/', 'HomeController@index')->name('home'); 
Route::get('enroll/login/{course}', 'EnrollmentController@handleLogin')->name('enroll.handleLogin')->middleware('auth'); 
Route::get('enroll/{course}', 'CartController@create')->name('cart.create'); 
Route::post('enroll/{course}', 'CartController@store')->name('cart.store'); 
Route::get('my-cart', 'CartController@myCart')->name('cart.myCart'); //->middleware('auth');     
Route::get('my-courses', 'EnrollmentController@myCourses')->name('enroll.myCourses'); //->middleware('auth');
Route::resource('courses', 'CourseController')->only(['index', 'show']); 
Route::delete('enroll/{course}', 'EnrollmentController@removeCourseFromCart')->name('enroll.removeCourseFromCart');
Route::post('my-cart/delete-and-transfer', 'EnrollmentController@deleteAndTransfer')->name('enroll.deleteAndTransfer')->middleware('auth'); 

//Route::get('/admin', 'HomeController@index')->name('admin.home') -> middleware('auth'); //->middleware('auth');


Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Disciplines
    Route::delete('disciplines/destroy', 'DisciplinesController@massDestroy')->name('disciplines.massDestroy');
    Route::resource('disciplines', 'DisciplinesController');

    // Institutions
    Route::delete('institutions/destroy', 'InstitutionsController@massDestroy')->name('institutions.massDestroy');
    Route::post('institutions/media', 'InstitutionsController@storeMedia')->name('institutions.storeMedia');
    Route::resource('institutions', 'InstitutionsController');

    // Courses
    Route::delete('courses/destroy', 'CoursesController@massDestroy')->name('courses.massDestroy');
    Route::post('courses/media', 'CoursesController@storeMedia')->name('courses.storeMedia');
    Route::resource('courses', 'CoursesController');

    // Enrollments
    Route::delete('enrollments/destroy', 'EnrollmentsController@massDestroy')->name('enrollments.massDestroy');
    Route::resource('enrollments', 'EnrollmentsController');
}); 

// Use the custom login controller
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');  