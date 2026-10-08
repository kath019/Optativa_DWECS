<?php
if($_SERVER["REQUEST_METHOD"]!=="POST"){
    $error = "No se han recibido datos del formulario";
} else {

//comprobar que existen los campos
    if(!isset($_POST["importe"]) ||!isset($_POST["moneda"]) ||!isset($_POST["tema"])){
        $error = "Faltan datos del formulario";
    } else {
        $importe = $_POST["importe"];
        $moneda = $_POST["moneda"];
        $tema = $_POST["tema"];

        //validar que no estén vacíos
        if($importe === "" || $moneda ==="" || $tema === ""){
            $error = "Todos los campos son obligatorios";
        }elseif($importe<= 0){ //validar que el importe sea numérico
            $error= "El importe debe ser mayor a 0";
        }elseif(!in_array($moneda, ["USD", "GBP", "JPY"])){
            $error="La moneda no es válida";
        }elseif(!in_array($tema, ["claro", "oscuro"])){
            $error= "El tema seleccionado no es válido";
        } else {
            $cambios =["USD" => 1.10, "GBP" => 0.85, "JPY" =>160];

            $resultado = $importe *$cambios[$moneda];
            $resultado = round($resultado, 2);
        }

    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
    <style>
        /*tema claro*/
        <?php if(isset($tema)&&$tema ==="claro"): ?>
            body{
                background-color: white;
            }

        <?php else: ?>
            /*tema oscuro*/
        body{
            background-color: #222;
            color:white;
        }
        

    </style>
</head>
<body>
    
</body>
</html>