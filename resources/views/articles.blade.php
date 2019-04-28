@extends('layouts/main')

<style>
    h1, ul {
        text-align: center;
    }
</style>

@section('content')
    <a href="addArticle" class="btn btn-primary btn-lg" role="button" aria-disabled="true">Add Article</a>

    <h1>Liste Article :</h1>
    <ul>
    @foreach ( $postsArticles as $postArticle )
        <li>{{ $postArticle->post_title }}
            <form action="deleteArticle" method="POST">
                @csrf
                <button name="id" value={{$postArticle->id}} type="submit" class="btn btn-danger">Delete</button>

            </form>
            <form method="GET" action="{{ action('ArticleController@editArticleForm', $postArticle->id) }}">

            <button value={{$postArticle->id}} type="submit" class="btn btn-danger">Edit</button>
            </form>

        </li>

    @endforeach
    </ul>
@endsection
