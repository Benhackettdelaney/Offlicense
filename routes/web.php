<?php

use App\Http\Controllers\DrinkController;
use Illuminate\Support\Facades\Route;

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

// this is where all of the routes we will use in the interface will be defined
// all functions have routes that go through web.php such as index, create, edit, show and the DrinkController


Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return redirect('/../drinks');
})->middleware(['auth', 'verified'])->name('dashboard');

// this code creates a route for every function being use in controller which is DrinkController
Route::resource('/drinks', DrinkController::class)->middleware(['auth']);




require __DIR__.'/auth.php';
