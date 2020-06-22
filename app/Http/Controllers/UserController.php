<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function view(){
        $users = User::all();
        return view('user.view', compact('users'));

    }
    public function addform(){
        return view('Auth.register');
    }
    public function add(Request $request){
        $users = new User;
        $users->firstName = $request->firstname;
        $users->lastName = $request->lastname;
        $users->email = $request->email;
        $users->password = Hash::make($request->password);
        $users->role = $request->role;
        $users->position_id = $request->position;
        $users -> save();
        return "add";
    }
}
