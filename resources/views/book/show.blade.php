@extends('layouts.app')


@section('content')
<div class="container">
    <a href='{{route('book.pdfbook', [$book])}}' class='btn btn-primary'>Export book to PDF</a>
    <table class="table table-striped">

    <tr>
        <th> ID </th>
        <th> Title </th>
        <th> ISBN code </th>
        <th> Pages </th>
        <th> Description </th>
        <th> Author </th>
        <th> Actions </th>
    </tr>

    <tr>
        <td>{{$book->id}} </td>
        <td>{{$book->title}}</a> </td>
        <td>{{$book->isbn}} </td>
        <td>{{$book->pages}} </td>
        <td>{!! $book->about !!} </td>
        <td> {{$book->bookAuthor->name}} {{$book->bookAuthor->surname}} </td>
        <td>
            <a href="{{route('book.edit',[$book])}}" class="btn btn-primary">Edit </a>
            <form method="post" action={{route('book.destroy',[$book])}}>
                @csrf
                <button type="submit" class="btn btn-danger">DELETE</button>
            </form>
        </td>
    </tr>

    </table>
    <a href='{{route('book.index')}}'>Back</a>
</div>
@endsection
