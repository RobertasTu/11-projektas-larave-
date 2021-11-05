@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Book edit') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('book.update', [$book]) }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="book_title" class="col-md-4 col-form-label text-md-right">{{ __('Book title') }}</label>

                            <div class="col-md-6">
                                <input id="book_title" type="text" class="form-control @error('book_title') is-invalid @enderror" name="book_title" value="{{ $book->title }}" required autocomplete="book_title" autofocus>

                                @error('book_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="book_isbn" class="col-md-4 col-form-label text-md-right">{{ __('Book ISBN code') }}</label>

                            <div class="col-md-6">
                                <input id="book_isbn" type="text" class="form-control @error('book_isbn') is-invalid @enderror" name="book_isbn" value="{{ $book->isbn }}" required autocomplete="book_isbn" autofocus>

                                @error('book_isbn')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="book_pages" class="col-md-4 col-form-label text-md-right">{{ __('Book pages') }}</label>

                            <div class="col-md-6">
                                <input id="book_pages" type="text" class="form-control @error('book_pages') is-invalid @enderror" name="book_pages" value="{{ $book->pages }}" required autocomplete="book_pages" autofocus>

                                @error('book_pages')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="book_about" class="col-md-4 col-form-label text-md-right" >{{ __('Book description:') }}</label>

                            <div class="col-md-6">

                               <textarea class='summernote' name='book_about' required>
                                   <p>{!! $book->about !!}</p>
                               </textarea>
                            </div>
                        </div>

                        <div class="form-group row">

                            <label for="book_author_id" class="col-md-4 col-form-label text-md-right">{{ __('Book Author') }}</label>
                            <div class="col-md-6">
                                <select class="form-control" name="book_author_id">

                                    @foreach ($authors as $author)

                                        <option value="{{$author->id}}" @if($author->id == $book->author_id) selected @endif >{{$author->name}} {{$author->surname}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>






                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update book information') }}
                                </button>
                                <a href='{{route('book.index')}}'>Back</a>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.summernote').summernote();
    });
</script>
@endsection
