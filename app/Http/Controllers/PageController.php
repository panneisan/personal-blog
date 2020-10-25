<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Like;
use App\Post;
use App\Project;
use App\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function index(){
        $skills = Skill::paginate(5);
        $project  = Project::latest()->get();
        $post=Post::latest()->get();

        return view("frontend.index",compact('skills',"project","post"));
    }
    public function blog(){
        if (!Auth::check()){
            return redirect()->route('login');
        }

        $categories = Category::get();
        $posts = Post::latest()->paginate(7);
        return view("frontend.blog",compact("categories","posts"));
    }
    public function blogDetail($postId){

        $post = Post::find($postId);
        $like = Like::where('post_id',$postId)->where("type","like")->get();
        $dislike = Like::where('post_id',$postId)->where("type","dislike")->get();

        $likeStatus = Like::where('post_id',$postId)->where("user_id",Auth::user()->id)->first();
        $comment=Comment::where('post_id',$postId)->where('status','show')->get();

        return view("frontend.blog-detail",compact('post',"like","dislike","likeStatus","comment"));
    }

    public function search(Request $request){
        $searchDate = $request['search_data'];
        $categories = Category::all();
        $posts = Post::where('title','like','%'.$searchDate."%")
                        ->orWhere("description",'like','%'.$searchDate."%")
                        ->orWhereHas('getCategory',function ($category) use($searchDate){
                            $category->where('cat_title',"like","%".$searchDate."%");
                        })
                        ->paginate(7);
        return view("frontend.blog",compact("categories","posts"));
    }
      public function searchCategory($catId){

          $categories = Category::all();
          $posts = Post::where('category_id',$catId)->paginate(5);
          return view("frontend.blog",compact("categories","posts"));

      }

}
