<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->get();
        return view("blog.index",compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view("blog.create",compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "title" => "required",
            "description" => "required",
            "photo" => "required|mimes:png,jpg,gif,jpeg",
            "category_id"=> "required",
        ]);

        $dir = "post-img/";
        $newName=uniqid()."_image.".$request->file("photo")->getClientOriginalExtension();
        $request->file('photo')->move($dir,$newName);

        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->category_id = $request->category_id;
        $post->photo=$dir.$newName;
        $post->save();

        return redirect()->route('post.create')->with("toast","<b>$post->title</b> is successfully uploaded 😊");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('blog.show',compact('post'));
    }
    public function showHide($id){
       $comment = Comment::findOrFail($id);
//       return $comment;
        $status = $comment->status == 'show'? 'hide': 'show';
            $comment->update([
                'status'=>$status,
            ]);
       return back()->with("toast","Comment Status Change Successfully");
    }

    /**index
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {    $categories = Category::all();
        return view('blog.edit',compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'category_id'=>'required'
        ]);

        if ($request->hasFile("photo")){
            $postPhoto = $post->photo;
            File::delete("post-img/".$postPhoto);

            $dir = "post-img/";
            $newName=uniqid()."_updateImage.".$request->file("photo")->getClientOriginalExtension();
            $request->file('photo')->move($dir,$newName);

            $post->title = $request->title;
            $post->description = $request->description;
            $post->category_id = $request->category_id;
            $post->photo= $dir.$newName;
            $post->update();

        }
        $post->title = $request->title;
        $post->description = $request->description;
        $post->category_id = $request->category_id;
        $post->update();
        return redirect()->route('post.index')->with("toast","<b>$post->title</b> is successfully Updated 😊");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index')->with("toast","<b>$post->title</b> is successfully Deleted 😊");

    }
}
