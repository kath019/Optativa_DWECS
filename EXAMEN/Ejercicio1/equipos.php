
<?php
// Array multidimensional con escudo, año de fundación, entrenador y sub-array de jugadores
$liga = [
    "Real Betis" => [
        "escudo"     => "escudos/betis.png",
        "fundacion"  => 1907,
        "entrenador" => "Manuel Pellegrini",
        "cantidadJugadores" => 5,
        "jugadores"  => [
            "Isco Alarcón" => ["posicion" => "Centrocampista", "dorsal" => 22],
            "Antony"  => ["posicion" => "Delantero",      "dorsal" => 7],
            "Marc Bartra"  => ["posicion" => "Defensa",        "dorsal" => 5],
            "Hector Bellerín"  => ["posicion" => "Defensa",        "dorsal" => 2],
            "Álvaro Valles"    => ["posicion" => "Portero",        "dorsal" => 1]
        ],
    ],
    "Sevilla FC" => [
        "escudo"     => "escudos/sevilla.png",
        "fundacion"  => 1890,
        "entrenador" => "Luis García",
        "cantidadJugadores" => 4,
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
        "cantidadJugadores" => 4,
        "jugadores"  => [
            "Gerard Moreno" => ["posicion" => "Delantero",      "dorsal" => 7],
            "Nicolas Pepé"   => ["posicion" => "Centrocampista", "dorsal" => 19],
            "Juan Foyth"   => ["posicion" => "Defensa",        "dorsal" => 8],
            "Alberto Moleiro"    => ["posicion" => "Centrocampista", "dorsal" => 10]
        ]
    ]
];

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado Principal</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 30px;
            color: #333;
        }

        .container {
            max-width: 700px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 25px 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #1a252f;
            margin-top: 0;
            border-bottom: 2px solid #007bff;
            padding-bottom: 10px;
            font-size: 24px;
        }

        p.descripcion {
            color: #6c757d;
            margin-bottom: 20px;
        }

        /* Estilo preparado para el contenedor del formulario de filtrado */
        .caja-filtro {
            background-color: #f8fafc;
            border: 1px solid #e2e8f0;
            padding: 15px;
            border-radius: 6px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .caja-filtro label {
            font-weight: 600;
            color: #334155;
            font-size: 14px;
        }

        .caja-filtro select {
            padding: 8px 12px;
            border-radius: 4px;
            border: 1px solid #cbd5e1;
            font-size: 14px;
            outline: none;
            background-color: #ffffff;
            cursor: pointer;
        }

        .caja-filtro select:focus {
            border-color: #007bff;
        }

        .tarjeta-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 12px 16px;
            margin-bottom: 15px;
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            background-color: #ffffff;
            transition: transform 0.1s ease, box-shadow 0.1s ease;
        }

        .tarjeta-item:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
            border-color: #cbd5e1;
        }

        .item-imagen {
            width: 45px;
            height: 45px;
            object-fit: contain;
            border-radius: 6px;
            margin-right: 15px;
        }

        .item-form {
            flex-grow: 1;
        }

        .item-titulo-btn {
            background: none;
            border: none;
            color: #0f172a;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            padding: 0;
            text-align: left;
            width: 100%;
        }

        .item-titulo-btn:hover {
            color: #007bff;
            text-decoration: underline;
        }

        .item-subtitulo {
            font-size: 13px;
            color: #64748b;
            margin-top: 3px;
        }

        .item-contador {
            font-size: 13px;
            font-weight: 500;
            color: #475569;
            background-color: #f1f5f9;
            padding: 5px 12px;
            border-radius: 20px;
            white-space: nowrap;
            border: 1px solid #e2e8f0;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Listado de equipos</h1>
    <p class="descripcion">Selecciona un equipo para consultar su plantilla de jugadores:</p>

    <!-- Si tu ejercicio requiere un filtro en esta página, inclúyelo aquí dentro de <div class="caja-filtro"> -->

    <?php
    foreach($liga as $equipo => $elementos){

    ?>
    <div class="tarjeta-item">
        <form action="jugadores.php" method="POST">

        <img src="<?php echo $elementos['escudo']; ?>" alt="Imagen elemento 1" class="item-imagen" name="imagen" value="<?php echo $elementos['escudo'] ?>" >

            <input type="hidden" name="seleccion" value="Elemento 1">

            <button type="submit" class="item-titulo-btn" name="equipo" value="4"><?php echo $equipo ?></button>
            <div class="item-subtitulo">Fundación: <?php echo $elementos['fundacion'] ?> </div>
        </form>
        <span class="item-contador"><?php echo $elementos['cantidadJugadores'] ?> jugadores</span>
    </div>
    <?php
    }
    ?>
    


</div>

</body>
</html>    
<!-- para espacios en blanco htmlspecialchars()-->