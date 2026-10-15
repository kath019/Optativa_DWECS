<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uso de bucle</title>
</head>
<body>
    <form method="POST" action ="">
        <label for="texto">Texto: </label>
        <input type="text" name="texto" id="texto" required>
        <br>
        <br>
        <input type="submit" value="Enviar">
    </form>

    <?php 
    if($_SERVER["REQUEST_METHOD"] !== "POST"){
        echo "Error, no se recibieron datos del formulario.";
    } else {
        $texto = $_POST["texto"];

        for($h = 1; $h < 7; $h++){
            echo "<h".$h.">".$texto."</".$h.">";
        }
    }
    ?>
</body>
</html>