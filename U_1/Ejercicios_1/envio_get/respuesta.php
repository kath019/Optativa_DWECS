<?php

$nombre = $_GET["nombre"] ?? "";
$color = $_GET["color"] ?? "";

$coloresPermitidos = ["rojo", "verde", "azul"];

if ($nombre == "" || $color == "") {

    $error = "No se han recibido todos los datos necesarios.";

} elseif (!in_array($color, $coloresPermitidos, true)) {

    $error = "El color seleccionado no es válido.";

}

// Elegir el fondo y el color del texto
if (isset($error)) {

    $fondo = "#ffffff";
    $texto = "#000000";

} else {

    switch ($color) {

        case "rojo":
            $fondo = "#ff0000";
            $texto = "#000000";
            break;

        case "verde":
            $fondo = "#008000";
            $texto = "#ffffff";
            break;

        case "azul":
            $fondo = "#0000ff";
            $texto = "#ffffff";
            break;
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Respuesta del formulario</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 50px;
            min-height: 100vh;
            margin: 0;
        }
    </style>
</head>

<body style="background-color: <?php echo $fondo; ?>; color: <?php echo $texto; ?>;">

    <?php if (isset($error)) { ?>

        <h1>Advertencia</h1>

        <p><?php echo htmlspecialchars($error); ?></p>

        <a href="formulario.php">Volver al formulario</a>

    <?php } else { ?>

        <h1>¡Hola, <?php echo htmlspecialchars($nombre); ?>!</h1>

        <p>Tu color favorito es <?php echo htmlspecialchars($color); ?>.</p>

    <?php } ?>

</body>
</html>

