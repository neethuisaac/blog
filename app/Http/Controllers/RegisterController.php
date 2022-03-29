<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;

class RegisterController extends Controller
{
    public function create(){
        return view('register.create');
    }
    public function store(){
        dd(request()->all());
        $attributes = request()->validate([
            'username' => ['required','min:6','max:255','unique:users,username'],
            'name' => 'required|min:3|max:255',
            'email' => ['required','email','max:255',Rule::unique('users','email')],
            'password' => ['required','min:6','max:255'],
        ]);
        //var_dump($attributes);
        //dd('successfully validated');
        $user = User::create($attributes);

        auth()->login($user);

        return redirect('/')->with('success','Your account has been created.');
    }
}
