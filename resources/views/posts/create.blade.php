@extends('layouts.app')

@section('content')

    {{-- <form method="post" action="/posts">

    </form> --}}

    {!! Form::open(['method' => 'POST', 'action' => 'App\Http\Controllers\PostsController@store', 'files'=>true]); !!}
        @csrf

        <div class="form-group">
            {!! Form::label('title', 'Enter Title') !!}
            {!! Form::text('title', null, ['class' => 'form-control']) !!}
            {!! Form::submit('Create Post', ['class' => 'btn btn-primary']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('title', 'Enter File') !!}
            {!! Form::file('title', null, ['class' => 'form-control']) !!}
        </div>

    {!! Form::close() !!}

    @if (count($errors) > 0)
        <div class="alert alert-danger" >
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>

                @endforeach
            </ul>
        </div>
    @endif

@stop

@section('footer')

@stop

