<h1>Book info table</h1>
<table class="table table-striped">


    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>ISBN</th>
        <th>Pages</th>
        <th>Description</th>
        <th>Author</th>

    </tr>
           <tr>
            <td> {{$book->id }}</td>
            <td> {{$book->title }}</td>
            <td> {{$book->isbn }}</td>
            <td> {{$book->pages }}</td>
            <td> {!! $book->about !!}</td>
            <td>{{ $book->bookAuthor->name }} {{ $book->bookAuthor->surname }} </td>

        </tr>

    </table>
