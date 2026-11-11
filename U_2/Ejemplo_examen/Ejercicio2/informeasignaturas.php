<?php 
//array asociativo, se accede mediante claves
$alumnos = [
    "Katlhyn_Montoya" => ["PSP", "PROYECTO", "ACCESO A DATOS", "OPTATIVA", "PROGRAMACIÓN MULTIMEDIA", "IPE", "PMDM", "INGLÉS", "SISTEMAS DE GESTIÓN EMPRESARIAL"],
    "Laura_Martinez" => ["PSP", "PROYECTO", "ACCESO A DATOS"],
    "Carlos_Gomez" => ["OPTATIVA", "PSP", "PROGRAMACIÓN MULTIMEDIA"],
    "Ana_Sanchez" => ["PROGRAMACIÓN MULTIMEDIA", "PROYECTO", "ACCESO A DATOS", "OPTATIVA"],
    "David_Rodriguez" => ["PSP", "ACCESO A DATOS", "OPTATIVA"],
    "Maria_Lopez" => ["PROYECTO", "PROGRAMACIÓN MULTIMEDIA", "PSP"]
    ];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informe</title>
    <script src="../../../tailwind.js"></script>
</head>
<body>
    <div class="max-w-xl mx-auto p-3">
        <h1 class="font-bold text text-xl">Informe de Asignaturas Matriculadas</h1>

        <br>
        
        <div class="flex flex-col">
            <?php
        foreach($alumnos as $alumno => $asignaturas) {
            echo "<div class='bg-gray-100 p-2 mb-4'>
                <h3 class='font-bold'>Alumno: $alumno</h3>
                <p class='text text-sm font-bold'>Asignaturas matriculadas:</p>
                <ul class='list-disc ml-5'>";

                foreach($asignaturas as $asignatura){
                    echo "<li class='text text-sm'>$asignatura</li>";
                }
                
            echo "</ul>
            </div>";
        }
        ?>
        </div>
        
    </div>
</body>
</html>


<!--Si te piden que muestres los datos de un alumno en concreto(ejercicio 3), primero modificaste en menu.php
luego aquí:
 <?php 
//array asociativo, se accede mediante claves
/*$alumnos = [
    "Katlhyn_Montoya" => ["PSP", "PROYECTO", "ACCESO A DATOS", "OPTATIVA", "PROGRAMACIÓN MULTIMEDIA", "IPE", "PMDM", "INGLÉS", "SISTEMAS DE GESTIÓN EMPRESARIAL"],
    "Laura_Martinez" => ["PSP", "PROYECTO", "ACCESO A DATOS"],
    "Carlos_Gomez" => ["OPTATIVA", "PSP", "PROGRAMACIÓN MULTIMEDIA"],
    "Ana_Sanchez" => ["PROGRAMACIÓN MULTIMEDIA", "PROYECTO", "ACCESO A DATOS", "OPTATIVA"],
    "David_Rodriguez" => ["PSP", "ACCESO A DATOS", "OPTATIVA"],
    "Maria_Lopez" => ["PROYECTO", "PROGRAMACIÓN MULTIMEDIA", "PSP"]
    ];
    
    $nombre = $_GET["nombre"];
...
if (isset($alumnos[$nombre])) {

    echo "<h2>Alumno: $nombre</h2>";
    echo "<p>Asignaturas matriculadas:</p>";

    echo "<ul style='list-style-type: disc; margin-left: 25px;'>";

    foreach ($alumnos[$nombre] as $asignatura) {
        echo "<li>$asignatura</li>";
    }

    echo "</ul>";

} else {
    echo "No se ha encontrado al alumno";
}
?>
-->*/