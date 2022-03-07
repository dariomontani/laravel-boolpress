@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create new post</h1>
        <div class="row">
            <div class="col">
                <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="mb-3">
                        <select class="form-select" name="category_id">
                            <option value="">category</option>
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

                    <fieldset>
                        <legend>Tags</legend>
                        @foreach ($tags as $tag)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="{{$tag->id}}" name="tags[]" {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="flexCheckDefault">
                                {{$tag->name}}
                            </label>
                        </div>
                        @endforeach
                    </fieldset>
                    @error('tags.*')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror

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

                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input class="form-control" type="file" id="image" name="image">
                    </div>

                    <input class="btn btn-primary" type="submit" value="salva">
                </form>
            </div>
        </div>
    </div>
@endsection