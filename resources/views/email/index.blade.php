
@component('mail::message')
# Message de contact
<p>Expéditeur : {{$data['name']}} {{$data['email']}}</p>
<p>Objet :{{$data['subject']}} </p>
<p class="p-3">{{$data['message']}}</p>

@component('mail::button', ['url' => 'http://brainetrust-php.test'])
Visitez le site
@endcomponent

A très bientôt !<br>
{{ config('app.name') }}
@endcomponent