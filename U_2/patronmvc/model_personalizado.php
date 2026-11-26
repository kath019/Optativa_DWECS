<?php
// Guarda los datos: directores de cine y sus películas
class ModelPersonalizado {
    // Array asociativo original de directores
    private array $directores = [
        "Christopher Nolan" => [
            "foto"         => "directores/nolan.jpg",
            "nacimiento"   => 1970,
            "nacionalidad" => "Reino Unido",
            "peliculas"    => [
                "Memento"       => ["genero" => "Thriller",         "anio" => 2000],
                "El truco final" => ["genero" => "Thriller",        "anio" => 2006],
                "El caballero oscuro" => ["genero" => "Acción",     "anio" => 2008],
                "Origen"        => ["genero" => "Ciencia ficción",  "anio" => 2010],
                "Interstellar"  => ["genero" => "Ciencia ficción",  "anio" => 2014],
                "Oppenheimer"   => ["genero" => "Drama",            "anio" => 2023]
            ]
        ],
        "Quentin Tarantino" => [
            "foto"         => "directores/tarantino.jpg",
            "nacimiento"   => 1963,
            "nacionalidad" => "Estados Unidos",
            "peliculas"    => [
                "Reservoir Dogs"  => ["genero" => "Crimen", "anio" => 1992],
                "Pulp Fiction"    => ["genero" => "Crimen", "anio" => 1994],
                "Kill Bill: Vol. 1" => ["genero" => "Acción", "anio" => 2003],
                "Django desencadenado" => ["genero" => "Western", "anio" => 2012]
            ]
        ],
        "Pedro Almodóvar" => [
            "foto"         => "directores/almodovar.jpg",
            "nacimiento"   => 1949,
            "nacionalidad" => "España",
            "peliculas"    => [
                "Mujeres al borde de un ataque de nervios" => ["genero" => "Comedia", "anio" => 1988],
                "Todo sobre mi madre" => ["genero" => "Drama", "anio" => 1999],
                "Hable con ella"      => ["genero" => "Drama", "anio" => 2002],
                "Volver"              => ["genero" => "Drama", "anio" => 2006],
                "Dolor y gloria"      => ["genero" => "Drama", "anio" => 2019]
            ]
        ]
    ];

    // Metadatos generales de la sección
    public function obtenerConfiguracion(): array {
        return [
            "titulo_pagina" => "Directores de Cine",
            "subtitulo"     => "Listado de directores y número de películas destacadas:",
            "etiqueta_sing" => "película",
            "etiqueta_plur" => "películas"
        ];
    }

    // Devuelve los datos normalizados (lo que espera el Controlador)
    public function obtenerDatos(): array {
        $datosNormalizados = [];
        foreach ($this->directores as $nombreDirector => $info) {
            $subelementos = [];
            foreach ($info["peliculas"] as $titulo => $pelicula) {
                $subelementos[] = [
                    "nombre"    => $titulo,
                    "categoria" => $pelicula["genero"],
                    "detalle"   => "Estreno: " . $pelicula["anio"]
                ];
            }
            $datosNormalizados[] = [
                "nombre"       => $nombreDirector,
                "imagen"       => $info["foto"],
                "detalle"      => "Nacimiento: " . $info["nacimiento"] . " · Nacionalidad: " . $info["nacionalidad"],
                "subelementos" => $subelementos
            ];
        }
        return $datosNormalizados;
    }
}