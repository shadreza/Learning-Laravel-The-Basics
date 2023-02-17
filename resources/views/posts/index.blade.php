@extends('layouts.app')

@section('content')

    <div>
        <h4>Index page</h4>
        <ul>
            @foreach ($posts as $post)
                <li>{{ $post->title }}</li>
            @endforeach
        </ul>
    </div>

@stop

@section('footer')

@stop

