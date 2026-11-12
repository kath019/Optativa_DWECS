<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 1 - Lista de Asignaturas</title>
</head>
<body>

    <h1>Lista de Asignaturas de 2º DAM</h1>

    <?php
    // 1. Definición del array indexado simple
    $asignaturas = ["PSP", "OPTATIVA", "PROYECTO", "ACCESO A DATOS", "PROGRAMACIÓN MULTIMEDIA"];

    // 2. Recorrido del array para mostrarlo en una lista HTML
    echo "<ul>";
    foreach ($asignaturas as $asignatura) {
        echo "<li>" . htmlspecialchars($asignatura) . "</li>";
    }
    echo "</ul>";

    // 3. Conteo de elementos totales usando count()
    $totalAsignaturas = count($asignaturas);
    echo "<p><strong>Número total de asignaturas:</strong> $totalAsignaturas</p>";
    ?>

</body>
</html>