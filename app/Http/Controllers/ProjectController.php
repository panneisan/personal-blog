<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $projects = Project::all();
       return view("project.index",compact("projects"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $projects = Project::latest()->paginate(5);
        return view("project.create",compact("projects"));
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
            'name'=>"required|min:4",
            "url"=>'required|unique:projects'
        ]);
        $project = new Project();
        $project->name =$request->name;
        $project->url =$request->url;
        $project->save();
        return redirect()->back()->with("toast","<b>$project->name</b> is successfully added 😊");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
//        return view("project.index",compact("project"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
       return view("project.edit",compact("project"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
//      return $request;
        $request->validate([
            'name'=>"required|min:4",
            "url"=>'required'
        ]);
        $project->name =$request->name;
        $project->url =$request->url;
        $project->update();
        return redirect()->route("project.index")->with("toast","<b>$project->name</b> is successfully Update 😊");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
       $project->delete();
       return redirect()->back()->with("toast","<b>$project->name</b> is successfully deleted 😊");

    }
}
