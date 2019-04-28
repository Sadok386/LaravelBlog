@extends('layouts/main')

@section('content')

    <form method="post" action="addArticle">
        @csrf
        <div class="col-md-12 mb-3 center">
            <label for="title">Title:</label>
            <input name="titre" type="text" class="form-control" id="title" required>


            <label for="name">Name of Article:</label>
            <input name="namePost" type="text" class="form-control" id="name" required>

            <label for="myContent">Write your content </label>
            <textarea name="content" class="form-control" id="myContent" placeholder="Write a content" required></textarea>
            <br>

            <label for="category">Category:</label>
            <input name="cat" type="text" class="form-control" id="category" required>

            <label for="author">Select the author</label>
            <select name="author">
                @foreach($users as $user)
                <option name="userSelected" value={{$user->id}}>{{$user->name}}</option>
                @endforeach
            </select>


            <button type="submit" class="btn btn-primary" style="float: right;">Create !</button>
        </div>
    </form>

@endsection
