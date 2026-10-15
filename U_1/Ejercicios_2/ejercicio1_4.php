<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salario neto</title>
</head>
<body>
    <h1>Cálculo salario neto</h1>
    <form method="POST" action="">
        <label for="bruto">Introduzca su salario mensual en bruto:</label>
        <input type="number" name="bruto" id="bruto" min=0 required>

        <br>
        <br>
        <label for="retencion">Retención aplicada: </label>
        <input type="number" name="retencion" id="retencion" min= 0 required>

        <br>
        <br>
        <input type="submit" value="Enviar">

    </form>

    <?php 
    if($_SERVER['REQUEST_METHOD'] ==='POST'){
        $bruto = $_POST["bruto"];
        $retencion = $_POST["retencion"];

        $neto = $bruto - $retencion;
        echo "<h2>Tu salario neto es: " .$neto. " €</h2>";
    }
    ?>
</body>
</html>