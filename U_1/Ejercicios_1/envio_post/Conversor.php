<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor</title>
</head><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Conversor de monedas</title>

    <style>
     body{
        font-family:Arial, Helvetica, sans-serif;
        background-color: #f4f4ff;
        display:flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
     }

     .contenedor {
        padding: 30px;
        width: 350px;
     }

     .h1{
        text-align: center;
     }

     label {
            display: block;
            margin-top: 15px;
            margin-bottom: 5px;
    }

    input[type="number"], select {
        width: 80%;
        padding:8px;
    }

    input [type="submit"]:hover {
        background-color:darkcyan;
    }
    </style>
</head>

<body>

<div class="contenedor">
    <h1>Conversor de monedas</h1>

    <form action="Resultado.php" method="POST">
        <label for="importe">Importe en euros (€):</label>

        <input type="number" id="importe" name="importe" step="0.01" min="0" required
        >

        <label for="moneda">Moneda de destino:</label>

        <select id="moneda" name="moneda" required>
            <option value="">Selecciona una moneda </option>
            <option value="USD">Dólar (USD)</option>
            <option value="GBP">Libra (GBP)</option>
            <option value="JPY">Yen (JPY)</option>
        </select>

        <label for="tema">Tema de pantalla:</label>

        <select id="tema" name="tema" required>
            <option value="">Selecciona un tema </option>
            <option value="claro">Claro</option>
            <option value="oscuro">Oscuro</option>
        </select>

        <input type="submit" value="Convertir">

        <input type="submit" value="Enviar">

    </form>

</div>
</html>