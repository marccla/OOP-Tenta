<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class PostController extends Controller
{
   public function index() {
       
        $posts = Post::all();
        return view('posts.index', [
            'posts' => $posts,
        ]);

   }

   public function show($id) {

    $post = Post::findOrFail($id);
    
    return view('posts.show', ['post' => $post]);
   }

   
   public function create() {

    $posts = Post::all();
    return view('posts.create', [
        'posts' => $posts,
    ]);
   }

   public function store() {
       $post = new Post();

       $post->title = request('title');
       $post->content = request('content');
       $post->post_img = request('post_img');
       $post->author = request('author');

       $post->save();

       
       return redirect('/posts/add');
       
   }
   public function edit($id) {
       $post = Post::find($id);
       
       return view('posts.edit')->with('post', $post);
   }

   public function update(Request $request, $id) {
    
    $post = Post::find($id);

    
    $post->title = request('title');
    $post->content = request('content');
    $post->post_img = request('post_img');
    $post->author = request('author');
    
    $post->save();

    return redirect('posts/add/');
   }
        
   

   public function destroy($id) {
    
        $post = Post::findOrFail($id);

        $post->delete();

        return redirect('posts/add');



  
   }
}
