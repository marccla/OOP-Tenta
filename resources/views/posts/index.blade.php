@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
@foreach($posts as $post)

        <div class="div col-12 col-md-4 col-lg-3 card">
           <img src="{{ $post->img_url }}" style="max-width:150px">
             <a href="/posts/{{ $post->id }}">
                 <h2>{{ $post->title }}</h2>
            </a>
            <div class="card-body">
                <p>{{ Str::limit($post->content, $limit = 20, $end = '...') }}</p> 
            </div>
            <div class="card-footer">
                 <p>{{ $post->author->name }}</p>
             </div>
        </div>
        
@endforeach
    </div>
</div>
@endsection