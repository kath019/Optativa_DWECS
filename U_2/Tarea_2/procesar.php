```php
<?php

session_start();

// Comprobar que se ha enviado mediante POST.
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: formulario.php");
    exit;
}

// Recibir datos del formulario.
$nombre = trim($_POST["nombre"] ?? "");
$apellido = trim($_POST["apellido"] ?? "");
$correo = trim($_POST["correo"] ?? "");
$pais = $_POST["pais"] ?? "";
$curso = $_POST["curso"] ?? "";
$intereses = $_POST["intereses"] ?? [];
$preferencias = $_POST["preferencias"] ?? [];

// Comprobar si son arrays.
if (!is_array($intereses)) {
    $intereses = [];
}
if (!is_array($preferencias)) {
    $preferencias = [];
}

// Guardar los datos para recuperarlos al volver al formulario.
$_SESSION["datos_formulario"] = [
    "nombre" => $nombre,
    "apellido" => $apellido,
    "correo" => $correo,
    "pais" => $pais,
    "curso" => $curso,
    "intereses" => $intereses,
    "preferencias" => $preferencias
];

// Crear el array de errores.
$errores = [];

// Validaciones
if ($nombre === "") {
    $errores[] = "El nombre es obligatorio.";
}

if ($apellido === "") {
    $errores[] = "El apellido es obligatorio.";
}

if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    $errores[] = "El correo electrónico no es válido.";
}

$paisesPermitidos = ["España", "Perú", "México"];

if (!is_string($pais) || !in_array($pais, $paisesPermitidos, true)) {
    $errores[] = "Debes seleccionar un país válido.";
}

$cursosPermitidos = ["1DAM", "2DAM"];

if (!is_string($curso) || !in_array($curso, $cursosPermitidos, true)) {
    $errores[] = "Debes seleccionar un curso válido.";
}

$interesesPermitidos = [
    "Programación",
    "Diseño web",
    "Bases de datos",
    "Videojuegos"
];

if (
    count($intereses) === 0 ||
    count(array_diff($intereses, $interesesPermitidos)) > 0
) {
    $errores[] = "Debes seleccionar al menos un interés válido.";
}

$preferenciasPermitidas = [
    "Noticias",
    "Promociones",
    "Actualizaciones",
    "Eventos"
];

if (count(array_diff($preferencias, $preferenciasPermitidas)) > 0) {
    $errores[] = "Has seleccionado una preferencia no válida.";
}

// Guardar el nombre en la sesión si todos los datos son válidos.
if (empty($errores)) {
    $_SESSION["nombre"] = $nombre;
}

// Mostrar texto de forma segura.
function escapar($valor)
{
    return htmlspecialchars((string) $valor, ENT_QUOTES, "UTF-8");
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado del formulario</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

</head>

<body class="bg-light">

    <div class="container py-5">

        <div class="card shadow mx-auto" style="max-width: 750px;">

            <div class="card-header bg-primary text-white">

                <h1 class="h3 text-center mb-0">
                    Resultado del formulario
                </h1>

            </div>

            <div class="card-body p-4">

                <?php if (!empty($errores)): ?>

                    <div class="alert alert-danger">

                        <h2 class="h5">
                            Se han encontrado errores:
                        </h2>

                        <ul class="mb-0">

                            <?php foreach ($errores as $error): ?>

                                <li>
                                    <?= escapar($error) ?>
                                </li>

                            <?php endforeach; ?>

                        </ul>

                    </div>

                    <p>
                        Vuelve al formulario para corregir los datos.
                    </p>

                <?php else: ?>

                    <div class="alert alert-success">

                        <h2 class="h4">
                            ¡Bienvenida,
                            <?= escapar($_SESSION["nombre"]) ?>!
                        </h2>

                        <p class="mb-0">
                            Tus datos se han recibido correctamente.
                        </p>

                    </div>


                    <h2 class="h5 mb-3">
                        Resumen de la inscripción
                    </h2>

                    <ul class="list-group mb-4">

                        <li class="list-group-item">
                            <strong>Nombre:</strong>
                            <?= escapar($nombre) ?>
                        </li>

                        <li class="list-group-item">
                            <strong>Apellido:</strong>
                            <?= escapar($apellido) ?>
                        </li>

                        <li class="list-group-item">
                            <strong>Correo electrónico:</strong>
                            <?= escapar($correo) ?>
                        </li>

                        <li class="list-group-item">
                            <strong>País:</strong>
                            <?= escapar($pais) ?>
                        </li>

                        <li class="list-group-item">
                            <strong>Curso:</strong>
                            <?= escapar($curso) ?>
                        </li>

                        <li class="list-group-item">
                            <strong>Intereses:</strong>
                            <?php if (empty($intereses)): ?>
                                Ninguno
                            <?php else: ?>
                                <?= escapar(implode(", ", $intereses)) ?>
                            <?php endif; ?>
                        </li>

                        <li class="list-group-item"> <strong>Preferencias:</strong>
                            <?php if (empty($preferencias)): ?>
                                Ninguna
                            <?php else: ?>
                                <?= escapar(implode(", ", $preferencias)) ?>
                            <?php endif; ?>
                        </li>
                    </ul>

                    <div class="alert alert-info">

                        <p class="mb-2"> <strong>Número de intereses seleccionados:</strong>
                            <?= count($intereses) ?>
                        </p>

                        <p class="mb-0"> <strong> Número de preferencias seleccionadas:</strong>
                            <?= count($preferencias) ?>
                        </p>

                    </div>

                <?php endif; ?>


                <a href="formulario.php" class="btn btn-primary">
                    Volver al formulario
                </a>

                <a href="formulario.php?limpiar=1" class="btn btn-outline-danger">
                    Empezar de nuevo
                </a>

            </div>

        </div>

    </div>

</body>

</html>
```
