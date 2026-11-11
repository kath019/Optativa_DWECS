<?php
$color = $_POST["color"];
$cantidad = $_POST["cantidad"];
$directorios = $_POST["directorios"] ?? [];

$contador = 0;
//if($_SERVER["REQUEST_METHOD"] == "POST"){
  //  echo "Formulario recibido correctamente";
//}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados</title>
    <script>"../../../tailwind.js"</script>
</head>
<body style="background-color: <?php echo $color; ?>;">
    <h1>Mostrando <?php echo $cantidad; ?> imágenes </h1>
    
    <?php
    if(empty($directorios)){
        echo "No se ha seleccionado ningún directorio";
    } else {
        //recorrer los directorios seleccionados
        foreach($directorios as $directorio){
            echo "<h2>Directorio consultado: $directorio</h2>";
            

            //leer el contenido de la carpeta
            $imagenes =scandir($directorio);

            foreach($imagenes as $imagen){
                
                if($imagen !="." && $imagen !=".."){

                    //comprobar la cantidad
                    if($contador < $cantidad){
                        echo "<img src='$directorio/$imagen' width='200'>";
                        $contador++;
                    }
                }

            }
            
            
        }

    }
    ?>
</body>
</html>