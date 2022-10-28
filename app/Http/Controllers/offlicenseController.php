<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request\Route;

use Illuminate\Support\Facades\DB;

class OfflicenseController extends Controller
{
    public function index() {
        $users = DB::select('select * from users');
        // dd($user);
    }
}

// Route::get('/', [OfflicenseController::class, 'index']);