<?php
//para iniciar la sesión del usuario
session_start();

//si se empieza de nuevo, se borran los datos:
if(isset($_GET["limpiar"])){
    unset($_SESSION["datos_formulario"]);
    unset($_SESSION["nombre"]);

    //que no se recuperen los datos anteriores
    header("Location: formulario.php");
    exit;
}

//si los datos están guardados se recuperan, si no se usa una cadena vacía.
$datos = $_SESSION["datos_formulario"] ?? [];

$nombre = $datos["nombre"] ?? "";
$apellido = $datos["apellido"] ?? "";
$correo = $datos["correo"] ?? "";
$pais = $datos["pais"] ?? "";
$curso = $datos["curso"] ?? "";
$intereses = $datos["intereses"] ?? [];
$preferencias = $datos["preferencias"] ?? [];

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de inscripción</title>

    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>

<body class="bg-light">

    <div class="container py-5">

        <div class="card shadow mx-auto" style="max-width: 800px;">

            <div class="card-header bg-black text-white">

                <h1 class="h3 text-center mb-0"> Formulario de inscripción </h1>

            </div>
            <div class="card-body p-4">

                <p class="text-muted"> Introduce tus datos para inscribirte en nuestro curso. 
                </p>

                <form action="procesar.php" method="POST"> 

                    <div class="d-flex flex-row justify-content-between">
                        <div class="mb-3"> 
                            <label for="nombre" class="form-label">        
                                Nombre: 
                            </label> 
                            <input type="text" class="form-control" id="nombre" name="nombre" value="<?= htmlspecialchars($nombre, ENT_QUOTES, 'UTF-8') ?>" required> 
                        </div> 
                        <div class="mb-3"> 
                            <label for="apellido" class="form-label"> 
                                Apellido: 
                            </label> 
                            <input type="text" class="form-control" id="apellido" name="apellido" value="<?= htmlspecialchars($apellido, ENT_QUOTES, 'UTF-8') ?>" required> 
                        </div> 
                    </div>
                    

                    <div class="mb-3"> 
                        <label for="correo" class="form-label"> Correo electrónico: </label> 
                        <input type="email" class="form-control" id="correo" name="correo" value="<?= htmlspecialchars($correo, ENT_QUOTES, 'UTF-8') ?>" required> 
                    </div> 

                    <div class="mb-3"> 
                        <label for="pais" class="form-label"> País: </label> 
                        <select class="form-select" id="pais" name="pais" required>
                            <option value="">Selecciona un país</option>
                            <option value="España" <?= $pais === "España" ? "selected" : "" ?>> España </option>
                            <option value="Perú" <?= $pais === "Perú" ? "selected" : "" ?>> Perú </option>
                            <option value="México" <?= $pais === "México" ? "selected" : "" ?>> México </option>
                        </select> 
                    </div> 

                    <div class="mb-3"> 
                        <label for="intereses" class="form-label"> Intereses: </label> 

                        <select class="form-select" id="intereses" name="intereses[]" multiple size="4" required>
                            <option value="Programación" <?= in_array("Programación", $intereses, true) ? "selected" : "" ?>> Programación </option>
                            <option value="Diseño web" <?= in_array("Diseño web", $intereses, true) ? "selected" : "" ?>> Diseño web </option>
                            <option value="Bases de datos" <?= in_array("Bases de datos", $intereses, true) ? "selected" : "" ?>> Bases de datos </option>
                            <option value="Videojuegos" <?= in_array("Videojuegos", $intereses, true) ? "selected" : "" ?>> Videojuegos </option>
                        </select>

                        <div class="form-text"> Puedes seleccionar varios intereses. Mantén pulsada la tecla Ctrl mientras seleccionas. </div>
                    </div>

                    <fieldset class="mb-3">

                        <legend class="fs-6"> Curso: </legend>

                        <div class="form-check"> 
                            <input type="radio" class="form-check-input" id="1dam" name="curso" value="1DAM" <?= $curso === "1DAM" ? "checked" : "" ?> required> 
                            <label for="1dam" class="form-check-label"> 1DAM </label> 
                        </div>

                        <div class="form-check"> 
                            <input type="radio" class="form-check-input" id="2dam" name="curso" value="2DAM" <?= $curso === "2DAM" ? "checked" : "" ?>> 
                            <label for="2dam" class="form-check-label"> 2DAM </label> 
                        </div>

                    </fieldset> 

                    <fieldset class="mb-4">

                        <legend class="fs-6"> Preferencias: </legend>

                        <?php $opcionesPreferencias = ["Noticias", "Promociones", "Actualizaciones", "Eventos"]; ?> 
                        <?php foreach ($opcionesPreferencias as $preferencia): ?> 
                            <div class="form-check"> 
                                <input type="checkbox" class="form-check-input" 
                                id="<?= htmlspecialchars($preferencia, ENT_QUOTES, 'UTF-8') ?>" name="preferencias[]" 
                                value="<?= htmlspecialchars($preferencia, ENT_QUOTES, 'UTF-8') ?>" 
                                <?= in_array($preferencia, $preferencias, true) ? "checked" : "" ?>> 
                                <label for="<?= htmlspecialchars($preferencia, ENT_QUOTES, 'UTF-8') ?>" class="form-check-label"> 
                                    <?= htmlspecialchars($preferencia, ENT_QUOTES, 'UTF-8') ?> 
                                </label> 
                            </div> 
                        <?php endforeach; ?>
                    </fieldset> 

                    <div class="d-flex gap-2"> 
                        <button type="submit" class="btn btn-primary bg-black"> Enviar formulario </button> 
                        <button type="reset" class="btn btn-outline-secondary"> Limpiar campos </button> 
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
