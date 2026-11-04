<?php

// Guardamos la ruta de la carpeta de imágenes
$directorio = "imagenes";

// Leer el contenido de la carpeta
$imagenes = scandir($directorio);

// Crear un array con las extensiones permitidas
$extensiones = ["jpg", "jpeg", "png", "gif", "webp"];

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mis imágenes</title>

    <script src="../../tailwind.js"></script>

</head>

<body class="bg-blue-100">

    <?php include "includes/menu.php"; ?>

    <main class="min-h-screen p-8">

        <h1 class="text-4xl font-bold text-center mb-4">
            Mi galería de imágenes
        </h1>

        <p class="text-center text-gray-700 mb-8">
            Una pequeña colección de mis fotografías.
        </p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <?php

            // Recorremos todos los archivos encontrados
            foreach ($imagenes as $imagen) {

                // Obtenemos la extensión del archivo
                $extension = strtolower(pathinfo($imagen, PATHINFO_EXTENSION));

                // Comprobamos si es una imagen
                if (in_array($extension, $extensiones)) {

            ?>

                    <div class="bg-white p-4 rounded-lg shadow-md">

                        <img
                            src="img/<?php echo htmlspecialchars($imagen); ?>"
                            alt="Fotografía de mi galería"
                            class="w-full h-56 object-cover rounded-lg"
                        >

                    </div>

            <?php

                }

            }

            ?>

        </div>

    </main>

    <?php include "includes/footer.php"; ?>

</body>

</html>