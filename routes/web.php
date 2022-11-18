<?php

use App\Http\Controllers\Admin\DrinkController as AdminDrinkController;
use App\Http\Controllers\User\DrinkController as UserDrinkController;
use Database\Seeders\DrinkSeeder;
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

Route::get('/', function () {
    return view('welcome');
});
// I think we can get rid of this...test later
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');

// This will create all the routes for Book
// and the routes will only be available when a user is logged in
Route::resource('/admin/drinks', AdminDrinkController::class)->middleware(['auth'])->names('admin.drinks');

Route::resource('/user/drinks', UserDrinkController::class)->middleware(['auth'])->names('user.drinks')->only(['index', 'show']);





require __DIR__.'/auth.php';
