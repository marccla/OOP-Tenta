@extends('layouts.app')



@section('content')
<div class="div container">
  <div class="row">
    <div class="col-12 col-md-6 col-lg-6 p-5">

      <h2 class="text-center mb-3">Add Post</h2>
     
      <form action="/posts/add/" method="POST">
        @csrf
        <select class="custom-select" name="cat_id">
          <option selected>Open this select menu</option>
          @foreach ($posts->cat as $post)
           <option value="{{ $post->cat_id }}">{{ $post->cat_id }}</option>
          @endforeach
          

        </select>
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" id="title-input" placeholder="Enter Title" required>
          </div>
          <div class="form-group">
            <label for="image">Image</label>
            <input type="text" name="post_img" class="form-control" id="post_img"  placeholder="img/<img name>.<filetype>" required>
          </div>
          <div class="form-group">
            <label for="content">Content</label>
            <textarea type="text" rows="10" class="form-control" id="content-input" name="content" placeholder="Content" required></textarea>
            <input class="d-none" name="author" type="text" value="{{ Auth::user()->name }}">
          </div>
          <button type="submit" value="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <div class="col-12 col-md-6 col-lg-6 p-5">
      <h2 class="text-center mb-3">Posts</h2>

      @foreach($posts as $post)
      @if (Auth::user()->name === $post->author)
        <div>
          <h1>{{ $post->title }}</h1>
        <form action="/posts/{{ $post->id }}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn" value="DELETE" title="Delete">Delete</button>
        </form> 
                    
          <a class="btn" href="/posts/edit/{{ $post->id }}">Edit</a>
           
           <a class="btn" href="/posts/{{ $post->id }}">Show</a>
          
        </div>   
         @endif    
      @endforeach
      
    
    </div>
  </div>
</div>



@endsection

