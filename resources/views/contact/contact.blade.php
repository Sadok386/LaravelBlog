@extends('layouts/main')

@section('content')
<form action="{{ url('/contact') }}" method="POST">
    {{ csrf_field() }}
    <div class="form-group">
        <input type="text" class="form-control {{ $errors->has('contact_name') ? 'is-invalid' : '' }}" name="contact_name" id="contact_name" placeholder="Votre nom"
            value="{{ old('contact_name') }}"> {!! $errors->first('contact_name', '
            <div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group">
        <input type="email" class="form-control {{ $errors->has('contact_email') ? 'is-invalid' : '' }}" name="contact_email" id="contact_email" placeholder="Votre email"
            value="{{ old('contact_email') }}"> {!! $errors->first('contact_email', '
            <div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group">
        <textarea class="form-control {{ $errors->has('contact_message') ? 'is-invalid' : '' }}" name="contact_message" id="contact_message" placeholder="Votre message">{{ old('contact_message') }}</textarea>                            {!! $errors->first('contact_message', '
        <div class="invalid-feedback">:message</div>') !!}
    </div>
    <input type="datetime-local" id="contact_date"
       name="contact_date" value="{{ now() }}">
    <button type="submit" class="btn btn-primary">Envoyer !</button>
</form>

@endsection