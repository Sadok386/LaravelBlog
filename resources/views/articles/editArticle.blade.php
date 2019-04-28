@extends('layouts/main')

@section('content')

    <form method="post" action="{{ $post->id }} ">
        @csrf
        <div class="col-md-12 mb-3 center">
            <label for="title">Title:</label>
            <input name="titre" type="text" class="form-control" id="title" value={{ $post->post_title }} required>


            <label for="name">Name of Article:</label>
            <input name="namePost" type="text" class="form-control" id="name" value={{$post->post_name}} required>

            <label for="myContent">Write your content </label>
            <textarea name="content" class="form-control" id="myContent" required>{{ $post->post_content }}</textarea>
            <br>

            <label for="category">Category:</label>
            <input name="cat" type="text" class="form-control" id="category" value={{ $post->post_category }} required>

            <button type="submit" class="btn btn-primary" style="float: right;">Edit !</button>
        </div>
    </form>

@endsection
