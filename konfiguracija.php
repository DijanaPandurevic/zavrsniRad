<?php

if(
    $_SERVER['HTTP_HOST'] === 'localhost' ||
    $_SERVER['SERVER_ADDR']==='127.0.0.1' ||
    $_SERVER['HTTP_HOST'] === 'mojekiflice.hr'
    ){

    return [
        'nazivAPP' => 'Moje kiflice LOKALNO',
        'url' => 'http://mojekiflice.hr/',
        'dev' => true,
        'db' =>[
            'server' => 'localhost',
            'baza' => 'zavrsni_rad',
            'korisnik' => 'dijana',
            'lozinka' => '0505'
            ]
        ];
    }else{

        return [
            'nazivAPP' => 'Moje kiflice INTERNET',
            'url' => 'http://polaznik08.edunova.hr/',
            'dev' => false,
            'db' =>[
                'server' => 'localhost',
                'baza' => 'zavrsni_rad',
                'korisnik' => 'dijana',
                'lozinka' => '0505'
            ]
        ];
        }