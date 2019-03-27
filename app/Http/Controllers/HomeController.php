<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    //
    public function index() {
        $posts = \App\Post::orderBy('post_date','desc')->take(3)->get(); //get 3 last posts
        return view('welcome',array(
            'posts' => $posts,
            'titre' => 'Blog',
            'subheader' => 'Bienvenue sur notre Blog Laravel'
        )); 
    }
}
