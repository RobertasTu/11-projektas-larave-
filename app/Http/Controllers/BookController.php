<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use App\Author;
use PDF;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $authors = Author::all();
        $books = Book::all();

        //
        // $filterAuthors = $authors;
        $filterBooks = $books;

        $collumnName = $request->collumnName;
        $sortBy = $request->sortBy;
        $filterByTitle = $request->filterByTitle;
        $filterAuthor = $request->filterAuthor;


        if(!$collumnName && !$sortBy && !$filterByTitle && !$filterAuthor || $filterByTitle == 'all' || $filterAuthor == 'all') {
            $collumnName = 'id';
            $sortBy = 'asc';

            $books = Book::sortable()->paginate(20);
        } else {

            $collumnName = 'id';
            $sortBy = 'asc';
            $books = Book::sortable()->where('title', $filterByTitle)->orWhere('author_id', $filterAuthor)->paginate(20);

            // Book::orderBy($collumnName, $sortBy)
        }



        return view ('book.index', ['books'=>$books, 'authors'=>$authors, 'collumnName'=> $collumnName, 'sortBy'=>$sortBy, 'filterByTitle'=>$filterByTitle, 'filterAuthor'=>$filterAuthor, 'filterBooks'=> $filterBooks ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $authors = Author::all();
        return view('book.create', ['authors'=>$authors]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $book = new Book;
        $book->title = $request->book_title;
        $book->isbn = $request->book_isbn;
        $book->pages = $request->book_pages;
        $book->about =$request->book_about;
        $book->author_id = $request->book_author_id;

        $book->save();

        return redirect()->route("book.index");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view("book.show", ["book" => $book]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $authors = Author::all();
        return view("book.edit",["book"=>$book, "authors"=>$authors]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {

        $book->title = $request->book_title;
        $book->isbn = $request->book_isbn;
        $book->pages = $request->book_pages;
        $book->about =$request->book_about;
        $book->author_id = $request->book_author_id;
        $book->save();
        return redirect()->route("book.index");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route("book.index");

    }

    public function filter(Book $book, Request $request) {
        $books = Book::all();

        $filterByTitle = $request->title;
        $filterAuthor = $request->author_id;

        $books = Book::query()->where('title', $filterByTitle)->orWhere('author_id', $filterAuthor);

        return redirect()->route('book.filter', ['books'=>$books]);
    }
    public function generateBookPDF(Book $book) {
        view()->share('book', $book);
        $pdf = PDF::loadView('book/pdf_book_template', $book);
        return $pdf->download('book'.$book->id.'.pdf');
    }
    public function generatePDF() {
        $books = Book::all();
        view()->share('books', $books);
        $pdf = PDF::loadView('book/pdf_template', $books);
        return $pdf->download('books.pdf');
    }

}
