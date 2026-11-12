<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Envío Combinado (POST + Query String)</title>
</head>
<body>

    <h1>Formulario con envío combinado (POST + GET)</h1>

    <!-- Enviamos datos por POST, pero la URL del action lleva parámetros GET -->
    <form action="respuesta.php?categoria=programacion&origen=formulario_ambos" method="POST">
        
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="apellido">Apellido:</label><br>
        <input type="text" id="apellido" name="apellido" required><br><br>

        <button type="submit">Enviar datos combinados</button>
    </form>

</body>
</html>