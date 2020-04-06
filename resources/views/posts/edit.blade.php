@extends('layouts.app')

@section('content')
@if (Auth::user()->name === $post->author->name)
<div class="div container">
  <div class="row">
    <div class="col-12 col-md-6 col-lg-6 p-5">

      <h2 class="text-center mb-3">Update a Post</h2>
  
      <form method="POST">
        @csrf
        
        <input type="hidden" name="_method" value="PUT">
          <div class="form-group">
            <label for="Title">Title</label>
          <input type="text" name="title" class="form-control" value="{{ $post->title }}">
          </div>
          <div class="form-group">
            <label for="Title">Image</label>
            <input type="text" name="post_img" class="form-control" value="{{ $post->img_url }}">
          </div>
          <div class="form-group">
            <label for="content">Content</label>
            <input type="text" name="content" rows="10" class="form-control" value="{{ $post->content }}">
            <input name="user_id" type="number" value="{{ Auth::user()->id }}">
          </div>
        <input type="submit" class="btn" value="submit"/>
        </form>
    </div>
    @else 
    <p> uh uh uh, you didnt say the magic word!</p>
    <a href="{{ URL::previous() }}">Back</a>
    @endif
    @endsection