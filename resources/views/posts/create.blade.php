@extends('layouts.app')



@section('content')
<div class="div container">
  <div class="row">
    <div class="col-12 col-md-6 col-lg-6 p-5">

      <h2 class="text-center mb-3">Add Post</h2>
     
      <form action="/posts/add/" method="POST">
        @csrf
        <div class="form-group">
        <select name="cat_id" class="custom-select" required>
          <h2>Choose a category<h2>
          @foreach ($cats as $cat)
           <option value="{{ $cat->id }}">{{ $cat->cat_item }}</option >
          @endforeach        
        </select>
        </div>
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
            <textarea type="text" rows="10" class="form-control" name="content" placeholder="Content" required></textarea>
            <input class="" name="user_id" type="hidden" value="{{ Auth::user()->id }}">
          </div>
          <button type="submit" value="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <div class="col-12 col-md-6 col-lg-6 p-5">
      <h2>Create a new Category</h2>
      <span><small>if no category suits you, please add a new one.</small></span>
    <form action="/posts/add/cat" method="POST">
      @csrf
      <div class="form-group">
        <input type="text" name="cat_item" class="form-control"  placeholder="Name of your own category" required>
      </div>
      <button type="submit" value="submit" class="btn btn-primary">Submit</button>
      </form>
      </div>

    </div>

    <div class="col-12 col-md-6 col-lg-6 p-5">
      <h2 class="text-center mb-3">Posts</h2>

      @foreach($posts as $post)
      @if (Auth::user()->id === $post->user_id)
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

