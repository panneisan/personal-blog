<?php

namespace App\Http\Controllers;

use App\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abouts = About::latest()->get();
        return view("about.index",compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("about.create");
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
            "about_text" => "required",
            "photo" => "required|mimes:png,jpg,gif,jpeg",
        ]);

        $dir = "about-img/";
        $newName=uniqid()."_image.".$request->file("photo")->getClientOriginalExtension();
        $request->file('photo')->move($dir,$newName);

        $about = new About();
        $about->title = $request->title;
        $about->about_text = $request->about_text;
        $about->photo=$dir.$newName;
        $about->save();

        return redirect()->route('about.create')->with("toast","<b>$about->title</b> is successfully uploaded 😊");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show(About $about)
    {
        return view('about.show',compact('about'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit(About $about)
    {
        return view('about.edit',compact('about'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, About $about)
    {
        if ($request->hasFile("photo")){
            $aboutPhoto = $about->photo;
            File::delete("about-img/".$aboutPhoto);

            $dir = "about-img/";
            $newName=uniqid()."_updateImage.".$request->file("photo")->getClientOriginalExtension();
            $request->file('photo')->move($dir,$newName);

            $about->title = $request->title;
            $about->about_text = $request->about_text;
            $about->photo= $dir.$newName;
            $about->update();

        }
        $about->title = $request->title;
        $about->about_text = $request->about_text;
        $about->update();
        return redirect()->route('about.index')->with("toast","<b>$about->title</b> is successfully Updated 😊");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy(About $about)
    {
        $about->delete();
        return redirect()->route('about.index')->with("toast","<b>$about->title</b> is successfully Deleted 😊");
    }
}
