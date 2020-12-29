<?php

namespace App\Http\Controllers;

use App\certificate;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $certificate = Certificate::latest()->get();
        return view("certificate.index",compact('certificate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('certificate.create');

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
            "name" => "required",
            "start_date" => "required",
            "end_date" => "required",
            "location"=> "required",
            "photo" => "required|mimes:png,jpg,gif,jpeg",
        ]);
        $dir = "certificate-img/";
        $newName=uniqid()."_image.".$request->file("photo")->getClientOriginalExtension();
        $request->file('photo')->move($dir,$newName);

        $certificate = new Certificate();
        $certificate->name = $request->name;
        $certificate->start_date = $request->start_date;
        $certificate->end_date = $request->end_date;
        $certificate->location = $request->location;
        $certificate->photo=$dir.$newName;
        $certificate->save();

        return redirect()->route('certificate.create')->with("toast","<b>$certificate->name</b> is successfully uploaded 😊");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function show(certificate $certificate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function edit(certificate $certificate)
    {
        return view("certificate.edit",compact('certificate'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, certificate $certificate)
    {
        if ($request->hasFile("photo")){
            $certificatePhoto = $certificate->photo;
            File::delete("certificate-img/".$certificatePhoto);

            $dir = "certificate-img/";
            $newName=uniqid()."_updateImage.".$request->file("photo")->getClientOriginalExtension();
            $request->file('photo')->move($dir,$newName);

            $certificate->name = $request->name;
            $certificate->start_date = $request->start_date;
            $certificate->end_date = $request->end_date;
            $certificate->photo= $dir.$newName;
            $certificate->location= $request->location;
            $certificate->update();

        }
        $certificate->name = $request->name;
        $certificate->start_date = $request->start_date;
        $certificate->end_date = $request->end_date;
        $certificate->location= $request->location;
        $certificate->update();

        return redirect()->route('certificate.create')->with("toast","<b>$certificate->name</b> is successfully updated 😊");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function destroy(certificate $certificate)
    {
        $certificate->delete();

        return redirect()->route("certificate.index")->with("toast","<b>$certificate->name</b> is successfully deleted 😊");

    }
}
