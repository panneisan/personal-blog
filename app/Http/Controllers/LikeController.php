<?php

namespace App\Http\Controllers;

use App\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
   public function like($postId){
       $isExist = Like::where('post_id',"=",$postId)->where('user_id',"=",Auth::user()->id)->first();
       if ($isExist){
           if ($isExist->type == "like"){
               return back();
           }else{
               Like::where('id',$isExist->id)->update([
                   'type'=>'like'
               ]);
           }
           return back();
       }
       else{
           Like::create([
               'post_id'=>$postId,
               'user_id'=>Auth::user()->id,
               'type'=>"like"
           ]);
           return back();
       }

   }
    public function disLike($postId){
        $isExist = Like::where('post_id',"=",$postId)->where('user_id',"=",Auth::user()->id)->first();
//        return $isExist;
        if ($isExist){
            if ($isExist->type == "dislike"){
              return back();
            }else{
             Like::where('id',$isExist->id)->update([
                 'type'=>'dislike'
             ]);
            }
            return back();
        }
        else{
            Like::create([
                'post_id'=>$postId,
                'user_id'=>Auth::user()->id,
                'type'=>"dislike"
            ]);
            return back();
        }
    }

}
