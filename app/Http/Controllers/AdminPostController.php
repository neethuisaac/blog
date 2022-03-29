<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class AdminPostController extends Controller
{
    public function index(){
        //dd(Post::latest()->get());
        return view('admin.posts.index',[
            'posts' => Post::latest()->get(),
        ]);
    }
}
