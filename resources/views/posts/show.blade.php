@extends('layouts.app')



@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <img src="/img/{{ $post->post_img}}"/>
            <h1>Titel: {{ $post->title }}</h1>
            <p>Innehåll: {{ $post->content }}</p>
            <p>Kategori: {{ $post->cat->cat_item }}
            <p>Skapad: {{ $post->created_at}}</p>
            <p>updaterad: {{ $post->updated_at}}</p>
            <p>Skrivet av: {{ $post->author->name }}</p>
            <a href="{{ URL::previous() }}">Back</a>
        </div>

        <div class="col-12 mt-5">
         
             <h3>Comments</h3>
        
            @foreach ($comments as $comment)
            @if ($comment->post_id === $post->id)
            
            <p>{{ $comment->content }}</p>  
            <p>{{ $comment->author->name}} <small> commented at: {{ $comment->created_at}}</small></p>
          
            @endif 
            @endforeach
        </div>

    </div>
</div>




@endsection