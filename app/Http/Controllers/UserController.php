<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view("user.index",compact("users"));
    }
    public function destroy($id){
        $user=User::find($id);
        $name = $user->name;
        $user->delete();
        return redirect()->back()->with("toast","<b>$name</b> is successfully deleted 😊");

    }
    public function edit($id){
        $user = User::find($id);
        return view("user.edit",compact("user"));
    }
    public function update(Request $request,$id){
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;

        $path = "user-images/";
        if($request->hasFile('photo')){
                $newFileName = 'user_'.uniqid().'.'.$request->file('photo')->getClientOriginalExtension();
                $request->file('photo')->move($path, $newFileName);
                $user->photo = $path.$newFileName;
        }
        $user->save();

        return redirect()->route("user.index")->with("toast","<b>$user->name</b> is successfully updated😊");

    }

}
