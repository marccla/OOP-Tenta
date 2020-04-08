@extends('layouts.app')


    
@section('content')

@foreach ($posts as $post)
@if( $cats->id === $post->cat_id )


<p><a href="/posts/{{ $post->slug }}">{{ $post->title }}</a></p>

@endif
@endforeach

@endsection