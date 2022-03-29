<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(){
        $attributes = request()->validate([
            'body' => ['required'],
            'post_id' => ['required'],
        ]);
        $attributes['user_id'] = auth()->id();
        Comment::create($attributes);
        return back();
    }
}
