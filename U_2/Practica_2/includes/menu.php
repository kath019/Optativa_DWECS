<?php

// Array con las opciones del menú
$opciones = [
    "Inicio" => "index.php",
    "Mis hobbies" => "hobies.php",
    "Proyectos" => "proyectos.php",
    "Mis imágenes" => "imagenes.php"
];

?>

<header class="bg-red-200 p-4 flex justify-between items-center">

    <h2 class="font-bold text-xl">Mi blog</h2>

    <nav class="flex gap-5">

        <?php
        // Recorrer el array
        foreach ($opciones as $nombre => $enlace) {
        ?>
<!--html dinámico-->
            <a href="<?php echo $enlace; ?>">
                <?php echo $nombre; ?>
            </a>

        <?php
        }
        ?>

    </nav>

</header>