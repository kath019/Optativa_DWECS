<?php
require_once 'model_equipos.php';
require_once 'model_pilotos.php';
require_once 'controller.php';

// =========================================================================
// CAMBIA AQUÍ EL MODELO PARA COMPROBAR CÓMO CAMBIA TODA LA PÁGINA
// =========================================================================
$modelo = new ModelEquipos();
//$modelo = new ModelPilotos();

// Recogemos el parámetro de ordenación enviado desde el formulario (si existe)
$criterioOrden = $_POST['orden'] ?? 'nombre_asc';

// Iniciamos el Controlador inyectándole el Modelo elegido
$controlador = new Controller($modelo);
$controlador->ejecutar($criterioOrden);