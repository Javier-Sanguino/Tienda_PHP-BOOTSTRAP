<?php

session_start();

include("../php/admin.php");


$sql = "SELECT * FROM administradores where usuario = '" . $_POST['user'] . "'";

foreach ($conn->query($sql) as $fila) {
    $usuario = $fila[1];
    $contrasena = $fila[2];
    $permiso = $fila[3];
}

if ($_POST['user'] == $usuario && $_POST['passw'] == $contrasena) {
    $mensaje = "Inicio de sesion exitoso";
    echo $mensaje;
} else {
    $mensaje = "Error";
    echo $mensaje;
}
