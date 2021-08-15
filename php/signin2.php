<?php
include_once("coneccion.php");

$usuario;
$contrasena;
$fila = array();

$sql = "SELECT * FROM sesion where user='1020'";
echo $sql . "<br>";

$stmt = $conn->prepare($sql);
echo $sql . "<br>";
//$stmt->execute();



foreach ($conn->query($sql) as $fila) {
    $usuario = $fila[0];
    $contrasena = $fila[2];
}

echo "Usuario: " . $usuario;
echo "<br>";
echo "clave: " . $contrasena;
/*
if ($_POST['user'] == $usuario && $_POST['passw'] == $contrasena) {
    echo "exito";
} else {
    echo "Error";
}*/

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guardado</title>
</head>

<body>
    <h1>Exito</h1>
</body>

</html>