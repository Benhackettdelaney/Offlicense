<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Drink;
use App\Models\Distillery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DrinkController extends Controller
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

        $drinks = Drink::all();
       $drinks = Drink::paginate(10);
       $drinks = Drink::with('Distillery')->get();

        return view('admin.drinks.index')->with('drinks', $drinks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        $distilleries = Distillery::all();
        return view('admin.drinks.create')->with('distilleries',$distilleries);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'quantity' => 'required|max:500',
            'alcohol_level' =>'required',
            //'drink' => 'file|image|dimensions:width=300,height=400'
            // 'drink' => 'file|image',
            'publisher_id' => 'required'
        ]);

       
        Drink::create([
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'alcohol_level' => $request->alcohol_level,
            'distillery_id' => $request->distillery_id
        ]);

        return to_route('admin.drinks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Drink  
     * @return \Illuminate\Http\Response
     */
    public function show(Drink $drink)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        if(!Auth::id()) {
           return abort(403);
         }
         
        return view('admin.drinks.show')->with('drink', $drink);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Drink  
     * @return \Illuminate\Http\Response
     */
    public function edit(Drink $drink)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

      

    

        // Load the edit view which will display the edit form
        // Pass in the current drink so that it appears in the form.
        return view('admin.drinks.edit')->with('drink', $drink);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\Drink  
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Drink $drink)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

         //   //This function is quite like the store() function.
          $request->validate([
            'name' => 'required',
            'price' => 'required',
            'quantity' => 'required|max:500',
            'alcohol_level' =>'required',
        
        ]);

       
        
        $drink->update([
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'alcohol_level' => $request->alcohol_level
        ]);

        return to_route('admin.drinks.show', $drink)->with('success','Drink updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Drink  
     * @return \Illuminate\Http\Response
     */
    public function destroy(Drink $drink)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');
        $drink->delete();

        return to_route('admin.drinks.index')->with('success', 'Drink deleted successfully');
    }
}
