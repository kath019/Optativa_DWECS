<?php

$proyectos = [

    [
        "nombre" => "Formulario HTML",
        "descripcion" => "Creación de un formulario utilizando HTML.",
        "archivo" => "../ejercicio1.php"
    ],

    [
        "nombre" => "Formulario PHP",
        "descripcion" => "Desarrollo de formularios utilizando PHP.",
        "archivo" => "../ejercicio2.php"
    ],

    [
        "nombre" => "Gestión de sesiones",
        "descripcion" => "Práctica sobre el uso de sesiones en PHP.",
        "archivo" => "../ejercicio3.php"
    ]

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

    <main class="min-h-screen p-8">

        <h1 class="text-4xl font-bold text-center mb-4">
            Mis proyectos
        </h1>

        <p class="text-center text-gray-700 mb-8">
            Aquí puedes encontrar algunos de los ejercicios
            que he realizado durante mi formación en DAM.
        </p>

        <div class="max-w-4xl mx-auto">

            <?php foreach ($proyectos as $proyecto) { ?>

                <div class="bg-white rounded-lg shadow-md p-5 mb-5">

                    <h2 class="text-2xl font-bold mb-2">
                        <?php echo $proyecto["nombre"]; ?>
                    </h2>

                    <p class="text-gray-700 mb-4">
                        <?php echo $proyecto["descripcion"]; ?>
                    </p>

                    <a
                        href="<?php echo $proyecto["archivo"]; ?>"
                        class="bg-blue-500 text-white px-4 py-2 rounded-lg inline-block"
                    >
                        Ver ejercicio
                    </a>

                </div>

            <?php } ?>

        </div>

    </main>

    <?php include "includes/footer.php"; ?>

</body>

</html>