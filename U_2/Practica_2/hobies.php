<?php

$hobbies = [

    "Hornear" => [
        "imagen" => "imagenes/pastel.jpeg",
        "descripcion" => "Me gusta seguir recetas y preparar cosas dulces.",
        "frecuencia" => "Una vez al mes"
    ],

    "Cantar" => [
        "imagen" => "imagenes/cantar.jpeg",
        "descripcion" => "Me gusta escuchar música y practicar canto.",
        "frecuencia" => "Todos los días"
    ],

    "Leer" => [
        "imagen" => "imagenes/leer.jpeg",
        "descripcion" => "Disfruto las historias que tienen magia, fantasía, drama y romance.",
        "frecuencia" => "Una vez al mes"
    ]

];

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mis hobbies</title>

    <script src="../../tailwind.js"></script>

</head>

<body class="bg-blue-100">

    <?php include "includes/menu.php"; ?>

    <main class="min-h-screen p-8">

        <h1 class="text-4xl font-bold text-center mb-8">
            Mis hobbies y aficiones
        </h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <?php foreach ($hobbies as $nombre => $datos) { ?>

                <div class="bg-pink-100 rounded-xl shadow-lg p-5">

                    <img
                        src="<?php echo $datos['imagen']; ?>"
                        alt="<?php echo $nombre; ?>"
                        class="w-full h-48 object-cover rounded-lg mb-4"
                    >

                    <h2 class="text-2xl font-bold mb-3">
                        <?php echo $nombre; ?>
                    </h2>

                    <p class="text-gray-700 mb-4">
                        <?php echo $datos['descripcion']; ?>
                    </p>

                    <p class="text-sm text-blue-700 font-semibold">
                        Frecuencia: <?php echo $datos['frecuencia']; ?>
                    </p>

                </div>

            <?php } ?>

        </div>

    </main>

    <?php include "includes/footer.php"; ?>

</body>

</html>