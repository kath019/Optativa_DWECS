<?php
// Iniciamos la sesión para poder visualizar $_SESSION
session_start();

// Asignamos un valor de ejemplo a la sesión si está vacía
if (empty($_SESSION)) {
    $_SESSION['usuario'] = 'invitado';
}

// Array con las principales variables superglobales
$superglobales = [
    '$_SERVER'  => $_SERVER,
    '$_GET'     => $_GET,
    '$_POST'    => $_POST,
    '$_FILES'   => $_FILES,
    '$_COOKIE'  => $_COOKIE,
    '$_SESSION' => $_SESSION,
    '$_ENV'     => $_ENV,
];

echo "<h1>Valores de las Variables Superglobales en PHP</h1>";

foreach ($superglobales as $nombre => $variable) {
    echo "<h2>$nombre</h2>";
    echo "<pre>";
    print_r($variable);
    echo "</pre>";
    echo "<hr>";
}
?>
