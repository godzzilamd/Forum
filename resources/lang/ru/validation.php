<?php

return [
    'custom' => [
        'name' => [
            'reqired' => 'Мы должны знать ваш имя',
            'string' => 'Вы должны написать текст',
            'max' => 'Пароль не может быть длинее чем 255 знаков',
        ],
        'email' => [
            'reqired' => 'Мы должны знать ваш емайл',
            'string' => 'Вы должны написать текст',
            'email' => 'Емайл не соответсвует нормам',
            'max' => 'Пароль не может быть длинее чем 255 знаков',
            'unique' => 'Этот емайл уже занят',
        ],
        'password' => [
            'reqired' => 'Мы должны знать ваш пароль',
            'string' => 'Вы должны написать текст',
            'min' => 'Пароль не может быть короче чем 8 знаков',
            'confirmed' => 'Подтвердите пароль',
        ]

    ],
];