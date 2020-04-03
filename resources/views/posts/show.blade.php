@extends('layouts.app')



@section('content')
<img src="localhost/img/{{ $post->img_url}}"/>
<h1>{{ $post->title }}</h1>
<p>{{ $post->content }}</p>
<p>Skapad: {{ $post->created_at}}</p>
<p>updaterad: {{ $post->updated_at}}</p>
<p>Skrivet av: {{ $post->author }}</p>
<a href="{{ URL::previous() }}">Back</a>

@endsection