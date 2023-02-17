@extends('layouts.app')

@section('content')

    <div>
        <h4>Show page</h4>
        <p>{{ $post->title }}</p>
        <a href="{{ route('posts.edit', $post->id) }}">Edit</a>
    </div>

@stop

@section('footer')

@stop

