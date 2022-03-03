@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>crea un nuovo post</h1>
        <div class="row">
            <div class="col">
                <form action="{{ route('admin.posts.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="mb-3">
                        <select class="form-select" name="category_id">
                            <option value="">seleziona la categoria</option>
                            @foreach ($categories as $category)

                                <option @if (old('category_id') == $category->id) selected @endif value="{{ $category->id }}">
                                    {{ $category->name }}
                                </option>
                                
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3 row">
                        <label for="title" class="col-sm-2 col-form-label">title</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
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
                            {{ old('content') }}
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