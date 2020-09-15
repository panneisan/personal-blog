<?php

namespace App\Http\Controllers;

use App\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skills = Skill::latest()->get();
       return view("skill.index",compact('skills'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {      $skill = Skill::latest()->get();
        return view('skill.create',compact("skill"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        return $request;
        $request->validate([
            "name"=>'required|min:3',
            "percentage"=>'required'
        ]);
          $skill= new Skill();
        $skill->name = $request->name;
        $skill->percentage = $request->percentage;
        $skill->save();
        return redirect()->back()->with("toast","<b>$skill->name</b> is successfully added 😊");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function show(Skill $skill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function edit(Skill $skill)
    {
        $latest = Skill::latest()->get()->take(1);
        return view("skill.edit",compact('skill','latest'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Skill $skill)
    {
        $skill->name = $request->name;
        $skill->percentage = $request->percentage;
        $skill->update();
        return redirect()->route("skill.index")->with("toast","<b>$skill->name</b> is successfully updated 😊");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Skill $skill)
    {
      $name =$skill->name;
      $skill->delete();
      return redirect()->back()->with("toast","<b>$name</b> is successfully deleted 😊");
    }
}
