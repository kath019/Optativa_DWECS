<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Procesamiento Flexible de Datos</title>
</head>
<body>

    <h1>Procesamiento de Datos (GET / POST / Ambos)</h1>

    <?php
    $metodo = $_SERVER['REQUEST_METHOD'];

    // Obtenemos 'nombre' y 'apellido' sin importar si llegaron por GET o por POST
    // Usamos el operador de fusión de nulos (??) para evaluar ambos
    $nombre   = $_POST['nombre']   ?? $_GET['nombre']   ?? null;
    $apellido = $_POST['apellido'] ?? $_GET['apellido'] ?? null;

    if ($nombre !== null && $apellido !== null) {
        $nombreLimpio   = htmlspecialchars($nombre);
        $apellidoLimpio = htmlspecialchars($apellido);

        echo "<h2>Hola, $nombreLimpio $apellidoLimpio</h2>";
        echo "<p><strong>Método principal de la petición HTTP:</strong> $metodo</p>";

        // Verificamos si llegaron datos por POST
        if (!empty($_POST)) {
            echo "<h3>Datos recibidos vía POST:</h3><ul>";
            foreach ($_POST as $clave => $valor) {
                echo "<li><strong>" . htmlspecialchars($clave) . ":</strong> " . htmlspecialchars($valor) . "</li>";
            }
            echo "</ul>";
        }

        // Verificamos si llegaron datos por GET / Query String
        if (!empty($_GET)) {
            echo "<h3>Datos recibidos vía GET (Query String):</h3><ul>";
            foreach ($_GET as $clave => $valor) {
                echo "<li><strong>" . htmlspecialchars($clave) . ":</strong> " . htmlspecialchars($valor) . "</li>";
            }
            echo "</ul>";
        }

    } else {
        echo "<p style='color: red;'><strong>Advertencia:</strong> No se han recibido los datos esperados (nombre o apellido faltante).</p>";
    }
    ?>

    <br><hr>
    <a href="envioget.php">Ir a Formulario GET</a> | 
    <a href="enviopost.php">Ir a Formulario POST</a> | 
    <a href="envioambos.php">Ir a Formulario Combinado</a>

</body>
</html>