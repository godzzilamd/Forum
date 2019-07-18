<?php

return [
    'custom' => [
        'name' => [
            'reqired' => 'Trebuie sa introduceti email-ul',
            'string' => 'Trebuie sa introduceti un text',
            'max' => 'Parola nu poate fi mai mare de 255 caractere',
        ],
        'email' => [
            'reqired' => 'Trebuie sa introduceti email-ul',
            'string' => 'Trebuie sa introduceti un text',
            'email' => 'Email-ul nu este corect',
            'max' => 'Parola nu poate fi mai mare de 255 caractere',
            'unique' => 'Acest email este deja ocupat',
        ],
        'password' => [
            'reqired' => 'Trebuie sa introduceti email-ul',
            'string' => 'Trebuie sa introduceti un text',
            'min' => 'Parola nu poate fi mai mica de 8 caractere',
            'confirmed' => 'Confirmati parola',
        ]

    ],
];