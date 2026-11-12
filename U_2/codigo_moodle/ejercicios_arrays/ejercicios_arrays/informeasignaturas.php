<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 3 - Informe de Asignaturas</title>
    <style>
        .bloque-alumno {
            border: 1px solid #333;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 15px;
            background-color: #fafafa;
        }
        .bloque-alumno h2 { margin-top: 0; color: #2c3e50; }
    </style>
</head>
<body>

    <h1>Informe de Asignaturas Matriculadas por Alumno</h1>

    <?php
    // 1. Definición del array asociativo bidimensional (Alumno => Array de Asignaturas)
    $alumnos = [
        "Laura_Martinez" => ["PSP", "PROYECTO", "ACCESO A DATOS"],
        "Carlos_Gomez"   => ["OPTATIVA", "PSP", "PROGRAMACIÓN MULTIMEDIA"],
        "Ana_Sanchez"    => ["PROGRAMACIÓN MULTIMEDIA", "PROYECTO", "ACCESO A DATOS", "OPTATIVA"],
        "David_Rodriguez"=> ["PSP", "ACCESO A DATOS", "OPTATIVA"],
        "Maria_Lopez"    => ["PROYECTO", "PROGRAMACIÓN MULTIMEDIA", "PSP"]
    ];

    // 2. Recorrido de la estructura anidada
    foreach ($alumnos as $nombreAlumno => $listaAsignaturas) {
        // Formateamos el nombre reemplazando los guiones bajos por espacios
        $nombreFormateado = str_replace('_', ' ', $nombreAlumno);

        echo "<div class='bloque-alumno'>";
        echo "<h2>Alumno: " . htmlspecialchars($nombreFormateado) . "</h2>";
        echo "<p><strong>Asignaturas matriculadas:</strong></p>";
        echo "<ul>";
        foreach ($listaAsignaturas as $asignatura) {
            echo "<li>" . htmlspecialchars($asignatura) . "</li>";
        }
        echo "</ul>";
        echo "</div>";
    }
    ?>

</body>
</html>