<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController;
use App\Models\GrowthData;
use App\Http\Controllers\GrowthDataController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ProfilePictureController;
use App\Http\Controllers\RentCartController;
use App\Http\Controllers\ShowUserProfileController;
use App\Http\Controllers\HistoryController;
use App\Models\UserProfile;
use App\Http\Controllers\RentCheckoutController;
use App\Http\Controllers\reviewNurseController;


use App\Http\Controllers\InfarentController;
use App\Models\Product;
use App\Models\ShowUserProfile;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;





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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Auth::routes();
Route::get('/', [App\Http\Controllers\LandingPageController::class, 'index'])->name('landing');
// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/infagrowth',[App\Http\Controllers\InfagrowthController::class, 'index'])->name('infagrowth');
Route::get('/infanurse',[App\Http\Controllers\InfanurseController::class, 'index'])->name('infanurse');
Route::get('/nurserent', [App\Http\Controllers\InfanurseController::class, 'nurserent'])->name('nurserent');
Route::get('/infarent',[App\Http\Controllers\InfarentController::class, 'index'])->name('infarent');
Route::get('/infasolution',[App\Http\Controllers\InfasolutionController::class, 'index'])->name('infasolution');

Route::get('/rentHistory', [App\Http\Controllers\HistoryController::class, 'index'])->name('rentHistory');
Route::get('/reviewNurse', [App\Http\Controllers\reviewNurseController::class, 'index'])->name('reviewNurse');

Route::post('/review-nurse/{id}', [App\Http\Controllers\reviewNurseController::class, 'store2'])->name('reviewnurse');


Route::get('/reviewnurse', [reviewNurseController::class, 'index'])->name('reviewnurse.index');
Route::post('/reviewnurse/{id}', [reviewNurseController::class, 'store'])->name('reviewnurse.store');
Route::get('/reviewnurse/{id}', [reviewNurseController::class, 'index2'])->name('reviewnurse.index2');


Route::post('/submit-nurserent', [App\Http\Controllers\InfanurseController::class, 'submitNurserent'])->name('submit-nurserent');
Route::get('/checkout/{id}', [App\Http\Controllers\RentCheckoutController::class, 'rentCheckout'])->name('checkout');
Route::post('/updateRentHistory/{id}', [App\Http\Controllers\RentCheckoutController::class, 'update'])->name('updateRentHistory');


Route::post('/save', 'App\Http\Controllers\GrowthDataController@store')->name('save');
Route::get('/success', function () {
    return view('showgrowthdata'); // Replace 'success' with the name of your success view file if different
})->name('success');
 Route::get('/success', 'App\Http\Controllers\GrowthDataController@show')->name('success');

 Route::get('/userprofile', [UserProfileController::class, 'index'])->name('userprofile');

//  Route::post('profilepicture/upload', [ProfilePictureController::class, 'upload'])->name('profilepicture.upload');

//  Route::get('/showuserprofile/{id}', [ProfilePictureController::class, 'showUserProfile'])->name('showuserprofile');

 Route::get('/rentcart/{id}', [RentCartController::class, 'index'])->name('rentCart');
 Route::post('/submit-rent', [App\Http\Controllers\RentCartController::class, 'submitrent'])->name('submit-rent');
 Route::get('/check-out/{id}', [App\Http\Controllers\RentCheckoutController::class, 'rentCheckout2'])->name('checkout2');

 Route::post('/profile/password/verify', [ProfilePasswordController::class, 'verifyPassword'])->name('profile.password.verify');


 Route::post('/save-profile', [ShowUserProfileController::class, 'store'])->name('save-profile');

Route::get('/show-profile/{id}', [ShowUserProfileController::class, 'showProfile'])->name('show-profile');

// Route::get('/save-profile', function () {
  //  return view('showuserprofile'); // Replace 'success' with the name of your success view file if different
//})->name('save-profile');



Route::get('/rentcart2', function () {
    return view('rentCart2');
});

