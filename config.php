<?php
return [
    'menu' => [
        'home' => ['title' => 'Főoldal', 'visible' => true],
        'gallery' => ['title' => 'Inspirációk', 'visible' => true],
        'contact' => ['title' => 'Foglalás', 'visible' => true],
        'messages' => ['title' => 'Üzenetek', 'visible' => false], // Csak bejelentkezett
        'login' => ['title' => 'Belépés', 'visible' => true], // Csak nem bejelentkezett
        'logout' => ['title' => 'Kilépés', 'visible' => false], // Csak bejelentkezett
    ],
    'db' => [
        'host' => 'localhost',
        'dbname' => 'szucsadam1993',
        'user' => 'szucsadam1993',
        'pass' => 'SzAdam1993.08.19.' 
    ],
    'site' => [
        'title' => 'Szépségszalon',
        'address' => 'Budapest, Szépség utca 1, 1011',
        'map_lat' => 47.497912,
        'map_lng' => 19.039132,
        'base_url' => '/szepsegszalon' 
    ]
];
?>