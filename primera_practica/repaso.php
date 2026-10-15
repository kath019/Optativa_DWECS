<?php
$nombre = "Katlhyn";
$nombreCompleto = "Katlhyn Montoya";
$edad =21;
$numero = 123;
$numero2 = 1234;
$pi = 3.14;
$suerte = true;

//así se cometna dentro
/*Así también se comenta dentro */

$saludo ="Buenos días,";

echo $saludo;
echo $nombreCompleto;

echo '<h1>'.$saludo. ' '.$nombreCompleto. '</h1>';

//ahora voy a cambiar el valor de una variable
$nombre ="Kael";
echo '<h2>'.$saludo.' '.$nombre. '</h2>';


//para salto de linea
echo '<br>';

//para poner una línea negra divisible
echo '<hr>';
//arrays
$a[1] = "lunes";
$a[2] = "martes";
$a[3] = "miércoles";
$a[4] = "jueves";
$a[5] = "viernes";
$a[6] = "sábado";
$a[7] = "domingo";


$a["ESP"] = "España";
$a["FRA"] = "Francia";
$a["POR"] = "Portugal";


echo '<p>' .$a[4]. '</p>';
echo "<p>".$a["ESP"]. "</p>";

//variables del servidor
echo $_SERVER['SERVER_ADDR'];
echo $_SERVER['SERVER_NAME'];
echo $_SERVER['SERVER_SOFTWARE'];

echo '<br>';
define("PI", 3.1416);
echo PI;

echo '<br>';
echo '<hr>';

//condicionales
echo 'condicionales';
$color = 'rojo';
if($color =='rojo'){
    echo '<h3>Sevillista</h3>';
} elseif ($color =='verde'){
    echo '<h3>Bético</h3>';
} else {
    echo '<h3>Otro</h3>';
}

//switch
$dia = 4;
switch($dia){
    case 1:
        echo 'lunes';
        break;
    case 2:
        echo 'martes';
        break;
    case 3:
        echo 'miércoles';
    case 4:
        echo 'jueves';
        break;
    default:
        echo 'es finde';
}

echo '<br>';
//fecha
echo date('d-m-Y');
echo '<br>';
//tiempo
$hoy = date('H:i:s');
echo $hoy;

echo '<br>';


//funciones predefinidas
echo gettype($nombre);
echo '<br>';
echo is_string($nombre) == true ? "Es una cadena" : "No es una cadena";
echo '<br>';
echo isset($nombre);
echo "<br/>";


// Encontrar caracter
$frase = "horas de libre configuración";
echo strpos($frase, "con");
echo "<br/>";

//arrays
$peliculas = array('Batman', 'Spiderman', 'Woner Woman', 'Iron Man');
foreach($peliculas as $p){
    echo "<li>$p</li>";
}

?>
