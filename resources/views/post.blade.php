@extends('layouts.app')

@section('content')
    <p>This is from the post page</p>
@stop

@section('footer')
    <p>{{$name}}</p>
    <p>{{$age}}</p>
    <p>{{$misc}}</p>
@stop
