@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
@foreach($posts as $post)

        <div class="div col-12 col-md-8 col-lg-7 card m-auto mb-1">
            <span><small class="thread-text">
                THREAD // {{ $post->cat->cat_item }}
            </small></span>
            <a href="/posts/{{ $post->slug }}">
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
            @if (Auth::user()->is_admin === 1)
            <div class="admin-panel d-flex card-footer">
             <h4>Admin Panel</h4>
            <form action="/posts/{{ $post->id }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn" value="DELETE" title="Delete">Delete</button>
            </form> 
                        
              <a class="btn" href="/posts/edit/{{ $post->id }}">Edit</a>
               
               <a class="btn" href="/posts/{{ $post->id }}">Show</a>
              
            </div>   
             @endif    
        </div>
    
@endforeach
    </div>
    {{ $posts->links() }}
</div>
@endsection