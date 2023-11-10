<?php

use App\Mail\WelcomeMail;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $users = User::with('role')->get();

    return view('welcome',compact('users'));
});

Route::post('/',function(Request $request){
    DB::transaction(function() use ($request){
        $user = User::create($request->only('name','email','password'));

        Mail::to($user)->queue(new WelcomeMail());
//        throw new Exception('Opps! I am a millionaire');

        $user->role()->attach(Role::first()->id);
    });
    return back();
})->name('user.store');

