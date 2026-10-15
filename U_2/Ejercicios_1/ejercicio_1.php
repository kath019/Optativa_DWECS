<?php 
echo "<h1>Estructura básica del array:</h1>";
$asignaturas = array("PSP", "OPTATIVA", "PROYECTO", "ACCESO A DATOS", "PROGRAMACIÓN MULTIMEDIA");

echo "Asignaturas de 2º de DAM";
echo "<ul>";
foreach($asignaturas as $asignatura){
    echo "<li>".$asignatura."</li>";
}
echo "</ul>";
?>