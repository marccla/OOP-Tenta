@extends('layouts.app')



@section('content')
<img src="localhost/img/{{ $post->img_url}}"/>
<h1>Titel: {{ $post->title }}</h1>
<p>Innehåll: {{ $post->content }}</p>
<p>Kategori: {{ $post->cat->cat_item }}
<p>Skapad: {{ $post->created_at}}</p>
<p>updaterad: {{ $post->updated_at}}</p>
<p>Skrivet av: {{ $post->author->name }}</p>
<a href="{{ URL::previous() }}">Back</a>

<h3>Comments</h3>
@foreach ($comments as $comment)

@if ($comment->post_id === $post->id)
<p>{{ $comment->content }}</p>  
<p>{{ $comment->author->name}}</p>  

@endif
    
@endforeach


@endsection