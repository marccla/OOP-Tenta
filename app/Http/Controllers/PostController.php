<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use App\Cat;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Str;

class PostController extends Controller
{
   public function index() {
       
        
        $posts = Post::all();
        $posts = Post::orderBy('updated_at', 'desc')->paginate(15);
        return view('posts.index', [
            'posts' => $posts,
        ]);

    

   }

   public function show($slug) {

    $comments = Comment::all();
    
    // $post = Post::findOrFail($id);
    $post = Post::where('slug', $slug)->firstOrFail();

    return view('posts.show', [
        'post' => $post,
        'comments' => $comments,
        ]);
   }

   
   public function create() {

    $cats = Cat::all();
    $posts = Post::all();
    return view('posts.create', [
        'posts' => $posts 
    ],
    [
        'cats' => $cats
    ]);
   }

   public function store(Request $request) {

       $cats = Cat::all();
       $post = new Post();

       $post->title = request('title');
       $post->content = request('content');
       $post->post_img = request('post_img');
       $post->user_id = request('user_id');
       $post->cat_id = request('cat_id');
       $post->slug = Str::slug(request('title')); 
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
    $post->user_id = request('user_id');
    
    $post->save();

    return redirect('posts/add/');
   }
        
   

   public function destroy($id) {
    
        $post = Post::findOrFail($id);

        $post->delete();

        return redirect('posts/add');



  
   }
}
