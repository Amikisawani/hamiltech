<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MessageContact;
use Illuminate\Support\Facades\Mail;
use App\Mail\NouveauContact;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string|max:1000',
        ]);

        $message = MessageContact::create($validated);

        Mail::to('amikisawani71@gmail.com')->send(new NouveauContact($message));

        session()->flash('success', 'Message envoyé!');
        return redirect()->back();

    }
}

