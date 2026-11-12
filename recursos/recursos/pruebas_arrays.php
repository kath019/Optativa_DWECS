<?php
// =========================================================================
// ARRAYS DE PRUEBA PARA LOS EJEMPLOS
// =========================================================================
$catalogo = [
    "Curso PHP"     => ["categoria" => "Programación",   "horas" => 40, "nivel" => "Intermedio"],
    "Curso MySQL"   => ["categoria" => "Bases de Datos", "horas" => 30, "nivel" => "Básico"],
    "Curso Laravel" => ["categoria" => "Programación",   "horas" => 50, "nivel" => "Avanzado"],
    "Curso HTML"    => ["categoria" => "Diseño Web",     "horas" => 20, "nivel" => "Básico"],
    "Curso CSS"     => ["categoria" => "Diseño Web",     "horas" => 25, "nivel" => "Básico"]
];

$colores = ["Rojo", "Azul", "Rojo", "Verde", "Azul", "Amarillo"];

$notas = [
    "Ana"    => 8.5,
    "Carlos" => 6.0,
    "Beatriz"=> 9.2
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guía de Funciones de Arrays en PHP</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 30px;
            color: #333;
        }
        .container {
            max-width: 850px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 25px 35px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #1a252f;
            border-bottom: 2px solid #007bff;
            padding-bottom: 10px;
            margin-top: 0;
        }
        .intro {
            color: #475569;
            margin-bottom: 25px;
            line-height: 1.5;
        }
        .funcion-card {
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            padding: 18px 20px;
            margin-bottom: 20px;
            background-color: #ffffff;
        }
        .funcion-card h2 {
            margin: 0 0 8px 0;
            font-size: 18px;
            color: #0056b3;
            font-family: Consolas, monospace;
        }
        .funcion-card p {
            margin: 0 0 12px 0;
            font-size: 14px;
            color: #334155;
        }
        .bloque-codigo {
            background-color: #1e293b;
            color: #f8fafc;
            padding: 12px 15px;
            border-radius: 5px;
            font-family: Consolas, monospace;
            font-size: 13px;
            margin-bottom: 10px;
            overflow-x: auto;
        }
        .bloque-resultado {
            background-color: #f8fafc;
            border-left: 4px solid #007bff;
            padding: 10px 15px;
            font-family: Consolas, monospace;
            font-size: 13px;
            color: #0f172a;
            margin: 0;
            overflow-x: auto;
        }
        .etiqueta {
            display: inline-block;
            font-size: 11px;
            font-weight: bold;
            text-transform: uppercase;
            color: #64748b;
            margin-bottom: 4px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Chuleta Práctica: Funciones de Arrays en PHP</h1>
    <p class="intro">
        Ejemplos ejecutables de las principales funciones nativas para manipular, consultar y transformar arrays en PHP. 
        Analiza qué recibe y qué devuelve cada una para decidir cuáles aplicar en tu ejercicio.
    </p>

    <!-- 0. ARRAYS BASE -->
    <div class="funcion-card">
        <h2>Arrays de partida utilizados en los ejemplos</h2>
        <div class="bloque-codigo">$catalogo = [
    "Curso PHP"     => ["categoria" => "Programación",   "horas" => 40, "nivel" => "Intermedio"],
    "Curso MySQL"   => ["categoria" => "Bases de Datos", "horas" => 30, "nivel" => "Básico"],
    "Curso Laravel" => ["categoria" => "Programación",   "horas" => 50, "nivel" => "Avanzado"],
    "Curso HTML"    => ["categoria" => "Diseño Web",     "horas" => 20, "nivel" => "Básico"],
    "Curso CSS"     => ["categoria" => "Diseño Web",     "horas" => 25, "nivel" => "Básico"]
];
</br>
</br>

$colores = ["Rojo", "Azul", "Rojo", "Verde", "Azul", "Amarillo"];
</br>
</br>
$notas = ["Ana" => 8.5, "Carlos" => 6.0, "Beatriz" => 9.2];</div>
    </div>

    <!-- 1. count() -->
    <div class="funcion-card">
        <h2>1. count($array)</h2>
        <p>Devuelve el número total de elementos que contiene un array (o un sub-array).</p>
        <div class="bloque-codigo">$totalCursos = count($catalogo);
$datosCursoPHP = count($catalogo["Curso PHP"]);</div>
        <span class="etiqueta">Resultado:</span>
        <pre class="bloque-resultado"><?php
            echo "Total de cursos en \$catalogo: " . count($catalogo) . "\n";
            echo "Número de propiedades de 'Curso PHP': " . count($catalogo["Curso PHP"]);
        ?></pre>
    </div>

    <!-- 2. array_keys() -->
    <div class="funcion-card">
        <h2>2. array_keys($array)</h2>
        <p>Devuelve un array indexado con todas las claves (índices) de un array asociativo.</p>
        <div class="bloque-codigo">$nombresCursos = array_keys($catalogo);
print_r($nombresCursos);</div>
        <span class="etiqueta">Resultado:</span>
        <pre class="bloque-resultado"><?php
            print_r(array_keys($catalogo));
        ?></pre>
    </div>

    <!-- 3. array_values() -->
    <div class="funcion-card">
        <h2>3. array_values($array)</h2>
        <p>Devuelve todos los valores de un array reindexándolos numéricamente desde 0.</p>
        <div class="bloque-codigo">$soloNotas = array_values($notas);
print_r($soloNotas);</div>
        <span class="etiqueta">Resultado:</span>
        <pre class="bloque-resultado"><?php
            print_r(array_values($notas));
        ?></pre>
    </div>

    <!-- 4. array_column() -->
    <div class="funcion-card">
        <h2>4. array_column($arrayMultidimensional, 'clave')</h2>
        <p>Extrae los valores de una columna o clave concreta de cada elemento de un array multidimensional.</p>
        <div class="bloque-codigo">$categorias = array_column($catalogo, 'categoria');
print_r($categorias);</div>
        <span class="etiqueta">Resultado:</span>
        <pre class="bloque-resultado"><?php
            print_r(array_column($catalogo, 'categoria'));
        ?></pre>
    </div>

    <!-- 5. array_unique() -->
    <div class="funcion-card">
        <h2>5. array_unique($array)</h2>
        <p>Elimina los valores duplicados de un array, conservando únicamente la primera aparición de cada elemento.</p>
        <div class="bloque-codigo">$coloresSinRepetir = array_unique($colores);
print_r($coloresSinRepetir);</div>
        <span class="etiqueta">Resultado:</span>
        <pre class="bloque-resultado"><?php
            print_r(array_unique($colores));
        ?></pre>
    </div>

    <!-- 6. array_key_exists() -->
    <div class="funcion-card">
        <h2>6. array_key_exists('clave', $array)</h2>
        <p>Comprueba si una clave o índice concreto existe dentro de un array asociativo. Devuelve <code>true</code> o <code>false</code>.</p>
        <div class="bloque-codigo">$existePHP = array_key_exists("Curso PHP", $catalogo);
$existeJava = array_key_exists("Curso Java", $catalogo);</div>
        <span class="etiqueta">Resultado:</span>
        <pre class="bloque-resultado"><?php
            echo "¿Existe la clave 'Curso PHP'?: " . var_export(array_key_exists("Curso PHP", $catalogo), true) . "\n";
            echo "¿Existe la clave 'Curso Java'?: " . var_export(array_key_exists("Curso Java", $catalogo), true);
        ?></pre>
    </div>

    <!-- 7. in_array() -->
    <div class="funcion-card">
        <h2>7. in_array('valor', $array)</h2>
        <p>Comprueba si un valor determinado existe dentro de un array. Devuelve <code>true</code> o <code>false</code>.</p>
        <div class="bloque-codigo">$hayVerde = in_array("Verde", $colores);
$hayNegro = in_array("Negro", $colores);</div>
        <span class="etiqueta">Resultado:</span>
        <pre class="bloque-resultado"><?php
            echo "¿Está 'Verde' en \$colores?: " . var_export(in_array("Verde", $colores), true) . "\n";
            echo "¿Está 'Negro' en \$colores?: " . var_export(in_array("Negro", $colores), true);
        ?></pre>
    </div>

    <!-- 8. sort() -->
    <div class="funcion-card">
        <h2>8. sort($array)</h2>
        <p>Ordena los valores de un array de menor a mayor (o de la A a la Z). <strong>Modifica el array original</strong> y reasigna índices numéricos.</p>
        <div class="bloque-codigo">$copiaColores = ["Rojo", "Azul", "Verde", "Amarillo"];
sort($copiaColores);
print_r($copiaColores);</div>
        <span class="etiqueta">Resultado:</span>
        <pre class="bloque-resultado"><?php
            $copiaColores = ["Rojo", "Azul", "Verde", "Amarillo"];
            sort($copiaColores);
            print_r($copiaColores);
        ?></pre>
    </div>

    <!-- 9. rsort() -->
    <div class="funcion-card">
        <h2>9. rsort($array)</h2>
        <p>Ordena los valores de un array en orden descendente (de mayor a menor o de la Z a la A). Modifica el array original.</p>
        <div class="bloque-codigo">$numeros = [15, 4, 23, 8, 42];
rsort($numeros);
print_r($numeros);</div>
        <span class="etiqueta">Resultado:</span>
        <pre class="bloque-resultado"><?php
            $numeros = [15, 4, 23, 8, 42];
            rsort($numeros);
            print_r($numeros);
        ?></pre>
    </div>

    <!-- 10. ksort() -->
    <div class="funcion-card">
        <h2>10. ksort($arrayAsociativo)</h2>
        <p>Ordena un array asociativo según sus <strong>claves</strong> en orden ascendente, manteniendo la asociación clave => valor.</p>
        <div class="bloque-codigo">$copiaNotas = $notas;
ksort($copiaNotas);
print_r($copiaNotas);</div>
        <span class="etiqueta">Resultado:</span>
        <pre class="bloque-resultado"><?php
            $copiaNotas = $notas;
            ksort($copiaNotas);
            print_r($copiaNotas);
        ?></pre>
    </div>

    <!-- 11. array_merge() -->
    <div class="funcion-card">
        <h2>11. array_merge($array1, $array2)</h2>
        <p>Combina los elementos de dos o más arrays en un único array resultante.</p>
        <div class="bloque-codigo">$grupoA = ["Lunes", "Martes"];
$grupoB = ["Miércoles", "Jueves"];
$semana = array_merge($grupoA, $grupoB);
print_r($semana);</div>
        <span class="etiqueta">Resultado:</span>
        <pre class="bloque-resultado"><?php
            $grupoA = ["Lunes", "Martes"];
            $grupoB = ["Miércoles", "Jueves"];
            print_r(array_merge($grupoA, $grupoB));
        ?></pre>
    </div>

    <!-- 12. implode() -->
    <div class="funcion-card">
        <h2>12. implode('separador', $array)</h2>
        <p>Convierte un array en una cadena de texto uniendo todos sus elementos mediante el separador indicado.</p>
        <div class="bloque-codigo">$etiquetas = ["PHP", "HTML", "CSS", "MySQL"];
$texto = implode(" - ", $etiquetas);
echo $texto;</div>
        <span class="etiqueta">Resultado:</span>
        <pre class="bloque-resultado"><?php
            $etiquetas = ["PHP", "HTML", "CSS", "MySQL"];
            echo implode(" - ", $etiquetas);
        ?></pre>
    </div>
</div>

</body>
</html>