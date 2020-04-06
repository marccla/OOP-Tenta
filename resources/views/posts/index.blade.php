@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
@foreach($posts as $post)

        <div class="div col-11 col-md-4 col-lg-3 card m-sm-auto">
            <a href="/posts/{{ $post->id }}">
           <img src="{{ $post->img_url }}" style="max-width:150px">
             
                 <h2>{{ $post->title }}</h2>
            
            <div class="card-body">
                <p>{{ Str::limit($post->content, $limit = 20, $end = '(...)') }}</p> 
            </div>
            <div class="card-footer">
                 <span>{{ $post->author->name }}, </span>
                 <small>{{ $post->created_at }}</small>
             </div>
            </a>
        </div>
    
@endforeach
    </div>
</div>
@endsection