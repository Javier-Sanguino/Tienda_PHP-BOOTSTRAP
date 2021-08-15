<?php
session_start();

include("./coneccion.php");

$fila = array();
$foto;
$sql = "SELECT * FROM sesion where user='" . $_SESSION['usuario'] . "'";

foreach ($conn->query($sql) as $fila) {
    $foto = $fila[10];
}

if ($_SESSION['usuario'] == "") {
    echo "Por favor inicie sesion primero: ";
    echo "<a href='../links/sesion.html'>Inicio sesion</a>";
} else {

?>

    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="../img/PopLogo.png" type="image/x-icon">
        <link rel="stylesheet" href="../css/compra.css">
        <link rel="stylesheet" href="../fonts/css/all.css">
        <title>Compras</title>
    </head>

    <body>
        <h1>Bienvenido a compras <?php echo $_SESSION['nombre']; ?></h1>
        <section class="item_contenedor">
            <div class="item">
                <div class="item_img wolverine"></div>
                <div class="item_description">
                    <h3>funko Wolverine</h3>
                    <h4>$ 15.99</h4>
                </div>
                <input type="checkbox" value="selected" name="item-selected" class="item_selected">
            </div>

            <div class="item">
                <div class="item_img superman"></div>
                <div class="item_description">
                    <h3>funko Superman</h3>
                    <h4>$ 15.99</h4>
                </div>
                <input type="checkbox" value="selected" name="item-selected" class="item_selected">
            </div>
            <div class="item">
                <div class="item_img batman"></div>
                <div class="item_description">
                    <h3>funko Batman</h3>
                    <h4>$ 15.99</h4>
                </div>
                <input type="checkbox" value="selected" name="item-selected" class="item_selected">
            </div>
            <div class="item">
                <div class="item_img iron-man"></div>
                <div class="item_description">
                    <h3>funko Iron man</h3>
                    <h4>$ 15.99</h4>
                </div>
                <input type="checkbox" value="selected" name="item-selected" class="item_selected">
            </div>
            <div class="item">
                <div class="item_img cap-america"></div>
                <div class="item_description">
                    <h3>funko Capitan America</h3>
                    <h4>$ 15.99</h4>
                </div>
                <input type="checkbox" value="selected" name="item-selected" class="item_selected">
            </div>
            <div class="item">
                <div class="item_img venom"></div>
                <div class="item_description">
                    <h3>funko Venom</h3>
                    <h4>$ 15.99</h4>
                </div>
                <input type="checkbox" value="selected" name="item-selected" class="item_selected">
            </div>
        </section>
        <div class="comprar_contenedor">
            <input type="submit" name="submit" value="Comprar" class="btn_comprar">
        </div>
        <footer>
            <p>Made with <i class="fas fa-heart"></i> by JS Creations</p>
        </footer>
    </body>

    </html>

<?php

}

?>