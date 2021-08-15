<?php

session_start();

include("./coneccion.php");

$usuario = $_SESSION['usuario'];

try {
  // sql to delete a record
  $sql = "DELETE FROM carrito WHERE usuario = '" . $usuario . "'";

  // use exec() because no results are returned
  $conn->exec($sql);
  echo "Record deleted successfully";
} catch (PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

header("Location: ../index.html");
