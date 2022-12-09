<?php

namespace App\Http\Controllers\Admin;

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
        $user->authorizeRoles('admin');

       $distilleries = Distillery::all();
       // $publishers = Publisher::paginate(10);
       // need to test if with 'books' works
       // $publishers = Publisher::with('books')->get();

        return view('admin.distilleries.index')->with('distilleries', $distilleries);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.distilleries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');


        $request->validate([
            'name' => 'required',
            'address' => 'required',
        ]);

        $distillery = Distillery::create([
            'name' => $request->name,
            'address' => $request->address,
        ]);

        return to_route('admin.distilleries.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Distillery $publisher
     * @return \Illuminate\Http\Response
     */
    public function show(Distillery $distillery)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        if(!Auth::id()) {
           return abort(403);
         }

        return view('admin.distilleries.show')->with('distillery', $distillery);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Distillery $distillery)
    {
        return view('admin.distilleries.edit')->with('distillery', $distillery);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Distillery $distillery)
    {
       $distillery->update([
        'name' => $request->name,
        'address' => $request->address,
        ]);

        return to_route('admin.distilleries.show', $distillery)->with('success','distillery updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Distillery $distillery)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');
        $distillery->delete();

        return to_route('admin.distilleries.index')->with('success', 'Distillery deleted successfully');
    }
}