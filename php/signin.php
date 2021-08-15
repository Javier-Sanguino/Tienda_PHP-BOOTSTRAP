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
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" href="../img/PopLogo.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <title>Guardado</title>
</head>
<body>

<?php

$nombre;
$usuario;
$contrasena;
$fila = array();

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
    <section class="home">
        <div class="logo_box">
            <img src="../img/Funko_Logo.png" alt="Funko logo">
        </div>
        <h1 class="title">Store C&uacute;cuta</h1>
    </section>
    <p class="mensaje">
        <?php
        echo $mensaje;
        echo "<br>";
        echo "Bienvenido $nombre";
        ?>
    </p>
    <a href="../index.html" class="btnVolver"><button>Volver</button></a>
    <a href="../links/sesion.php" class="btnVolver"><button>Atras</button></a>

</body>

</html>