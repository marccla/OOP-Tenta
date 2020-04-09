@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="ml-auto mr-auto mb-5 text-center col-12">
            <h2>Latest Posts</h2>
        </div>
        
@foreach($posts as $post)

        <div class="div col-12 col-md-8 col-lg-7 card ml-auto mr-auto mb-2">
            <span><small class="thread-text">
                THREAD // <a href="/cats/{{ $post->cat->slug }}">{{ $post->cat->cat_item }}</a>
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
            
            @if (Auth::user()->is_admin ?? '' === 1)
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
    </div><!-- row ends -->
    <div class="col-6 mr-auto ml-auto mt-3">
        {{ $posts->links() }}
    </div>
</div> <!-- container ends -->


@endsection