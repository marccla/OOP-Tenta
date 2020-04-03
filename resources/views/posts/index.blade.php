@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
@foreach($posts as $post)

        <div class="div col-12 col-md-4 col-lg-3">
           <img src="{{ $post->img_url }}" style="max-width:150px">
             <a href="posts/{{ $post->id }}">
                 <h1>{{ $post->title }}</h1>
            </a>
            <p>{{ $post->content }}</p>
            <p>{{ $post->author }}</p>
            
        </div>
        
@endforeach
    </div>
</div>
@endsection