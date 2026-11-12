<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 2 - Horas de Asignaturas</title>
    <style>
        table { border-collapse: collapse; width: 50%; margin-top: 10px; }
        th, td { border: 1px solid #ccc; padding: 8px 12px; text-align: left; }
        th { background-color: #f2f2f2; }
        .total { font-weight: bold; background-color: #e6f2ff; }
    </style>
</head>
<body>

    <h1>Carga Horaria Semanal de 2º DAM</h1>

    <?php
    // 1. Definición del array asociativo (módulo => horas)
    $horas = [
        "PSP" => 3,
        "OPTATIVA" => 4,
        "PROYECTO" => 5,
        "ACCESO A DATOS" => 6,
        "PROGRAMACIÓN MULTIMEDIA" => 4
    ];

    $totalHoras = 0;
    ?>

    <table>
        <thead>
            <tr>
                <th>Asignatura / Módulo</th>
                <th>Horas Semanales</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // 2. Recorrido del array asociativo y sumatorio acumulado
            foreach ($horas as $modulo => $horasSemanales) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($modulo) . "</td>";
                echo "<td>" . htmlspecialchars($horasSemanales) . " hrs</td>";
                echo "</tr>";
                $totalHoras += $horasSemanales;
            }
            ?>
            <tr class="total">
                <td>Total Horas Semanales</td>
                <td><?php echo $totalHoras; ?> hrs</td>
            </tr>
        </tbody>
    </table>

</body>
</html>