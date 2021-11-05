@extends('layouts.app')


@section('content')

<div class="container">
    <a href='{{route('author.pdfauthor', [$author])}}' class='btn btn-primary'>Export author to PDF</a>
    <table class="table table-striped">
        {{-- <a href='{{route('author.create')}}' class='btn btn-primary'>Add new author</a> --}}

    <tr>
        <th> ID </th>
        <th> Name </th>
        <th> Surname </th>
        <th> Total books </th>
        <th> Actions </th>
    </tr>

       <tr>
        <td>{{$author->id}} </td>
        <td>{{$author->name}}</td>
        <td>{{$author->surname}} </td>
        <td>{{$author->authorBooks->count()}}</td>

        <td>
              <a href="{{route('author.edit',[$author])}}" class="btn btn-primary">Edit </a>
            <form method="post" action={{route('author.destroy',[$author])}}>
                @csrf
                <button type="submit" class="btn btn-danger">DELETE</button>
            </form>
        </td>
    </tr>

    </table>
    <a href='{{route('author.index')}}'>Back</a>

</div>


@endsection
