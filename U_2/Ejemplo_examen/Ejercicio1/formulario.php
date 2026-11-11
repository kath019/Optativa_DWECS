<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <script src="../../../tailwind.js"></script>
</head>

<body class="bg-gray-100 p-4">
    <div class="max-w-xl mx-auto">
        <h1 class="font-bold text text-2xl">Formulario de selección de preferencias</h1>

        <form action="resultado.php" method="POST">
            <div class="card-body p-4">
            
                <label>Color de fondo:</label>
                <br>
                <select class="border border-black" name="color" required> <!-- esto es lo que se manda al POST-->
                    <option value="pink">Rosa</option>
                    <option value="lightblue">Celeste</option>
                    <option value="purple">Morado</option>
                </select>

                <br><br>
                <label>Número de imágenes:</label>
                <input class="border border-black" type="number" name="cantidad" min="1" max="4" required>

                <br><br>
                <label>Elige el directorio de imágenes:</label>
                <br>
                <input type="checkbox" name="directorios[]" value="img1">
                <label>img1</label>
                <br>
                <input type="checkbox" name="directorios[]" value="img2">
                <label>img2</label>

                <br><br>
                <input class="bg-gray-200 border border-black p-1 text text-sm" type="submit" value="Mostrar imágenes">
            </div>
        </form>
    </div>
</body>
</html>

<!--
GET: los datos aparecen en la URL.
POST: los datos se envían en el cuerpo de la petición y no aparecen en la URL.-->