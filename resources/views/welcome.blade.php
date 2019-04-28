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
        <h1>Derniers articles :</h1>
        <div class="polaroidContainer">
            @foreach ( $posts as $key=>$postArticle )
                <div class="polaroid">
                    <a href="/articles/{{$postArticle->post_name}}" class="polaroidLink">
                        <img src="img/{{$key % 3}}.jpg" alt="5 Terre" style="width:100%">
                        <div class="_container">
                            <h6>{{ $postArticle->post_title }}</h6>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    @endsection
