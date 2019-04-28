<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\VarDumper;

class ArticleController extends Controller
{
    public function index()
    {
        $postsArticles = \App\Post::all(); //Récupère tous les posts de la BDD

        return view('articles', array(
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

    public function addComment($post_name)
    {
        //Récupère le post voulu et crée un nouveau commentaire avec les données voulues
        $post = \App\Post::where('post_name', $post_name)->first();

        $comment = new Comment();
        $comment->post_id = $post->id;
        $comment->comment_name = request('prenom');
        $comment->comment_content = request('content');
        $comment->comment_date = now();
        $comment->save();

        return back();

    }

    public function addArticleForm()
    {
        $users = \App\User::all();

        return view('articles/addArticle', array( //Pass the post to the view
            'titre' => 'Add Article',
            'users' => $users,
            'subheader' => 'Create here a new article'
        ));
    }

    public function addArticleFormAction()
    {

        $article = new Post();
        $article->post_title = request('titre');
        $article->post_name = request('namePost');
        $article->post_content = request('content');
        $article->post_category = request('cat');
        $article->post_author = request('author');
        $article->post_type = "article";
        $article->post_status = "actif";
        $article->post_date = now();
        $article->save();

        return back();

    }

    public function deleteArticle(Request $request)
    {
        $post = \App\Post::where('id',$request->id);
        $post->delete();

        return back();


    }
    public function editArticleFormAction(Request $request, $id)
    {
        $article = \App\Post::where('id',$id)->first();

        $article->post_title = $request->titre;
        $article->post_name = $request->namePost;
        $article->post_content = $request->myContent;
        $article->post_category = $request->cat;
        $article->post_date = now();
        $article->save();

        return back();

    }
    public function editArticleForm($id)
    {
        $post = \App\Post::where('id',$id)->first();
        return view('articles/editArticle', array( //Pass the post to the view
            'post' =>$post,
            'titre' => 'Edit Article',
            'subheader' => 'Edit your article here'
        ));
    }
}
