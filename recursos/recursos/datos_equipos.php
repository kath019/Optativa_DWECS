
<?php
// Array multidimensional con escudo, año de fundación, entrenador y sub-array de jugadores
$liga = [
    "Real Betis" => [
        "escudo"     => "escudos/betis.png",
        "fundacion"  => 1907,
        "entrenador" => "Manuel Pellegrini",
        "jugadores"  => [
            "Isco Alarcón" => ["posicion" => "Centrocampista", "dorsal" => 22],
            "Antony"  => ["posicion" => "Delantero",      "dorsal" => 7],
            "Marc Bartra"  => ["posicion" => "Defensa",        "dorsal" => 5],
            "Hector Bellerín"  => ["posicion" => "Defensa",        "dorsal" => 2],
            "Álvaro Valles"    => ["posicion" => "Portero",        "dorsal" => 1]
        ]
    ],
    "Sevilla FC" => [
        "escudo"     => "escudos/sevilla.png",
        "fundacion"  => 1890,
        "entrenador" => "Luis García",
        "jugadores"  => [
            "Robbie Ure" => ["posicion" => "Delantero", "dorsal" => 9],
            "Kike Salas"       => ["posicion" => "Defensa",   "dorsal" => 4],
            "Peque"     => ["posicion" => "Delantero", "dorsal" => 10],
            "Odysseas"      => ["posicion" => "Portero",   "dorsal" => 1]
        ]
    ],
    "Villarreal CF" => [
        "escudo"     => "escudos/villarreal.png",
        "fundacion"  => 1923,
        "entrenador" => "Íñigo Pérez",
        "jugadores"  => [
            "Gerard Moreno" => ["posicion" => "Delantero",      "dorsal" => 7],
            "Nicolas Pepé"   => ["posicion" => "Centrocampista", "dorsal" => 19],
            "Juan Foyth"   => ["posicion" => "Defensa",        "dorsal" => 8],
            "Alberto Moleiro"    => ["posicion" => "Centrocampista", "dorsal" => 10]
        ]
    ]
];