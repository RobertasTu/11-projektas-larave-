@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Meniu</div>
                <a class='btn btn-info' href='{{route('book.index')}}'>Book catalogue</a><br>
                <a class='btn btn-info' href='{{route('author.index')}}'>Author index</a>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   Congrats {{ Auth::user()->name }} You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
