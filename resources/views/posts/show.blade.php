@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $post->title }}</h1>
        <p>{{ $post->content }}</p>
        <p>{{ $post->description }}</p>
        <a href="{{ route('posts.edit', $post) }}" class="btn btn-primary">Edit</a>
    </div>
@endsection
