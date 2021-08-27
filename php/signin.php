<?php
session_start();
include("coneccion.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="../css/style.css"> -->
    <link rel="shortcut icon" href="../img/PopLogo.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
    <title>Guardado</title>
</head>

<body>

    <?php

    $sql = "SELECT * FROM sesion where user='" . $_POST['user'] . "'";

    foreach ($conn->query($sql) as $fila) {
        $nombre = $fila[0];
        $usuario = $fila[1];
        $contrasena = $fila[2];
    }

    if ($_POST['user'] == $usuario && $_POST['passw'] == $contrasena) {
        $mensaje = "Inicio de sesion exitoso";
        $_SESSION['usuario'] = $_POST['user'];
        $_SESSION['clave'] = $_POST['passw'];
        $_SESSION['nombre'] = $nombre;
    } else {
        $mensaje = "Error";
    }

    ?>
    <section class="content-fluid home d-flex pt-3">
        <div class="logo_box col-sm-8">
            <img src="../img/Funko_Logo.png" alt="Funko logo" class="img-fluid">
        </div>
        <h1 class="d-flex align-items-end col-sm-4">Store C&uacute;cuta</h1>
    </section>
    <div class="content-fluid my-5 text-center">
        <p class="mensaje text-danger display-4">
            <?php
            echo $mensaje;
            echo "<br>";
            echo "Bienvenido <strong>$nombre</strong>";
            ?>
        </p>
    </div>
    <a href="../index.html" class="btnVolver btn btn-outline-primary mx-2">Volver</a>
    <a href="../links/sesion.php" class="btnVolver btn btn-outline-primary">Atras</a>

</body>

</html>