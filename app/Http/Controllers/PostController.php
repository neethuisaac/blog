<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;

class PostController extends Controller
{
    public function index(){

        return view('posts.index',[
            'posts' => Post::latest()->filter(
                request(['search','category','author'])
            )->paginate(6)->withQueryString(),
        ]);
    }

    public function show(Post $post){
        return view('posts.show',[
            'post' => $post
        ]);
    }

    public function create(){
        return view('posts.create',[
            'categories' => Category::all(),
        ]);
    }

    public function store(){
        //ddd(request()->all());
        //dd(request()->file('thumbnail'));
        $attributes = request()->validate([
            'title' => 'required|min:1|max:200',
            'excerpt' => 'required|min:10|max:400',
            'slug' => ['required','min:2','max:100',Rule::unique('posts','slug')],
            'thumbnail' => 'required|image',
            'category_id' => ['required',Rule::exists('categories','id')],
            'body' => 'required|min:20|max:1000'
        ]);
        $attributes['user_id'] = auth()->user()->id;
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        Post::create($attributes);
        return redirect("/")->with(['success' => 'You have created a post successfully.']);
    }
}
