@component('mail::message')
# Introduction

Nous vous souhaitons la bienvenue au club de scrabble Braine Trust. Nous sommes très heureux de vous accueillir au sein de notre grande famille.

En vous inscrivant sur notre site, vous avez d'ores et déjà accès à votre espace personnel. 
Toutefois, avant de vous connectez à la page réservée aux membres, vous devriez soit venir en personne au club ou soit nous contacter directement sur notre site ou via l'adresse mail brainetrust@gmail.com. Merci pour votre compréhension.

@component('mail::button', ['url' => '/'])
Visitez le site
@endcomponent

A très bientôt !<br>
{{ config('app.name') }}
@endcomponent
