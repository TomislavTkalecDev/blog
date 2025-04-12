<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() 
    {
        $post = "Laravel Tutorial Series One!";
        dd($post);
        return view('posts.index', ['post'=> $post]);
    }
}
