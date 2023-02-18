@extends('layouts.app')

@section('content')

    <div>
        <h4>Index page</h4>

        <a href="{{ route('posts.create') }}">Create a Post</a>

        <ul>
            @foreach ($posts as $post)

                <div class="image-container">
                    <img height="100" src="{{ $post->path }}" alt="">
                </div>
                <a href="{{ route('posts.show', $post->id) }}">
                    <li>{{ $post->title }}</li>
                </a>
            @endforeach
        </ul>
    </div>

@stop

@section('footer')

@stop

