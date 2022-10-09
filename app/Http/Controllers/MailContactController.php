<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailContactController extends Controller
{
    //


    public function create()
    {
        return view('contact.index');
    }

    public function sendMail(Request $request)
    {
        $request->validate([

            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',

        ]);

        $data = $request->all();
        $validatedData = [
            'name' => $data['name'],
            'email' => $data['email'],
            'subject' => $data['subject'],
            'message' => $data['message']
        ];
        Contact::create($validatedData);

        Mail::to('support@admin.com')->send(new ContactMail($validatedData));
        return redirect()->back()->with(['success' => 'Merci, votre message a été bien enovoyé avec succès !!']);
    }
}
