<?php

// Zona horaria de España
date_default_timezone_set("Europe/Madrid");

// Formato que tendrá la fecha
$fecha = date("l, d \d\e F \d\e Y");

// Traducir el día de la semana al castellano
$dias = [
    "Monday" => "Lunes",
    "Tuesday" => "Martes",
    "Wednesday" => "Miércoles",
    "Thursday" => "Jueves",
    "Friday" => "Viernes",
    "Saturday" => "Sábado",
    "Sunday" => "Domingo"
];

// Traducir el mes al castellano
$meses = [
    "January" => "Enero",
    "February" => "Febrero",
    "March" => "Marzo",
    "April" => "Abril",
    "May" => "Mayo",
    "June" => "Junio",
    "July" => "Julio",
    "August" => "Agosto",
    "September" => "Septiembre",
    "October" => "Octubre",
    "November" => "Noviembre",
    "December" => "Diciembre"
];

// Componentes de la fecha
$diaSemana = date("l");
$dia = date("d");
$mes = date("F");
$anio = date("Y");

// Construir la fecha en castellano
$fechaEspaniol = $dias[$diaSemana] . ", " . $dia . " de " . $meses[$mes] . " de " . $anio;

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Fecha actual</title>
</head>
<body>

    <h1>Fecha actual</h1>

    <p><?php echo $fechaEspaniol; ?></p>

</body>
</html>

