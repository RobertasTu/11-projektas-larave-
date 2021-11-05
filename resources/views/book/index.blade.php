@extends('layouts.app')


@section('content')
<div class="container">
    {{-- <form action='{{route('book.index')}}' method='GET'>
        @csrf

    <select name='collumnName'>
        @if ($collumnName == 'id')
        <option value="id" selected>ID</option>
    @else
        <option value="id">ID</option>
    @endif

     @if ($collumnName == 'title')
     <option value="title" selected>Title</option>
    @else
        <option value="title">Title</option>
    @endif

    @if ($collumnName == 'author_id')
        <option value="author_id" selected>Author</option>
    @else
        <option value="author_id">Author</option>
    @endif

            </select>
    <select name='sortBy'>
        @if ($sortBy == 'asc')
        <option value='asc' selected>ASC</option>
        <option value='desc' >DESC</option>
        @else
        <option value='asc'>ASC</option>
        <option value='desc' selected>DESC</option>
        @endif


    </select>
    <button type='submit'>Sort</button>

</form> --}}

<form action='{{route('book.index')}}' method='GET'>
    @csrf
    <div class="form-group row">
        <label for="filterByTitle" class="col-md-4 col-form-label text-md-right">{{ __('Filter by title') }}</label>
        <div class='col-md-6'>
        <select name='filterByTitle'>
            <option value="all" @if ($filterByTitle == 'all') selected @endif>Visi</option>
        @foreach ($filterBooks as $book)
          <option value="{{$book->title}}" @if($filterByTitle == $book->title) selected @endif >{{$book->title}}</option>
          @endforeach
        </select>
        <button class='btn btn-secondary' type='submit'>Filter</button>
    </div>
</div>
</form>

<form action='{{route('book.index')}}' method='GET'>
<div class="form-group row">
    <label for="filterAuthor" class="col-md-4 col-form-label text-md-right">{{ __('Filter by author') }}</label>
    <div class='col-md-6'>
        <select name='filterAuthor'>
            <option value="all" @if ($filterAuthor == 'all') selected @endif>Visi</option>
        @foreach ($filterBooks as $book)
        <option value="{{$book->author_id}}" @if($filterAuthor == $book->author_id) selected @endif>{{$book->bookAuthor->name}} {{$book->bookAuthor->surname}}</option>
        @endforeach
    </select>
    <button class='btn btn-secondary' type='submit'>Filter</button>
    <a class='btn btn-secondary' href='{{route('book.index')}}'>Clear filters</a>
    </div>

</div>


</form>

{{-- {{$filterByTitle}} --}}

<a class='btn btn-primary' href='{{route('book.pdf')}}'>Export books to PDF</a>
    <table class="table table-striped">
        <a href='{{route('book.create')}}' class='btn btn-primary'>Add new book</a>

    <tr>
        <th> @sortablelink('id', 'ID') </th>
        <th> @sortablelink('title', 'Title') </th>
        <th> @sortablelink('isbn', 'ISBN code') </th>
        <th> @sortablelink('pages', 'Pages') </th>
        <th> Description </th>
        <th> @sortablelink('author_id', 'Author') </th>
        <th> Actions </th>
    </tr>

    @foreach ($books as $book)
    <tr>
        <td>{{$book->id}} </td>
        <td><a href="{{route('book.show',[$book])}}">{{$book->title}}</a> </td>
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
    @endforeach

    </table>
    {!! $books->appends(Request::except('page'))->render()  !!}
</div>

<script>
    $(document).ready(function() {
        $('.summernote').summernote();
    });
</script>
@endsection
