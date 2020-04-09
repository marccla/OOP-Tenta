<?php

namespace App\Http\Controllers;

use App\Cat;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Illuminate\Support\Str;

class CatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats = Cat::all();
        return view('welcome', [
            'cats' => $cats,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $cat = new Cat();
        $cat->cat_item = request('cat_item');
        $cat->slug = Str::slug(request('cat_item'));

        $cat->save();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cat  $cat
     * @return \Illuminate\Http\Response
     */
    public function show(Cat $cat, $slug)
    {
        //
        $posts = Post::all();
        $posts = Post::orderBy('updated_at', 'desc')->paginate(15);
        $cats = Cat::where('slug', $slug)->firstOrFail();
        return view('cats.show', [
            'cats' => $cats,
            'posts' => $posts,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cat  $cat
     * @return \Illuminate\Http\Response
     */
    public function edit(Cat $cat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cat  $cat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cat $cat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cat  $cat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cat $cat)
    {
        //
    }
}
