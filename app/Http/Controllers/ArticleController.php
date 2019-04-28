<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\VarDumper;

class ArticleController extends Controller
{
    public function index(){

        //Récupère tous les posts de la BDD
        $postsArticles = \App\Post::all();

        return view('articles',array(
            'titre' => 'Page Articles',
            'postsArticles' => $postsArticles,
            'subheader' => 'Retrouvez ici tous les articles postés sur le site'
        ));
    }

    public function show($post_name) {
        //Récupère le premier post avec le nom voulu
        $post = \App\Post::where('post_name',$post_name)->first();
        //Récupère les commentaires associés
        $comments =  \App\Comment::where('post_id',$post->id)->get();
        $nameauthor = $post->author->name;
        return view('articles/single',array(
            'post' => $post,
            'titre' => $post_name,
            'nameauthor' => $nameauthor,
            'subheader' => 'Détails de l\'article',
            'comments' => $comments,
        ));
     }

    public function getComment()
    {
        return view('articles/single');

    }
     public function addComment($post_name){
        //Récupère le post voulu et crée un nouveau commentaire avec les données voulues
         $post = \App\Post::where('post_name',$post_name)->first();

         $comment = new Comment();
         $comment->post_id = $post->id;
         $comment->comment_name = request('prenom');
         $comment->comment_content = request('content');
         $comment->comment_date = now();
         $comment->save();

         return back();

     }

     
}
