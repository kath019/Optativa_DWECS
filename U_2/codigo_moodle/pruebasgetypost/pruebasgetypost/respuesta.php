<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Respuesta de datos</title>
</head>
<body>

    <h1>Procesamiento de Datos</h1>

    <?php
    // Detectamos el método de envío usando $_SERVER['REQUEST_METHOD']
    $metodo = $_SERVER['REQUEST_METHOD'];

    if ($metodo === 'GET' && isset($_GET['nombre']) && isset($_GET['apellido'])) {
        $nombre = htmlspecialchars($_GET['nombre']);
        $apellido = htmlspecialchars($_GET['apellido']);

        echo "<p>Los datos han sido recibidos mediante el método <strong>GET</strong>.</p>";
        echo "<h2>Hola, $nombre $apellido</h2>";

    } elseif ($metodo === 'POST' && isset($_POST['nombre']) && isset($_POST['apellido'])) {
        $nombre = htmlspecialchars($_POST['nombre']);
        $apellido = htmlspecialchars($_POST['apellido']);

        echo "<p>Los datos han sido recibidos mediante el método <strong>POST</strong>.</p>";
        echo "<h2>Hola, $nombre $apellido</h2>";

    } else {
        echo "<p style='color: red;'><strong>Advertencia:</strong> No se han recibido los datos esperados o has accedido directamente a esta página sin enviar un formulario.</p>";
    }
    ?>

    <br>
    <a href="envioget.php">Volver a Formulario GET</a> | 
    <a href="enviopost.php">Volver a Formulario POST</a>

</body>
</html>