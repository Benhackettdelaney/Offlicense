<?php


use App\Http\Controllers\User\DrinkController as UserDrinkController;
use App\Http\Controllers\Admin\DrinkController as AdminDrinkController;
use App\Http\Controllers\Admin\DistilleryController as AdminDistilleryController;
use App\Http\Controllers\User\DistilleryController as UserDistilleryController;
use App\Http\Controllers\Admin\EventController as AdminEventController;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home/distilleries', [App\Http\Controllers\HomeController::class, 'distilleryIndex'])->name('home.distillery.index');


// This will create all the routes for Book
// and the routes will only be available when a user is logged in
Route::resource('/admin/drinks', AdminDrinkController::class)->middleware(['auth'])->names('admin.drinks');
Route::resource('/user/drinks', UserDrinkController::class)->middleware(['auth'])->names('user.drinks')->only(['index', 'show']);


// This will create all the routes for Publisher functionality.
// and the routes will only be available when a user is logged in
Route::resource('/admin/distilleries', AdminDistilleryController::class)->middleware(['auth'])->names('admin.distilleries');

// the ->only at the end of this statement says only create the index and show routes.
Route::resource('/user/distilleries',UserDistilleryController::class)->middleware(['auth'])->names('user.distilleries')->only(['index', 'show']);

Route::resource('/admin/events', AdminEventController::class)->middleware(['auth'])->names('admin.events');

