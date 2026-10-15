<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Comprobar edad</title>
</head>
<body>

    <h1>Formulario de usuario</h1>

    <form action="" method="POST">

        <label for="nombre">Introduce tu nombre:</label>
        <input type="text" name="nombre" id="nombre" required>

        <br>
        <br>

        <label for="edad">Introduce tu edad:</label>
        <input type="number" name="edad" id="edad" min="0" required>

        <br>
        <br>

        <input type="submit" value="Enviar">

    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
        echo "Error, no se han recibido los datos del formulario";
    } else {
          $nombre = $_POST["nombre"];
        $edad = $_POST["edad"];

        echo "<h2>¡Hola, " . htmlspecialchars($nombre) . "!</h2>";

        if ($edad >= 18) {
            echo "Eres mayor de edad.";
        } else {
            echo "Eres menor de edad.";
        }
    }

    ?>

</body>
</html>
