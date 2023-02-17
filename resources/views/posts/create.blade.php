@extends('layouts.app')

@section('content')

    {{-- <form method="post" action="/posts">

    </form> --}}

    {!! Form::open(['method' => 'POST', 'action' => 'App\Http\Controllers\PostsController@store']); !!}
        @csrf

        <div class="form-group">
            {!! Form::label('title', 'Enter Title') !!}
            {!! Form::text('title', null, ['class' => 'form-control']) !!}
            {!! Form::submit('Create Post', ['class' => 'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}

@stop

@section('footer')

@stop

