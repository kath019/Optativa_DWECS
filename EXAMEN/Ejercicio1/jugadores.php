<?php
if($_SERVER["REQUEST_METHOD"] !=="POST"){
    $error ="No se han recibido datos del formulario";
} 

$imagen = $_POST["imagen"];


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del Elemento</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 30px;
            color: #333;
        }

        .container {
            max-width: 700px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 25px 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .cabecera-detalle {
            display: flex;
            align-items: center;
            gap: 15px;
            border-bottom: 2px solid #007bff;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }

        .cabecera-imagen {
            width: 60px;
            height: 60px;
            object-fit: contain;
            border-radius: 8px;
        }

        .cabecera-detalle h1 {
            margin: 0;
            font-size: 24px;
            color: #1a252f;
        }

        .panel-info {
            background-color: #f8fafc;
            border: 1px solid #e2e8f0;
            padding: 15px;
            border-radius: 6px;
            margin-bottom: 20px;
            display: flex;
            gap: 25px;
            font-size: 14px;
            color: #334155;
        }

        /* Estilo preparado para el contenedor del formulario de filtrado */
        .caja-filtro {
            background-color: #f8fafc;
            border: 1px solid #e2e8f0;
            padding: 15px;
            border-radius: 6px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .caja-filtro label {
            font-weight: 600;
            color: #334155;
            font-size: 14px;
        }

        .caja-filtro select {
            padding: 8px 12px;
            border-radius: 4px;
            border: 1px solid #cbd5e1;
            font-size: 14px;
            outline: none;
            background-color: #ffffff;
            cursor: pointer;
        }

        .caja-filtro select:focus {
            border-color: #007bff;
        }

        h2.subtitulo-seccion {
            font-size: 18px;
            color: #1a252f;
            margin-bottom: 12px;
        }

        /* Estilos para presentación en tabla */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #e2e8f0;
        }

        th {
            background-color: #f1f5f9;
            color: #475569;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        tr:hover {
            background-color: #f8fafc;
        }

        /* Estilos para presentación en lista */
        .lista-detalle {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .lista-detalle li {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 15px;
            border-bottom: 1px solid #e2e8f0;
            background-color: #ffffff;
        }

        .lista-detalle li:hover {
            background-color: #f8fafc;
        }

        .etiqueta-badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 600;
            background-color: #e0f2fe;
            color: #0369a1;
        }

        .mensaje-vacio {
            padding: 15px;
            background-color: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            color: #64748b;
            font-size: 14px;
            text-align: center;
        }

        .btn-volver {
            display: inline-block;
            margin-top: 25px;
            color: #007bff;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
        }

        .btn-volver:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <!-- CABECERA DEL ELEMENTO SELECCIONADO -->
    <div class="cabecera-detalle">
        <img src="" alt="Imagen" class="cabecera-imagen">
        <h1>Plantilla: </h1>
    </div>

    <!-- PANEL DE METADATOS -->
    <div class="panel-info">
        <div><strong>Año de fundación:</strong> Valor 1</div>
        <div><strong>Entrenador:</strong> Valor 2</div>
    </div>

    <!-- Si tu ejercicio requiere un filtro en esta página, inclúyelo aquí dentro de <div class="caja-filtro"> -->

    <h2 class="subtitulo-seccion">Jugadores Inscritos</h2>

    <!-- OPCIÓN A DE PRESENTACIÓN: TABLA -->
    <table>
        <thead>
            <tr>
                <th>NOMBRE</th>
                <th>POSICIÓN</th>
                <th>DORSAL</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Dato 1</td>
                <td><span class="etiqueta-badge">Categoría</span></td>
                <td>Dato 3</td>
            </tr>
        </tbody>
    </table>

    <!-- OPCIÓN B DE PRESENTACIÓN: LISTA
    <ul class="lista-detalle">
        <li>
            <span>Elemento de la lista <strong>Detalle</strong></span>
            <span class="etiqueta-badge">Etiqueta</span>
        </li>
    </ul>
    -->

    <a class="btn-volver" href="equipos.php">← Volver al listado</a>
</div>

</body>
</html>