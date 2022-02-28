@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{ route('admin.posts.store') }}" method="POST">
                    @csrf
                    @method('POST')

                    <div class="mb-3 row">
                        <label for="title" class="col-sm-2 col-form-label">title</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="title" name="title">
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
                        <textarea class="form-control" id="content" name="content"></textarea>
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