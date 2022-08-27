<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Category;
use App\Models\Post;
class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
        //call paginate method form lib
        $post = Post::paginate(5);
        //get random 5 post
        $post_recommend = Post::inRandomOrder()->take(5)->get();
        //newsest 3 post
        $post_newsest = Post::orderBy('created_at', 'desc')->take(3)->get();
        //5most view post
        $post_view = Post::orderBy('post_view', 'desc')->take(5)->get();
        return view('pages.index',
            ['categories' => $category, 'posts' => $post , 'post_recommend' => $post_recommend , 'post_newsest' => $post_newsest, 'post_view' => $post_view]);
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $post_search = Post::where('post_title', 'like', '%'.$keyword.'%')->orWhere('post_content', 'like', '%'.$keyword.'%')->orWhere('post_desc', 'like', '%'.$keyword.'%')->get();
        $category = Category::all();

        return view('pages.search', ['categories' => $category, 'posts' => $post_search, 'keyword' => $keyword]);
    }
}
