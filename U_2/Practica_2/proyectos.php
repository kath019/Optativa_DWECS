<?php

$proyectos = [

    [
        "nombre" => "Ejercicios iniciales: Formulario y respuesta",
        "descripcion" => "Creación de una página web con un formulario php y otra con los resultados enviados por método GET; tambien ejercicio de envío POST.",
        "archivo" => "../../U_1/Ejercicios_1"
    ],

    [
        "nombre" => "Estructuras de control de flujo",
        "descripcion" => "Web con la fecha actual en castellano, tabla de 10 x 10, formulario mayor de edad, número positivo, 0 o negativo, número aleatorio, bucle for.",
        "archivo" => "../../U_1/Ejercicios_2"
    ],

    [
        "nombre" => "Arrays I",
        "descripcion" => "Array indexado simple, array asociativo unidimensional, array multidimensional.",
        "archivo" => "../Ejercicios_1"
    ],
    [
        "nombre" => "Formularios y variables de sesión",
        "descripcion" => "Filtrado dinámico mediante GET, Gestión completa con formularios y estadísticas.",
        "archivo" => "../Practica_1"
    ],

];

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mis proyectos</title>

    <script src="../../tailwind.js"></script>

</head>

<body class="bg-blue-100">

    <?php include "includes/menu.php"; ?>

    <main class="min-h-screen p-8 ">

        <h1 class="text-4xl font-bold text-center mb-4">
            Mis proyectos
        </h1>

        <p class="text-center text-gray-700 mb-8">
            Ejercicios realizados en el primer trimestre en la asignatura de Desarrollo web en servidor
        </p>

        <div class="max-w-4xl mx-auto grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">

            <?php foreach ($proyectos as $proyecto) { ?>

                <div class="bg-pink-100 rounded-lg shadow-md p-5 mb-5 border border-white">

                    <h2 class="text-2xl font-bold mb-2">
                        <?php echo $proyecto["nombre"]; ?>
                    </h2>

                    <p class="text-gray-700 mb-4">
                        <?php echo $proyecto["descripcion"]; ?>
                    </p>

                    <a
                        href="<?php echo $proyecto["archivo"]; ?>"
                        class="bg-rose-400 text-white px-4 py-2 rounded-lg inline-block"
                    >
                        Ver ejercicios
                    </a>

                </div>

            <?php } ?>

        </div>

    </main>

    <?php include "includes/footer.php"; ?>

</body>

</html>