<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['post_id','user_id','content','status'];
    public function getUser(){
        return $this->belongsTo(User::class,"user_id");
    }
}
