@extends('layouts.app')



@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <img src="/img/{{ $post->post_img }}"/>
            <h1>Titel: {{ $post->title }}</h1>
            <p>Innehåll: {{ $post->content }}</p>
            <p>Kategori: {{ $post->cat->cat_item }}
            <p>Skapad: {{ $post->created_at}}</p>
            <p>updaterad: {{ $post->updated_at}}</p>
            <p>Skrivet av: {{ $post->author->name }}</p>
            <a href="/posts">Back</a>
        </div>
        @if ($user = Auth::check())
            
        
        <div class="col-12 col-lg-6 m-auto">
                        <h2>Add a comment</h2>
                        <form action="/posts/{{ $post->id ?? '' }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="content">Comment</label>
                                <textarea type="text" rows="3" class="form-control" name="content" placeholder="Content" required></textarea>
                                <input class="" name="user_id" type="hidden" value="{{ Auth::user()->id }}">
                                <input class="" name="post_id" type="hidden" value="{{ $post->id }}">
                            </div>
                            <button type="submit" value="submit" class="btn btn-primary">Submit</button>
                            </form>
        </div>
        @else 
        <div class="col-12 col-md-6 col-lg-6 m-auto">
            <span> <a href="/login"> Login</a> to make a comment</span>
        </div>
        @endif
        <div class="col-12 col-md-6 col-lg-6 m-auto">
         
             <h3>Comments</h3>
        
            @foreach ($comments->reverse() as $comment)
            @if ($comment->post_id === $post->id)
            
            <p>{{ $comment->content }}</p>  
            <p>{{ $comment->author->name}} <small> commented at: {{ $comment->created_at}}</small></p>
          
            @endif 
            @endforeach
        </div>

    </div>
</div>




@endsection