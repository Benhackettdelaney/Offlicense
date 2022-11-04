<?php

namespace App\Http\Controllers;

use App\Models\Drink;
use Illuminate\Http\Request;
use Illuminate\support\facades\Auth;

class DrinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $drinks = Drink::where('user_id', Auth::id())->latest('updated_at')->paginate(9);
       $drinks = Drink::paginate(10);
        return view('Drinks.index')->with('drinks', $drinks);
     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('drinks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Drink $drink)
    {
        Drink::create([
            // Ensure you have the use statement for
            // Illuminate\Support\Str at the top of this file.
        //    'user_id' => Auth::id(),
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            // 'book_image' => "public\image\Tess_the_TickTock_Dog.jpg",
            'alcohol_level' => $request->alcohol_level
        ]);

        return to_route('drinks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Drink $drink)
    {
        return view('drinks.show')->with('drink', $drink);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Drink $drink)
    {
        return view('drinks.edit')->with('drink', $drink);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Drink $drink)
    {
        $drink->update([
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            // 'book_image' => $filename,
            'alcohol_level' => $request->alcohol_level
        ]);

        return to_route('drinks.show', $drink)->with('success','Drink updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Drink $drink)
    {
        $drink->delete();

        return to_route('drinks.index')->with('success', 'Drink deleted successfully');
    }
}
