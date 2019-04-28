@extends('layouts/main')

@section('content')
    <div class="card text-center border-dark mb-3 mx-auto" style="width: 18rem; border-radius: 1em">
        <!-- <img class="card-img-top" src="../storage\app\public\image\img_card.jpg" alt="Card image cap"> -->
        <div class="card-body">
            <h5 class="card-title text-info ">{{ $post->post_title }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">{{ $post->post_name }}</h6>
            <p class="card-text">{{ $post->post_content }}</p>
            <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
        </div>
        <div class="card-footer text-muted">
            Post at : {{ $post->post_date }} by {{ $nameauthor }}
        </div>
    </div>
    <div class="col-md-12 mb-3 center border">
    @foreach($comments as $comment)
    <div class="card text-center border-dark mb-3 mx-auto" style="width: 18rem; border-radius: 1em">
        <div class="card-body">
            <p class="card-text">{{ $comment->comment_content }}</p>
        </div>
        <div class="card-footer text-muted">
            {{ $comment->comment_name }}
        <br>
            {{ $comment->comment_date }}
        </div>
    </div>
    <br>
    @endforeach
    </div>
    <form method="post" action="/articles/{{$post->post_name}}">
        @csrf
    <div class="col-md-12 mb-3 center">
    <label for="name">Name:</label>
    <input name="prenom" type="text" class="form-control" id="name" required>
        <label for="usr">Write your comment juste en bas frr:</label>
    <textarea name="content" class="form-control" id="myComment" placeholder="La street avc les poto on gere le reso" required></textarea>
    <br>

    <button type="submit" class="btn btn-primary" style="float: right;">Envoyer !</button>
    </div>
    </form>

@endsection
