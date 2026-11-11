<?php

// Array con las opciones del menú
$opciones = [
    "Inicio" => "index.php",
    "Hobbies" => "hobies.php",
    "Proyectos" => "proyectos.php",
    "Imágenes" => "imagenes.php"
];

?>

<header class="bg-red-200 p-4 flex justify-between items-center border border-b-white">

    <h2 class="font-bold text-xl">Mi blog</h2>

    <nav class="flex gap-5">

        <?php
        // Recorrer el array
        foreach ($opciones as $nombre => $enlace) {
        ?>
            <!--html dinámico-->
            <a href="<?php echo $enlace; ?>" class="underline ">
                <?php echo $nombre; ?>
            </a>

        <?php
        }
        ?>

    </nav>

</header>

<!--Si tienes que añadir una nueva página primero modifica el array asociativo de arriba y pon algo tipo "Mis asignaturas" => "misAsignaturas.php?nombre=Katlhyn%20Montoya" si hay espacios
"Mis asignaturas" => "misAsignaturas.php?nombre=Katlhyn_Montoya" si no hay espacios
y hay que especificar la ruta
-->