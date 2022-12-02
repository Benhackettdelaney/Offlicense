<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Distillery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DistilleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $user->authorizeRoles('user');

       $distilleries = Distillery::all();
       // $publishers = Distillery::paginate(10);
       // need to test if with 'drinks' works
       // $publishers = Distillery::with('drinks')->get();

        return view('user.distilleries.index')->with('distilleries', $distilleries);
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }



}