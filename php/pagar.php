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

for ($i = 0; $i < $_POST['contador']; $i++) {
  $sql = "SELECT * FROM funkos WHERE id = '" . $_POST['id' . $i] . "'";
  foreach ($conn->query($sql) as $fila) {
    $inventario[$i] = $fila[5];
  }
}

for ($i = 0; $i < $_POST['contador']; $i++) {
  try {       //Se insertan en la tabla carrito los nuevos valores
    $sql = "UPDATE funkos SET cantidad = " . ($inventario[$i] - $_POST['cantidad' . $i]) . " WHERE id = '" . $_POST['id' . $i] . "'";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Registro creado satisfactoriamente";
  } catch (PDOException $e) {
    $mensaje = "Error";
    echo $sql . "<br>" . $e->getMessage();
  }
  try {       //Se insertan en la tabla carrito los nuevos valores
    $sql = "INSERT INTO compras (usuario, id_funko, cantidad)
    VALUES ('" . $usuario . "',
        '" . $_POST['id' . $i] . "'," .
      "'" . $_POST['cantidad' . $i] . "')";
    // use exec() because no results are returned
    $conn->exec($sql);
    $mensaje = "Registro creado satisfactoriamente";
  } catch (PDOException $e) {
    $mensaje = "Error";
    echo $sql . "<br>" . $e->getMessage();
  }
}
echo $mensaje;

header("Location: ../index.html");
