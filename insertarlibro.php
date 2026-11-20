<?php

$servidor = "localhost";
$usuario = "root";
$password = "";
$baseDatos = "libreria";

$conexion = mysqli_connect($servidor, $usuario, $password, $baseDatos);


if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// 3. Recuperar los datos del formulario mediante POST
$titulo = $_POST['titulo'];
$nombreAutor = $_POST['nombreAutor'];
$numPage = $_POST['numPage'];
$precio = $_POST['precio'];

$sql = "INSERT INTO libros (titulo, nombreAutor, numPage, precio) VALUES ('$titulo', '$nombreAutor' ,'$numPage', '$precio')";

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado del registro</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <div class="contenedor">
        <h2>Estado del Registro</h2>

        <?php
        
        if (mysqli_query($conexion, $sql)) {
            echo "<div class='mensaje-exito'>¡Libro insertado correctamente en la base de datos!</div>";
        } else {
            echo "<div class='mensaje-error'>Error al insertar el libro: " . mysqli_error($conexion) . "</div>";
        }

        
        mysqli_close($conexion);
        ?>

        <a href="formulario.html" class="boton-volver">Volver al formulario</a>
    </div>
</body>
</html>
