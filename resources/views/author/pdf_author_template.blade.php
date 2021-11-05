<h1>Author info</h1>
<table class="table table-striped">


    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Surname</th>
        <th>Total books</th>


    </tr>

        <tr>
            <td> {{$author->id }}</td>
            <td> {{$author->name }}</td>
            <td> {{$author->surname }}</td>
            <td> {{$author->authorBooks->count()}}</td>

        </tr>

    </table>
