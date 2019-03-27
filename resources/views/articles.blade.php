@extends('layouts/main')

<style>
    h1, ul {
        text-align: center;
    }
</style>

@section('content')
    <h1>Liste Article :</h1>
    <ul>
    @foreach ( $postsArticles as $postArticle )
        <li>{{ $postArticle->post_title }}</li>
    @endforeach
    </ul>
@endsection