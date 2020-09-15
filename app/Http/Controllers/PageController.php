<?php

namespace App\Http\Controllers;

use App\Skill;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        $skills = Skill::paginate(6);
        return view("frontend.index",compact('skills'));
    }
    public function blog(){
        return view("frontend.blog");
    }
    public function blogDetail(){
        return view("frontend.blog-detail");
    }

}
