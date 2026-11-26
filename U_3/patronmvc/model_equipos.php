<?php
// Guarda los datos
class ModelEquipos {
    // Array asociativo original de equipos de fútbol
    private array $liga = [
        "Real Betis" => [
            "escudo"     => "escudos/betis.png",
            "fundacion"  => 1907,
            "entrenador" => "Manuel Pellegrini",
            "jugadores"  => [
                "Isco Alarcón" => ["posicion" => "Centrocampista", "dorsal" => 22],
                "Ayoze Pérez"  => ["posicion" => "Delantero",      "dorsal" => 10],
                "Marc Bartra"  => ["posicion" => "Defensa",        "dorsal" => 15],
                "Rui Silva"    => ["posicion" => "Portero",        "dorsal" => 13]
            ]
        ],
        "Sevilla FC" => [
            "escudo"     => "escudos/sevilla.png",
            "fundacion"  => 1890,
            "entrenador" => "Matías Almeyda",
            "jugadores"  => [
                "Youssef En-Nesyri" => ["posicion" => "Delantero", "dorsal" => 15],
                "Jesús Navas"       => ["posicion" => "Defensa",   "dorsal" => 16],
                "Örjan Nyland"      => ["posicion" => "Portero",   "dorsal" => 13]
            ]
        ],
        "Villarreal CF" => [
            "escudo"     => "escudos/villarreal.png",
            "fundacion"  => 1923,
            "entrenador" => "Marcelino García Toral",
            "jugadores"  => [
                "Gerard Moreno" => ["posicion" => "Delantero",      "dorsal" => 7],
                "Dani Parejo"   => ["posicion" => "Centrocampista", "dorsal" => 10],
                "Raúl Albiol"   => ["posicion" => "Defensa",        "dorsal" => 3],
                "Alex Baena"    => ["posicion" => "Centrocampista", "dorsal" => 16],
                "Yeremy Pino"   => ["posicion" => "Delantero",      "dorsal" => 21]
            ]
        ]
    ];

    // Metadatos generales de la sección
    public function obtenerConfiguracion(): array {
        return [
            "titulo_pagina" => "Equipos de la Liga",
            "subtitulo"     => "Listado de clubes de fútbol y tamaño de su plantilla:",
            "etiqueta_sing" => "jugador",
            "etiqueta_plur" => "jugadores"
        ];
    }

    // Devuelve los datos sin calcular totales
    public function obtenerDatos(): array {
        $datosNormalizados = [];
        foreach ($this->liga as $nombreEquipo => $info) {
            $subelementos = [];
            foreach($info["jugadores"] as $nombreJugador => $jugador){
                $subelementos[] = [
                    "nombre" => $nombreJugador,
                    "categoria" => $jugador["posicion"],
                    "detalle" => "Dorsal " .$jugador["dorsal"]
                ];
            }
            $datosNormalizados[] = [
                "nombre"       => $nombreEquipo,
                "imagen"       => $info["escudo"],
                "detalle"      => "Fundación: " . $info["fundacion"] . " · Entrenador: " . $info["entrenador"],
                "subelementos" => $subelementos
            ];
        }
        return $datosNormalizados;
    }
}