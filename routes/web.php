<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Models\Listings;

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
//all listings
// Route::get('/', function () {
//     return view('listings', [
//         'heading' => 'Latest Listings',
//         'listings' => Listings::all()
//     ]);
// });

Route::get('/', [ListingController::class, 'index']);

//Create Listing
Route::get('listing/create', [ListingController::class, 'create'])->middleware('auth');

//Store Listing
Route::post('/listing', [ListingController::class, 'store'])->middleware('auth');

//Show Edit Form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

//Update Single Listing
Route::put('listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

//Delete Single Listing
Route::delete('listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');

//Manage Listings
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');

//Single Listing
Route::get('listing/{listing}', [ListingController::class, 'show']);

//Show Register User Form
Route::get('register', [UserController::class, 'create'])->middleware('guest');

//Create New User
Route::post('/users', [UserController::class, 'store']);

//Logout User
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

//Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');;

//Login User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);


// Route::get('listing/{id}', function($id){
//    return view('listing', [
//     'listing' => Listings::find($id)
//    ]);
// })->where('id', '[0-9]+');

// Route::get('listing/{listing}', function($id){
//     $listing =  Listings::find($id);
//     if ($listing) {
//         return view('listing', [
//             'listing' => $listing
//            ]);
//     }
//     else {
//         abort(404);
//     }
//  });



Route::get('/posts/{id}', function($id){
    return "Hello Laravel" .$id;
})->where('id', '[0-9]+');

