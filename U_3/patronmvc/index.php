<?php
require_once 'model_equipos.php';
require_once 'model_pilotos.php';
require_once 'model_personalizado.php';
require_once 'controller.php';

// =========================================================================
// CAMBIA AQUÍ EL MODELO PARA COMPROBAR CÓMO CAMBIA TODA LA PÁGINA
// =========================================================================
//$modelo = new ModelEquipos();
//$modelo = new ModelPilotos();
$modelo = new ModelPersonalizado();

// Parámetro ordenación enviado desde el formulario 
$criterioOrden = $_POST['orden'] ?? 'nombre_asc';

$controlador = new Controller($modelo);

if (isset($_POST['elemento'])) {
    $controlador->ejecutarDetalle($_POST['elemento']);
} else {
    $controlador->ejecutar($criterioOrden);
}