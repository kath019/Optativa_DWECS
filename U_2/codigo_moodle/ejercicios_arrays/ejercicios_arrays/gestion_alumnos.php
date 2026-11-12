<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 5 - Gestión de Calificaciones y Estadísticas</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .aprobado { color: #27ae60; font-weight: bold; }
        .suspenso { color: #e74c3c; font-weight: bold; }
        table { border-collapse: collapse; width: 60%; margin-top: 15px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #34495e; color: white; }
        .panel { background-color: #f8f9fa; border: 1px solid #ddd; padding: 15px; margin-bottom: 20px; border-radius: 5px; }
    </style>
</head>
<body>

    <h1>Gestión de Calificaciones de 2º DAM</h1>

    <?php
    // 1. Array asociativo tridimensional/multidimensional (Alumno => [Asignatura => Nota])
    $alumnos = [
        "Laura_Martinez" => ["PSP" => 8, "PROYECTO" => 9, "ACCESO A DATOS" => 6],
        "Carlos_Gomez"   => ["OPTATIVA" => 7, "PSP" => 4, "PROGRAMACIÓN MULTIMEDIA" => 5],
        "Ana_Sanchez"    => ["PROGRAMACIÓN MULTIMEDIA" => 9, "PROYECTO" => 8, "ACCESO A DATOS" => 7, "OPTATIVA" => 10],
        "David_Rodriguez"=> ["PSP" => 5, "ACCESO A DATOS" => 3, "OPTATIVA" => 6],
        "Maria_Lopez"    => ["PROYECTO" => 10, "PROGRAMACIÓN MULTIMEDIA" => 8, "PSP" => 7]
    ];

    // Recepción de datos del formulario POST
    $alumnoSeleccionado = $_POST['alumno'] ?? '';
    $notaCorte = isset($_POST['nota_corte']) && $_POST['nota_corte'] !== '' ? (float)$_POST['nota_corte'] : 0;
    ?>

    <!-- 2. Formulario de filtrado POST -->
    <div class="panel">
        <form action="gestion_alumnos.php" method="POST">
            <label for="alumno"><strong>Seleccionar Alumno:</strong></label>
            <select name="alumno" id="alumno" required>
                <option value="">-- Elija un alumno --</option>
                <?php
                foreach ($alumnos as $clave => $datos) {
                    $nombreVis = str_replace('_', ' ', $clave);
                    $selected = ($clave === $alumnoSeleccionado) ? 'selected' : '';
                    echo "<option value='$clave' $selected>$nombreVis</option>";
                }
                ?>
            </select>

            &nbsp;&nbsp;

            <label for="nota_corte"><strong>Nota Mínima:</strong></label>
            <input type="number" id="nota_corte" name="nota_corte" min="0" max="10" step="0.5" value="<?php echo htmlspecialchars($notaCorte); ?>">

            &nbsp;&nbsp;

            <button type="submit">Consultar</button>
        </form>
    </div>

    <?php
    // 3. Procesamiento y visualización de datos del alumno seleccionado
    if ($alumnoSeleccionado && isset($alumnos[$alumnoSeleccionado])) {
        $asignaturasAlumno = $alumnos[$alumnoSeleccionado];
        $nombreCompleto = str_replace('_', ' ', $alumnoSeleccionado);

        echo "<h2>Boletín de Notas: " . htmlspecialchars($nombreCompleto) . "</h2>";

        $sumaNotas = 0;
        $contNotas = 0;
        $lineasTabla = "";

        foreach ($asignaturasAlumno as $asig => $nota) {
            $sumaNotas += $nota;
            $contNotas++;

            // Aplicamos filtro de nota de corte
            if ($nota >= $notaCorte) {
                $claseCss = ($nota >= 5) ? 'aprobado' : 'suspenso';
                $lineasTabla .= "<tr>
                    <td>" . htmlspecialchars($asig) . "</td>
                    <td class='$claseCss'>$nota</td>
                </tr>";
            }
        }

        if ($lineasTabla !== "") {
            echo "<table>
                <thead>
                    <tr><th>Asignatura</th><th>Nota Final</th></tr>
                </thead>
                <tbody>
                    $lineasTabla
                </tbody>
            </table>";
        } else {
            echo "<p>El alumno no tiene asignaturas con nota mayor o igual a $notaCorte.</p>";
        }

        $media = $contNotas > 0 ? round($sumaNotas / $contNotas, 2) : 0;
        echo "<p><strong>Nota Media Global del Alumno:</strong> $media</p>";
    }

    // 4. Cálculo Estadístico Global: Asignatura con la media más alta
    $totalesPorAsignatura = [];
    $contadoresPorAsignatura = [];

    foreach ($alumnos as $estudiante => $asigs) {
        foreach ($asigs as $módulo => $calificacion) {
            if (!isset($totalesPorAsignatura[$módulo])) {
                $totalesPorAsignatura[$módulo] = 0;
                $contadoresPorAsignatura[$módulo] = 0;
            }
            $totalesPorAsignatura[$módulo] += $calificacion;
            $contadoresPorAsignatura[$módulo]++;
        }
    }

    $mejorAsignatura = '';
    $maxMedia = -1;

    foreach ($totalesPorAsignatura as $mod => $suma) {
        $mediaMod = $suma / $contadoresPorAsignatura[$mod];
        if ($mediaMod > $maxMedia) {
            $maxMedia = $mediaMod;
            $mejorAsignatura = $mod;
        }
    }
    ?>

    <hr>
    <h3>Resumen Global del Centro</h3>
    <p><strong>Asignatura con el promedio de notas más alto:</strong> 
        <?php echo htmlspecialchars($mejorAsignatura) . " (" . round($maxMedia, 2) . " pts)"; ?>
    </p>

</body>
</html>