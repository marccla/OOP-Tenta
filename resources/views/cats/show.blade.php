@extends('layouts.app')


    
@section('content')

@foreach ($cats as $cat)



<p><a href="/posts/{{ $cat->slug }}">{{ $cat->title }}</a></p>


@endforeach

@endsection