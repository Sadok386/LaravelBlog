<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\VarDumper;

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
        $comments =  \App\Comment::where('post_id',$post->id)->get();
        $nameauthor = $post->author->name;
        return view('articles/single',array( //Pass the post to the view
            'post' => $post,
            'titre' => 'Article '.$post_name,
            'nameauthor' => $nameauthor,
            'subheader' => 'Détail pour un article demandé',
            'comments' => $comments,
        ));
     }

    public function getComment()
    {
        return view('articles/single');

    }
     public function addComment($post_name){
         $post = \App\Post::where('post_name',$post_name)->first(); //get first post with post_name == $post_name

         $comment = new Comment();
         $comment->post_id = $post->id;
         $comment->comment_name = request('prenom');
         $comment->comment_content = request('content');
         $comment->comment_date = now();
         $comment->save();

         return back();

     }

     
}
