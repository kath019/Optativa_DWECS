<?php 
if($_SERVER["REQUEST_METHOD"] !== "POST"){
    echo "Error, no se recibieron datos del formulario";
}else {
    $numero = $_POST["numero"];

    if($numero > 0){
        echo "<h1>El número ".$numero. " es positivo </h1>";
    } else if ($numero < 0){
        echo "<h1>El número ".$numero. " es negativo </h1>";
    } else {
        echo "Se ha ingresado el número 0";
    }
}
?>