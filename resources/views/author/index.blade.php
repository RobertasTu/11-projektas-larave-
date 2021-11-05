@extends('layouts.app')


@section('content')

<div class="container">
    <a class='btn btn-info' href='{{route('author.pdf')}}'>Export all authors to PDF</a>
    <table class="table table-striped">
        <a href='{{route('author.create')}}' class='btn btn-primary'>Add new author</a>

    <tr>
        <th> @sortablelink('id', 'ID') </th>
        <th> @sortablelink('name', 'Name') </th>
        <th> @sortablelink('surname', 'Surname') </th>
        <th> Total books </th>
        <th> Actions </th>
    </tr>

    @foreach ($authors as $author)
    <tr>
        <td>{{$author->id}} </td>
        <td>{{$author->name}}</td>
        <td>{{$author->surname}} </td>
        <td>{{$author->authorBooks->count()}}</td>

        <td>
            <a class='btn btn-info' href="{{route('author.show',[$author])}}">Show Author</a>
            <a href="{{route('author.edit',[$author])}}" class="btn btn-primary">Edit </a>
            <form method="post" action={{route('author.destroy',[$author])}}>
                @csrf
                <button type="submit" class="btn btn-danger">DELETE</button>
            </form>
        </td>
    </tr>
    @endforeach

    </table>
    {!! $authors->appends(Request::except('page'))->render()  !!}
</div>

{{-- <script>
    $(document).ready(function() {
        $('.summernote').summernote();
    });
</script> --}}
@endsection
