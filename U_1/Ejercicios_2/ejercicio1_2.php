<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tabla del 1 al 100</title>
</head>
<body>

    <h1>Tabla de números del 1 al 100</h1>

    <table border="1">
        <?php
        $numero = 1;

        for ($fila = 1; $fila <= 10; $fila++) {
            echo "<tr>";

            for ($columna = 1; $columna <= 10; $columna++) {
                echo "<td>" . $numero . "</td>";
                $numero++;
            }

            echo "</tr>";
        }
        ?>
    </table>

</body>
</html>

