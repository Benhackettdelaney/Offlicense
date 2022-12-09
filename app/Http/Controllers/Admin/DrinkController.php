<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
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

       //$books = Book::all();
       // $books = Book::paginate(10);
       // $books = Book::with('publisher')->get();
       $drinks = Drink::with('distillery')
         ->with('events')
         ->get();


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
        $events = Event::all();

        return view('admin.drinks.create')->with('distilleries',$distilleries)->with('events', $events);
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
            'quantity' => 'required',
            'alcohol_level' => 'required|max:500',
        
            'distillery_id' => 'required',
            'events' =>['required' , 'exists:events,id']
        ]);

        // $book_image = $request->file('book_image');
        // $extension = $book_image->getClientOriginalExtension();
        // the filename needs to be unique, I use title and add the date to guarantee a unique filename, ISBN would be better here.
        // $filename = date('Y-m-d-His') . '_' . $request->input('title') . '.'. $extension;

        // store the file $book_image in /public/images, and name it $filename
        // $path = $book_image->storeAs('public/images', $filename);
        $drink = Drink::create([
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'alcohol_level' => $request->alcohol_level,
            // 'book_image' => $filename,
        //    'author' => $request->author,
            'distillery_id' => $request->distillery_id
        ]);

        //Adds entries in the pivot table. 
        $drink->events()->attach($request->events);

        return to_route('admin.drinks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Drink  $book
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
     * @param  \App\Models\Drink  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Drink $drink)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');
        $distilleries = Distillery::all();

        // This user id check below was implemented as part of LiteNote
        // I don't have a user id linked to books,so I don't need it here - in CA 2 we will allow only admin users to edit books.
        // if($book->user_id != Auth::id()) {
        //     return abort(403);
        // }

      //  dd($book);

        // Load the edit view which will display the edit form
        // Pass in the current book so that it appears in the form.
        return view('admin.drinks.edit')->with('drink', $drink)->with('distilleries', $distilleries);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\Drink  $book
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
            'quantity' => 'required',
            'alcohol_level' => 'required|max:500',
       //     'author' =>'required',
            //'book_image' => 'file|image|dimensions:width=300,height=400'
        //    'book_image' => 'file|image'
        ]);

        // $book_image = $request->file('book_image');
        // $extension = $book_image->getClientOriginalExtension();
        // // the filename needs to be unique, I use title and add the date to guarantee a unique filename, ISBN would be better here.
        // $filename = date('Y-m-d-His') . '_' . $request->input('title') . '.'. $extension;

        // // store the file $book_image in /public/images, and name it $filename
        // $path = $book_image->storeAs('public/images', $filename);

        $drink->update([
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'alcohol_level' => $request->alcohol_level,
            // 'book_image' => $filename,
       //     'author' => $request->author
        ]);

        return to_route('admin.drinks.show', $drink)->with('success','Drink updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Drink  $book
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