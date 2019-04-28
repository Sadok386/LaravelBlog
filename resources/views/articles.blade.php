@extends('layouts/main')

<style>
    h1, ul {
        text-align: center;
    }
    div.polaroid {
        width: 20vw;
        background-color: white;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    img {width: 100%}

    div._container {
        text-align: center;
        padding: 10px 20px;
        width: 20vw;
        display:block;

    }

    div.polaroid{
        margin: 10px;
        display:inline-block;
    }

    div.polaroidContainer{
        width: 70vw;
        position: absolute;
        left: 15vw;
    }

    a *{
        color: #222222;
    }
</style>

@section('content')
    <center><a href="addArticle" class="btn btn-primary btn-lg" role="button" aria-disabled="true">Ajouter un article</a></center>
    <div class="polaroidContainer">
        @foreach ( $postsArticles as $key=>$postArticle )
            <div class="polaroid">
                <a href="/articles/{{$postArticle->post_name}}" class="polaroidLink">
                    <img src="img/{{$key % 3}}.jpg" alt="5 Terre" style="width:100%">
                    <div class="_container">
                        <h6>{{ $postArticle->post_title }}</h6>

                        <form action="deleteArticle" method="POST">
                            @csrf
                            <button name="id" value={{$postArticle->id}} type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                        <form method="GET" action="{{ action('ArticleController@editArticleForm', $postArticle->id) }}">
                            <button value={{$postArticle->id}} type="submit" class="btn btn-danger">Modifier</button>
                        </form>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endsection