@component('mail::message')
# Nouveau message reçu

Nom : **{{ $messageContact->nom }}**  
Email : **{{ $messageContact->email }}**

## Message :
{{ $messageContact->message }}

@component('mail::footer')
HamilTech – Contact direct depuis le site
@endcomponent
@endcomponent

