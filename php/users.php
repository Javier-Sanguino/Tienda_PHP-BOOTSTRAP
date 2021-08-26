<?php
session_start();

include("./coneccion.php");

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
  <title>Guardar</title>
</head>

<body>

  <?php

  $target_dir = "../img/up_img/";
  $target_file = $target_dir . basename($_FILES["file"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
  // Check if image file is a actual image or fake image
  if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["file"]["tmp_name"]);
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
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
      chmod('../img/up_img/' . $FILES['file']['name'], 0775);
      echo "The file " . htmlspecialchars(basename($_FILES["file"]["name"])) . " has been uploaded.";
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }

  try {
    $sql = "INSERT INTO sesion (nombre,	user, passw, dir,	tel,	sex,	mail,	fecha_nac,	pasatiempo,	ciudad,	file)
    VALUES ('" . $_POST["nombre"] . "'," .
      "'" . $_POST["user"] . "'," .
      "'" . $_POST["passw"] . "'," .
      "'" . $_POST["adress"] . "'," .
      "'" . $_POST["phone"] . "'," .
      "'" . $_POST["sexo"] . "'," .
      "'" . $_POST["mail"] . "'," .
      "'" . $_POST["fecha_nac"] . "'," .
      "'" . $_POST["pasatiempo"] . "'," .
      "'" . $_POST["ciudad"] . "'," .
      "'" . $target_file . "')";
    // use exec() because no results are returned
    $conn->exec($sql);
    $mensaje = "Registro creado satisfactoriamente";
    date_default_timezone_set('America/Bogota');
    $fecha = date('y-m-d');
    $file = fopen("../archivos/Usuarios.txt", "a");
    fwrite($file, PHP_EOL . "Se creo un nuevo usuario con el nombre: "
      . $_POST["nombre"] . ". Por el usuario: "
      . $_SESSION['usuario'] . ". El día "
      . $fecha . PHP_EOL);
    fclose($file);
  } catch (PDOException $e) {
    $mensaje = "Error";
    echo $sql . "<br>" . $e->getMessage();
  }

  $conn = null;

  ?>
  <section class="content-fluid home d-flex pt-3">
    <div class="logo_box  col-sm-8">
      <img src="../img/Funko_Logo.png" alt="Funko logo" class="img-fluid">
    </div>
    <h1 class="d-flex align-items-end col-sm-4">Store C&uacute;cuta</h1>
  </section>
  <div class="content-fluid my-5 text-center">
    <p class="mensaje text-danger display-4">
      <?php
      echo $mensaje;
      ?>
    </p>
  </div>

  <a href="../index.html" class="btnVolver btn btn-outline-primary mx-2">Volver</a>

</body>

</html>