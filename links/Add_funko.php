<?php
session_start();

include("../php/coneccion.php");

$fila = array();
$foto;
$sql = "SELECT * FROM sesion where user= '" . $_SESSION['usuario'] . "'";

foreach ($conn->query($sql) as $fila) {
    $foto = $fila[10];
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/Add_funko.css">
    <link rel="shortcut icon" href="../img/PopLogo.png" type="image/x-icon">
    <link rel="stylesheet" href="../fonts/css/all.css">
    <title>Agregar Funko</title>
</head>

<body>
    <section class="add_funko-contenedor">
        <h2>Agregar nuevo Funko</h2>
        <form action="../php/save_funko.php" method="POST" name="form_Add_funko" enctype="multipart/form-data">
            <div class="form_item">
                <label for="">Nombre:</label>
                <input type="text" name="nombre" placeholder="Daenerys Targaryen">
            </div>
            <div class="form_item">
                <label for="">Descripción:</label>
                <input type="text" name="descripcion" placeholder="Funko de Game of Thrones">
            </div>
            <div class="form_item">
                <label for="">Precio:</label>
                <input type="text" name="price" placeholder="$ 10.000">
            </div>
            <div class="form_item">
                <label for="">Foto:</label>
                <input type="hidden" name="MAX_FILE_SIZE" value="900000" />
                <input type="file" name="funko_img">
            </div>
            <input type="submit" value="Guardar" class="btn_guardar">
        </form>
    </section>
    <button class="btn_back"><a href="../index.html">Volver</a></button>
    <footer>
        <p>Made with <i class="fas fa-heart"></i> by JS Creations</p>
    </footer>
</body>

</html>