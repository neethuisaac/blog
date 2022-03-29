<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function create(){
        return view('sessions.create');
    }

    public function store(){

        //dd(request());
        $attributes = request()->validate([
            'email' => ['required','email'],
            'password' => ['required']
        ]);

        if(auth()->attempt($attributes)){

            session()->regenerate();

            return redirect('/')->with('success','Welcome back');
        }

        // Authentication failed
        //return back()->withErrors(['email' => 'Your provided credentials could not be verified']);
        throw  ValidationException::withMessages(['email' => 'Exception : Your provided  credentials could not be verified']);
    }
    public function destroy(){
        //ddd('logging out');
        auth()->logout();

        return redirect('/')->with('success','You have logged out.');
    }

}
