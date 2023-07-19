<?php

use Illuminate\Support\Facades\Route;
use App\Models\Listing;
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
Route::get('/listings/create', [ListingController::class,'create']);

//store listing data
Route::post('/listings', [ListingController::class,'store']);

//show update form
Route::get('/listings/{listing}/edit', [ListingController::class,'edit']);

//update listing data
Route::put('/listings/{listing}', [ListingController::class,'update']);

//delete listing
Route::delete('/listings/{listing}', [ListingController::class,'destroy']);

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