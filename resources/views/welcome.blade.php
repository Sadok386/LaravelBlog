@extends('layouts/main')
<style>
    li{
        list-style: none;
    }
    h1, ul {
        text-align: center;
    }
</style>
    @section('content')
        <h1>Derniers Articles :</h1>
        <ul>
        @foreach ( $posts as $post )
            <li><a href="/articles/{{ $post->post_name }}">{{ $post->post_title }}</a></li>
        @endforeach
        </ul>
    @endsection
