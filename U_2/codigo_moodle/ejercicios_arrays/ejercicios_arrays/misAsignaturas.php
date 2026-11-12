<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 4 - Consulta Individual de Alumnos</title>
    <style>
        .ficha { border: 2px solid #2980b9; padding: 15px; border-radius: 8px; background-color: #ebf5fb; }
        .error { color: #c0392b; font-weight: bold; }
    </style>
</head>
<body>

    <h1>Consulta de Ficha de Alumno</h1>

    <?php
    // Structure de datos
    $alumnos = [
        "Laura_Martinez" => ["PSP", "PROYECTO", "ACCESO A DATOS"],
        "Carlos_Gomez"   => ["OPTATIVA", "PSP", "PROGRAMACIÓN MULTIMEDIA"],
        "Ana_Sanchez"    => ["PROGRAMACIÓN MULTIMEDIA", "PROYECTO", "ACCESO A DATOS", "OPTATIVA"],
        "David_Rodriguez"=> ["PSP", "ACCESO A DATOS", "OPTATIVA"],
        "Maria_Lopez"    => ["PROYECTO", "PROGRAMACIÓN MULTIMEDIA", "PSP"]
    ];

    // Lectura del parámetro GET
    $alumnoBuscado = $_GET['alumno'] ?? null;

    if ($alumnoBuscado && isset($alumnos[$alumnoBuscado])) {
        // Si el alumno existe en el array
        $nombreFormateado = str_replace('_', ' ', $alumnoBuscado);
        echo "<div class='ficha'>";
        echo "<h2>Ficha de: " . htmlspecialchars($nombreFormateado) . "</h2>";
        echo "<p><strong>Asignaturas asignadas:</strong></p>";
        echo "<ul>";
        foreach ($alumnos[$alumnoBuscado] as $asignatura) {
            echo "<li>" . htmlspecialchars($asignatura) . "</li>";
        }
        echo "</ul>";
        echo "</div>";
    } else {
        // Si no se pasó parámetro o el alumno no existe
        if ($alumnoBuscado) {
            echo "<p class='error'>El alumno '" . htmlspecialchars($alumnoBuscado) . "' no existe en nuestros registros.</p>";
        } else {
            echo "<p>Por favor, selecciona un alumno para consultar sus asignaturas.</p>";
        }

        echo "<h3>Alumnos disponibles:</h3>";
        echo "<ul>";
        foreach ($alumnos as $claveAlumno => $asignaturas) {
            $nombreMostrar = str_replace('_', ' ', $claveAlumno);
            echo "<li><a href='misAsignaturas.php?alumno=" . urlencode($claveAlumno) . "'>$nombreMostrar</a></li>";
        }
        echo "</ul>";
    }
    ?>

</body>
</html>