<?php

namespace App\Http\Controllers;

use App\Models\Listener;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Favorites;

class ListenerController extends Controller
{
    public function index()
    {
        return view("listeners/login");
    }


    public function create()
    {
        return view("listeners/signup",["listener"=>Listener::get()]);
    }


    public function store(Request $request)
    {
        $obj = new Listener();
        $obj -> firstname = $request -> firstname;
        $obj -> lastname = $request -> lastname;
        $obj -> email = $request -> email;
        $obj -> phonenumber = $request -> phonenumber;
        $obj -> password = $request -> password;
        $obj->save();
        return redirect("login");
    }

    public function show(Listener $listener)
    {  
        $userId = session('user_id');
        $obj = Listener::find($userId);
        return view('interfaces/profile', ['user' => $obj ]);
    }

    public function edit(Listener $listener, $id)
    {
        $obj = Listener::find($id);
        return view('listeners/edit',["profile"=>$obj]);
    }

    public function update(Request $request, Listener $listener, $id)
    {
        $obj = Listener::find($id);

        $obj-> firstname = $request -> firstname;
        $obj-> lastname = $request -> lastname;
        $obj-> email = $request -> email;
        $obj-> phonenumber = $request -> phonenumber;
        $obj-> password = $request -> password;

        if ($request->hasFile('profile_picture')){
            $path = $request->file('profile_picture')->store('public');
            $filename = $request->file('profile_picture')->hashName();
            $obj->profile_picture= $filename;
        }

        $obj->update();
        return view("interfaces/profile",['user' => $obj]);
    }
    
    public function destroy(Listener $listener, $id)
    {
        $listener = Listener::find($id);
        $listener->favorites()->delete();
        $listener->delete();
        return redirect('login');
    }


    public function authenticate(Request $request, Listener $listener)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $user = Listener::where('email', $email)->first();
    
        if ($user && $user->password == $password) {
            session(['user_id' => $user->id]);
            return redirect('oursongs');
        } else {
            return redirect()->back()->with('error', 'Invalid email or password.');
        }
    }
    

    public function logout(){
      session()->flush();
      return redirect('login');
    }
    

}
    
