<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Envío por GET</title>
</head>
<body>

    <h1>Formulario con Método GET</h1>

    <!-- El formulario redirige los datos a respuesta.php usando GET -->
    <form action="respuesta.php" method="GET">
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="apellido">Apellido:</label><br>
        <input type="text" id="apellido" name="apellido" required><br><br>

        <button type="submit">Enviar datos por GET</button>
    </form>

</body>
</html>