<?php

namespace App\Http\Controllers;

use App\Models\Books;

class BookController extends Controller
{
   public function index()
    {
//        $books = DB::select('SELECT * from `mybooks`');

        $books = Book::with('reviews')->get();

        return view('books/index', compact('books'));
    }

    public function show($id)
    {
//        $book = DB::select('SELECT * from `books` where `id` = ?', [$id]);
        //        $book = $book[ 0 ];

        // select * from `books` ... - superfast, but review would require another DB query
        //        $book = Book::findOrFail($id);

        // select * from `books` join `reviews` - slow, but selects also reviews
        $book = Book::with('reviews')->findOrFail($id);

//        $reviews = Review::where('book_id', $book->id)->get();
        //        $reviews = $book->reviews;
        //
        //        return $reviews;

        return view('books/show', compact('book'));
    }

    public function create()
    {
        return view('books/create');
    }

    public function store(Request $request)
    {
        $book = new Book;
        $book->title = $request->input('title');
        $book->authors = $request->input('authors');
        $book->image = $request->input('image');

        $book->save();

        //after storing new book we will redirect our user to action('BookController@index')
        return redirect(action('BookController@index'));
    }
