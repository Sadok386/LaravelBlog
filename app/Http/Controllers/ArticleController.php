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
            'subheader' => 'Subheader de la page article'
        ));
    }

    public function show($post_name)
    {
        $post = \App\Post::where('post_name', $post_name)->first(); //get first post with post_name == $post_name
        $comments = \App\Comment::where('post_id', $post->id)->get();
        $nameauthor = $post->author->name;
        return view('articles/single', array( //Pass the post to the view
            'post' => $post,
            'titre' => 'Article ' . $post_name,
            'nameauthor' => $nameauthor,
            'subheader' => 'Détail pour un article demandé',
            'comments' => $comments,
        ));
    }

    public function getComment()
    {
        return view('articles/single');

    }

    public function addComment($post_name)
    {
        $post = \App\Post::where('post_name', $post_name)->first(); //get first post with post_name == $post_name

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
    public function editArticleFormAction(Request $request)
    {
        $post = \App\Post::where('id',$request->id);

        return view('articles/editArticle/', array( //Pass the post to the view
            'titre' => 'Edit Article',
            'subheader' => 'Edit your article here'
        ));
    }
    public function editArticleForm($id)
    {
        $post = \App\Post::where('id',$id);
        VarDumper::dump($post);die;
        $postId = $post->id;
        return view('articles/editArticle', array( //Pass the post to the view
            'postId'=> $postId,
            'post' =>$post,
            'titre' => 'Edit Article',
            'subheader' => 'Edit your article here'
        ));
    }
}
