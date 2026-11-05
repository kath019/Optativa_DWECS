<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mi blog personal</title>

    <script src="../../tailwind.js"></script>
</head>

<body class="bg-blue-100">

    <?php
    // la cabecera
    include "includes/menu.php";
    ?>

    <main class="min-h-screen flex flex-col items-center p-8">

        <h1 class="text-4xl font-bold mb-6">
            ¡Hola! Soy Katlhyn
        </h1>

        <div class="bg-pink-100 rounded-lg shadow-lg p-6 max-w-2xl text-center border border-white">

            <img src="imagenes/FONDO-MARINO.jpeg" alt="Imagen del fondo marino" class="w-48 h-48 object-cover rounded-lg mx-auto mb-5"
            >

            <h2 class="text-2xl font-bold mb-3">Sobre mí</h2>

            <p class="text-gray-700 mb-5">
                Soy estudiante de Desarrollo de Aplicaciones
                Multiplataforma. Me considero una persona creativa,
                tranquila, empática y siempre con ganas de aprender.
                Me gusta principalmente la repostería, leer y cantar.
            </p>

            <div class=" border-t border-t-red-300 pt-4">

                <h3 class="font-bold text-lg mb-2">Contacto</h3>

                <p>Correo: katlhynnn19@gmail.com</p>

            </div>

        </div>

    </main>

    <?php
    // El pie de página
    include "includes/footer.php";
    ?>

</body>

</html>