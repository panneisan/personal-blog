<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
   public function comment(Request $request,$postId){
//       dd($postId);
       $request->validate([
           'content'=>'required',
       ]);
       Comment::create([
           'post_id'=>$postId,
            'user_id'=>Auth::user()->id,
            'content'=> $request->content,
       ]);
       return back();
   }
         public function show($postId){
          $comment = Comment::where('post_id',$postId)->get();
//          return $comment;
             return view("blog.comment",compact('comment'));
         }
}
