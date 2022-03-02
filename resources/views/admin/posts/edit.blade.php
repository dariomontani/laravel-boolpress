@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>modifica {{$post->title}}</h1>
        <div class="row">
            <div class="col">
                <form action="{{ route('admin.posts.update', $post) }}" method="post">
                    @csrf
                    @method('PATCH')

                    <div class="mb-3 row">
                        <label for="title" class="col-sm-2 col-form-label">title</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $post->title) }}">
                        @error('title')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="content" class="col-sm-2 col-form-label">content</label>
                        <div class="col-sm-10">
                        <textarea class="form-control" id="content" name="content">
                            {{ old('content', $post->content) }}
                        </textarea>
                        @error('content')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        </div>
                    </div>

                    <input class="btn btn-primary" type="submit" value="salva">
                </form>
            </div>
        </div>
    </div>
@endsection