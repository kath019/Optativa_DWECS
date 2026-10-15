<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario GET</title>
</head>
<body>

    <h1>Formulario de colores favoritos</h1>

    <form action="respuesta.php" method="GET">

        <label for="nombre">Introduce tu nombre:</label>
        <input type="text" id="nombre" name="nombre" required>

        <br><br>

        <label for="color">Selecciona tu color favorito:</label>

        <select id="color" name="color" required>
            <option value="rojo">Rojo</option>
            <option value="verde">Verde</option>
            <option value="azul">Azul</option>
        </select>

        <br><br>

        <button type="submit">Enviar</button>

    </form>

</body>
</html>

