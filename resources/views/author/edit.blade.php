@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Author') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('author.update', [$author]) }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="author_name" class="col-md-4 col-form-label text-md-right">{{ __('Author name') }}</label>

                            <div class="col-md-6">
                                <input id="author_name" type="text" class="form-control @error('author_name') is-invalid @enderror" name="author_name" value='{{ $author->name }}' required autocomplete="author_name" autofocus>

                                @error('author_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="author_surname" class="col-md-4 col-form-label text-md-right">{{ __('Author surname') }}</label>

                            <div class="col-md-6">
                                <input id="author_surname" type="text" class="form-control @error('author_surname') is-invalid @enderror" name="author_surname" value='{{ $author->surname }}' required autocomplete="author_surname" autofocus>

                                @error('author_surname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update author info') }}
                                </button>
                                <a href='{{route('author.index')}}'>Back</a>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <script>
    $(document).ready(function() {
        $('.summernote').summernote();
    });
</script> --}}
@endsection
