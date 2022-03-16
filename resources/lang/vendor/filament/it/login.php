<?php

return [

    'title' => 'Login',

    'heading' => 'Accedi con il tuo account',

    'buttons' => [

        'submit' => [
            'label' => 'Accedi',
        ],

    ],

    'fields' => [

        'email' => [
            'label' => 'Indirizzo Email',
        ],
        'username' => [
            'label' => 'Nome utente (dppxxxxxxx)',
        ],

        'password' => [
            'label' => 'Password',
        ],

        'remember' => [
            'label' => 'Ricordami',
        ],

    ],

    'messages' => [
        'failed' => 'I tuoi dati di accesso non sono corretti.',
        'throttled' => 'Troppi tentativi di accesso. Riprova tra :seconds secondi.',
    ],

];
