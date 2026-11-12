<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Envío por POST</title>
</head>
<body>

    <h1>Formulario con Método POST</h1>

    <!-- El formulario redirige los datos a respuesta.php usando POST -->
    <form action="respuesta.php" method="POST">
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="apellido">Apellido:</label><br>
        <input type="text" id="apellido" name="apellido" required><br><br>

        <button type="submit">Enviar datos por POST</button>
    </form>

</body>
</html>