<?php


namespace App\Http\Controllers;


use App\Book;
use Illuminate\Http\Request;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Book::all();
        // return view('books.index',compact('books'))
        //     ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);


        return Book::create($request->all());


        // return redirect()->route('books.index')
        //                 ->with('success','Book created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Book::find($id);
        // return view('books.show',compact('book'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('books.edit',compact('book'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         request()->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);

        $book = Book::findOrFail($id);
        $book->update($request->all());

        return $book;


        // $book->update($request->all());


        // return redirect()->route('books.index')
        //                 ->with('success','Book updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {

        $book = Book::findOrFail($id);
        $book->delete();

        return 204;
        // $book->delete();


        // return redirect()->route('books.index')
        //                 ->with('success','Book deleted successfully');
    }
}