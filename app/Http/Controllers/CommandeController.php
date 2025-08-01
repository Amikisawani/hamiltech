<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\NouvelleCommande;

class CommandeController extends Controller
{
    public function store(Request $request)
    {
        
        dd(config('mail.username'), config('mail.password'));
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email',
            'telephone' => 'required|string|max:20',
            'service' => 'required|string',
            'message' => 'nullable|string',
        ]);

        $commande = Commande::create($validated);

        // Envoi de mail au propriétaire du site
        Mail::to('amikisawani71@gmail.com')->send(new NouvelleCommande($commande));

        session()->flash('success', 'Commande envoyée!');
        return redirect()->back();

    }
}
