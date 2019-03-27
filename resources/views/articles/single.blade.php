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
@endsection