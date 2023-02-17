@extends('layouts.app')

@section('content')
    <p>This is from the contact page</p>

    <p>The names of the people passed are ---</p>

    @if (count($people))
        <ul>
            @foreach ($people as $person)
                <li>{{ $person }}</li>
            @endforeach
        </ul>
    @endif

@stop

@section('footer')
    {{-- <script>alert('contact alert')</script> --}}
    <p>This is footer from the contact page</p>
@stop

<div>Ths is extra snippet from the layout. though at the bottom it is shown at the top</div>
