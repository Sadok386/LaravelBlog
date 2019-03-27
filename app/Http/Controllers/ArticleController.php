<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(){
        $postsArticles = \App\Post::all(); //Récupère tous les posts de la BDD

        return view('articles',array(
            'titre' => 'Page Articles',
            'postsArticles' => $postsArticles,
            'subheader' => 'Subheader de la page article'
        ));
    }

    public function show($post_name) {
        $post = \App\Post::where('post_name',$post_name)->first(); //get first post with post_name == $post_name
        $nameauthor = $post->author->name;

        return view('articles/single',array( //Pass the post to the view
            'post' => $post,
            'titre' => 'Article '.$post_name,
            'nameauthor' => $nameauthor,
            'subheader' => 'Détail pour un article demandé'
        ));
     }
     
}
