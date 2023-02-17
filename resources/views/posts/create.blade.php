@extends('layouts.app')

@section('content')

    {{-- <form method="post" action="/posts">

    </form> --}}

    {!! Form::open(['method' => 'POST', 'action' => 'App\Http\Controllers\PostsController@store']); !!}
        @csrf
        <input type="text" name="title" placeholder="Enter Title">
        <input type="submit" name="submit">
    {!! Form::close() !!}

@stop

@section('footer')

@stop

