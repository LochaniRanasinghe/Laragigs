<?php

use App\Models\Listing;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//get all listings
Route::get('/', [ListingController::class,'index']); 

//show create form
Route::get('/listings/create', [ListingController::class,'create'])->middleware('auth');

//store listing data
Route::post('/listings', [ListingController::class,'store'])->middleware('auth');

//show update form
Route::get('/listings/{listing}/edit', [ListingController::class,'edit'])->middleware('auth');

//update listing data
Route::put('/listings/{listing}', [ListingController::class,'update'])->middleware('auth');

//delete listing
Route::delete('/listings/{listing}', [ListingController::class,'destroy'])->middleware('auth');

//show register/create form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

//create a new user
Route::post('/users', [UserController::class, 'store']);

//logout user
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

//show login form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

//login user
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

//Manage Lisings
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');

//get a single listing
// Route::get('/listing/{listing}', ListingController::class,'show');

//------------------
Route::get('/listing/{id}', function ($id) {
    $listing = Listing::find($id);
    
    if($listing){
        return view('listings.show',[
            'listingSS'=>$listing
        ]);
    }
    else{
        abort(404);
    }
}); 
//-------------------