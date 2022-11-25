<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Drink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DrinkController extends Controller
{
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          // Fetch All Drinks, owned by the Logged in User, in order of when they were last updated - latest updated returned first, And you want the $books paginated.
          // $drinks = Drink::where('user_id', Auth::id())->latest('updated_at')->paginate(10);

          // Fetch All Drinks(not just belonging to the logged in user) and add pagination.
          $drinks = Drink::paginate(10);

          // Fetch All Drinks, no pagination.
          //$drinks = Drink::all();

          // Something not working - unccoment the line below to dump all the books onto the screen to help you troubleshoot.
          //   dd($notes);
          return view('user.drinks.index')->with('drinks', $drinks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     //   return view('drfinks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'title' => 'required',
        //     'category' => 'required',
        //     'description' => 'required|max:500',
        //     'author' =>'required',
        //     //'book_image' => 'file|image|dimensions:width=300,height=400'
        //     'book_image' => 'file|image'
        // ]);

        // $book_image = $request->file('book_image');
        // $extension = $book_image->getClientOriginalExtension();
        // // the filename needs to be unique, I use title and add the date to guarantee a unique filename, ISBN would be better here.
        // $filename = date('Y-m-d-His') . '_' . $request->input('title') . '.'. $extension;

        // // store the file $book_image in /public/images, and name it $filename
        // $path = $book_image->storeAs('public/images', $filename);

        // Drink::create([
        //     'title' => $request->title,
        //     'category' => $request->category,
        //     'description' => $request->description,
        //     'book_image' => $filename,
        //     'author' => $request->author
        // ]);

        // return to_route('drinks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Drink  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Drink $drink)
    {
        // Use the code below if you want the user to only be able to view drinks that they own.
        //  if($drink->user_id != Auth::id()) {
        //     return abort(403);
        // }

        if(!Auth::id()) {
           return abort(403);
         }

        //this function is used to get a book by the ID.
        return view('user.drinks.show')->with('drink', $drink);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Drink  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Drink $drink)
    {
        // This user id check below was implemented as part of LiteNote
        // I don't have a user id linked to drinks,so I don't need it here - in CA 2 we will allow only admin users to edit drinks.
        // if($drink->user_id != Auth::id()) {
        //     return abort(403);
        // }



        // Load the edit view which will display the edit form
        // Pass in the current book so that it appears in the form.
  //      return view('books.edit')->with('book', $book);
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
         //   //This function is quite like the store() function.
        //   $request->validate([
        //     'title' => 'required',
        //     'category' => 'required',
        //     'description' => 'required|max:500',
        //     'author' =>'required',
        //     //'book_image' => 'file|image|dimensions:width=300,height=400'
        //    'book_image' => 'file|image'
        // ]);

        // $book_image = $request->file('book_image');
        // $extension = $book_image->getClientOriginalExtension();
        // // // the filename needs to be unique, I use title and add the date to guarantee a unique filename, ISBN would be better here.
        // $filename = date('Y-m-d-His') . '_' . $request->input('title') . '.'. $extension;

        // // // store the file $book_image in /public/images, and name it $filename
        // $path = $book_image->storeAs('public/images', $filename);

        // $book->update([
        //     'title' => $request->title,
        //     'category' => $request->category,
        //     'description' => $request->description,
        //     'book_image' => $filename,
        //     'author' => $request->author
        // ]);

        // return to_route('books.show', $book)->with('success','Book updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Drink  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Drink $drink)
    {
        // $book->delete();

        // return to_route('books.index')->with('success', 'Book deleted successfully');
    }
}