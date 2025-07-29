@component('mail::message')
# Nouvelle commande reçue

Vous avez reçu une nouvelle commande de **{{ $commande->nom }}** :

- **Email** : {{ $commande->email }}
- **Téléphone** : {{ $commande->telephone }}
- **Service demandé** : {{ $commande->service }}

## Message :
{{ $commande->message ?? 'Aucun message fourni.' }}

@component('mail::footer')
HamilTech – Tous droits réservés.
@endcomponent
@endcomponent
