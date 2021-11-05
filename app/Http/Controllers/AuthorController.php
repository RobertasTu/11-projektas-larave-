<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;
use PDF;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::sortable()->paginate(15);
        return view ('author.index', ['authors'=>$authors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('author.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $author = new Author;
        $author->name = $request->author_name;
        $author->surname = $request->author_surname;

        $author->save();

        return redirect()->route("author.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        return view("author.show", ["author" => $author]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
      return view('author.edit', ['author'=>$author]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $author)
    {

        $author->name = $request->author_name;
        $author->surname = $request->author_surname;

        $author->save();

        return redirect()->route("author.index");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        $author->delete();
        return redirect()->route("author.index");
    }
    public function generateAuthorPDF(Author $author) {
        view()->share('author', $author);
        $pdf = PDF::loadView('author/pdf_author_template', $author);
        return $pdf->download('author'.$author->id.'.pdf');
    }
    public function generatePDF() {
        $authors = Author::all();
        view()->share('authors', $authors);
        $pdf = PDF::loadView('author/pdf_template', $authors);
        return $pdf->download('authors.pdf');
    }
}
