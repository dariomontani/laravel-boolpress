@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            @if (session('status'))
                <div class="alert alert-danger">
                    {{ session('status') }}
                </div>
            @endif
        </div>
        <div class="row">
            <div class="col">
                <h1> {{ $post->title }} </h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h5> Category: {{ $post->category()->first()->name }} </h5>
            </div>
        </div>
        <div class="row">
            <div class="col">
                {{ $post->content }}
            </div>
            <div>
                <img src="{{ asset('storage/' . $post->image)}}" alt="">
            </div>
        </div>
    </div>
@endsection