<?php 
echo "<h1>Ejercicio 1.6</h1>";
echo "<p>Aleatorio generado: </p>";
$aleatorio = rand(1,10);
echo $aleatorio. " => " ;

if($aleatorio < 5){
    echo "Insuficiente";
} else if($aleatorio <= 6){
    echo "Suficiente";
}else if ($aleatorio <=7){
    echo "Bien";
} else if ($aleatorio <=9){
    echo "Notable";
} else {
    echo "Sobresaliente";
}
?>