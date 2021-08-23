<?php
$mensaje;
include("./coneccion.php");

$target_dir = "../img/";
$target_file = $target_dir . basename($_FILES["funko_img"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
  $check = getimagesize($_FILES["funko_img"]["tmp_name"]);
  if ($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["funko_img"]["tmp_name"], $target_file)) {
    echo "The file " . htmlspecialchars(basename($_FILES["funko_img"]["name"])) . " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}

try {
  $sql = "INSERT INTO funkos (nombre,	descripcion, price, imagen, cantidad)
    VALUES ('" . $_POST["nombre"] . "'," .
    "'" . $_POST["descripcion"] . "'," .
    "'" . $_POST["price"] . "'," .
    "'" . $target_file . "'," .
    "'" . $_POST["cantidad"] . "')";

  // use exec() because no results are returned
  $conn->exec($sql);
  $mensaje = "Registro creado satisfactoriamente";
} catch (PDOException $e) {
  $mensaje = "Error";
  echo $sql . "<br>" . $e->getMessage();
}

echo "<img src='" . $target_file . "' alt=''>";

$conn = null;
