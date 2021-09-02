<?php

session_start();

include("./coneccion.php");

$usuario = $_SESSION['usuario'];

try {
  // sql to delete a record
  $sql = "DELETE FROM sesion WHERE user = '" . $_POST['user'] . "'";

  // use exec() because no results are returned
  $conn->exec($sql);
  echo "Record deleted successfully";
  date_default_timezone_set('America/Bogota');
  $fecha = date('y-m-d');
  $file = fopen("../archivos/Usuarios.txt", "a");
  fwrite($file, PHP_EOL . "Se ELIMINO el usuario con el nombre de usuario: " . $_POST["user"] . ". Por el usuario: " . $_SESSION['usuario'] . "El día " . $fecha . PHP_EOL);
  fclose($file);
} catch (PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}
//prueba

header("Location: ../index.html");
