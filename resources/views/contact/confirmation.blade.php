@extends('layouts/main')

@section('content')
<div class="row">
    <div class="col">
        <div class="alert alert-success" role="alert">
            Requête envoyée, vous allez être redirigé :)
        </div>
        <div class="card text-center border-dark mb-3 mx-auto" style="width: 18rem; border-radius: 1em">
            <h5 class="card-header">Contact Request</h5>
            <div class="card-body">
            <p class="card-text"> {{ $message }}</p>
            </div>
        </div>
    </div>
    <div class="col">
        <h1 style="text-align:center">List of Current contacts</h1>
        <ul style="list-style:none">
            @foreach ( $contacts as $contact )
            <li>Contact by {{ $contact->contact_name }} at {{ $contact->contact_date }}</li>
            @endforeach
    </ul>
    </div>
</div>
@endsection