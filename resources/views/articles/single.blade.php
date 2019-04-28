@extends('layouts/main')

@section('content')
    <br>
    <div class="card text-center border-dark mb-3 mx-auto" style="width: 18rem; border-radius: 1em">
        <div class="card-body">
            <h5 class="card-title text-info ">{{ $post->post_title }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">{{ $post->post_name }}</h6>
            <p class="card-text">{{ $post->post_content }}</p>
        </div>

        <div class="card-footer text-muted">
            Posté le {{ date('j F Y', strtotime($post->post_date)) }} à {{ date('G:i:s', strtotime($post->post_date)) }} par {{ $nameauthor }}
        </div>
    </div><br><br>
    <hr>
    <h3>Commentaires</h3><br><br>
    <div class="col-md-12 mb-3">
    @foreach($comments as $comment)
    <div class="card text-center border-dark mb-3 mx-auto" style="width: 25rem;">
        <div class="card-body">
            <p class="card-text">{{ $comment->comment_content }}</p>
        </div>
        <div class="card-footer text-muted">
            Posté le {{ date('j F Y', strtotime($comment->comment_date)) }} à {{ date('G:i:s', strtotime($comment->comment_date)) }}<br> par {{ $comment->comment_name }}
        </div>
    </div>
    <br>
    @endforeach
    </div><br>
    <h3>Ajouter un commentaire</h3><br>
    <form method="post" action="/articles/{{$post->post_name}}">
        @csrf
    <div class="col-md-12 mb-3 center">
    <label for="name">Identité:</label>
    <input name="prenom" type="text" class="form-control" id="name" required>
        <label for="usr">Votre commentaire:</label>
    <textarea name="content" class="form-control" id="myComment" placeholder="La street avc les poto on gere le reso" required></textarea>
    <br>

    <button type="submit" class="btn btn-primary" style="float: right;">Envoyer !</button>
    </div>
    </form><br><br>

@endsection
