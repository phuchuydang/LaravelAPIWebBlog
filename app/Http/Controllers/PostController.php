<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('layouts.post.index', ['posts' => Post::all()->sortBy('created_at')], ['categories' => Category::all()->sortBy('created_at')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('layouts.post.create',['categories' => Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post();
        $post->post_title = $request->title;
        $post->post_desc = $request->desc;
        $post->post_content = $request->contents;
        $post->post_category_id = $request->category_id;
        $post->post_view = 0;
        //remove the old image before update
        //compare the same image
        if($request->hasFile('image')){
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $imageName = time().'_'.$fileName;
            Storage::disk('public')->putFileAs('images', $file, $imageName);
            $post->post_image = $imageName;
        } else {
            $post->post_image = "default.png";
        }
        $post->save();
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        return view('layouts.post.show', ['post' => Post::find($id), 'categories' => Category::all()->sortBy('created_at')]);
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
        $post = Post::find($id);
        $post->post_title = $request->title;
        $post->post_desc = $request->desc;
        $post->post_content = $request->contents;
        $post->post_category_id = $request->category_id;
        $post->post_view = 0;
        if($request->post_image != $post->image){
            if($request->hasFile('image')){
                Storage::delete('public/images/'.$post->post_image);
                $file = $request->file('image');
                $fileName = $file->getClientOriginalName();
                $imageName = time().'_'.$fileName;
                Storage::disk('public')->putFileAs('images', $file, $imageName);
            } else {
                $file = $request->file('image');
                $fileName = $file->getClientOriginalName();
                $imageName = time() . '_' . $fileName;
                Storage::disk('public')->putFileAs('images', $file, $imageName);

            }
        } else {
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $imageName = time().'_'.$fileName;
            Storage::disk('public')->putFileAs('images', $file, $imageName);
        }
        $post->post_image = $imageName;
        $post->save();
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $post = Post::find($id);
        $path = public_path('public/uploads/images/'.$post->post_image);
        if(file_exists($path)){
            unlink($path);
        }
        $post->delete();
        return redirect()->route('post.index');
    }
}
