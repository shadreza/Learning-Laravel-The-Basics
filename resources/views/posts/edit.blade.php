@extends('layouts.app')

@section('content')

    <div>
        <h4>Edit page</h4>
        {{ $post->title }}

        {{-- this is form binding and populate the form as well --}}
        {{-- object, [method, [action, id]] --}}
        {!! Form::model($post, ['method'=>'PATCH', 'action'=>['App\Http\Controllers\PostsController@update', $post->id]]) !!}
            @csrf
            {!! Form::label('title', 'Update Title') !!}
            {!! Form::text('title', null, ['class' => 'form-control']) !!}
            {!! Form::submit('Update Post', ['class' => 'btn btn-info']) !!}
        {!! Form::close() !!}

        {!! Form::open(['method'=>'DELETE', 'action'=>['App\Http\Controllers\PostsController@destroy', $post->id]]) !!}
            @csrf
            {!! Form::submit('Delete Post', ['class' => 'btn btn-info']) !!}
        {!! Form::close() !!}

    </div>

@stop

@section('footer')

@stop

