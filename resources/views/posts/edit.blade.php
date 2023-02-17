@extends('layouts.app')

@section('content')

    <div>
        <h4>Edit page</h4>
        {{ $post->title }}

        <form method="post" action="/posts/{{ $post->id }}">
            @csrf
            <input type="hidden" name="_method" value="PUT">
            <input type="text" name="title" placeholder="Change Title" value="{{ $post->title }}">
            <input type="submit" name="submit" value="UPDATE">
        </form>

        <form method="post" action="/posts/{{ $post->id }}">
            @csrf
            <input type="hidden" name="_method" value="DELETE">
            <input type="submit" value="DELETE">
        </form>

    </div>

@stop

@section('footer')

@stop

