<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function create() {
        return view('contact/contact',array(
            'titre' => 'Page Contact',
            'subheader' => 'Formulaire de contact',
        ));
    }

    public function store(ContactRequest $request) {

        \App\Contact::create ($request->all());

        $contacts = \App\Contact::all();
        return view('contact/confirmation',array(
            'titre' => 'Page Confirmation',
            'subheader' => 'Confirmation d"envoi',
            'message' => 'Merci. Votre message a été transmis. Vous recevrez une réponse soon.',
            'contacts' => $contacts
        ));

        
    }
}
