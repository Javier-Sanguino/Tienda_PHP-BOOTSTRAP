<?php
session_start();

include("../php/coneccion.php");

$count = 0;
$link = ['wolverine2', 'batman', 'superman', 'capitanAmerica', 'venom', 'ironman', 'wolverine', 'wonderWoman', 'daenerys'];

$sql = "SELECT * FROM sesion where user='" . $_SESSION['usuario'] . "'";
foreach ($conn->query($sql) as $fila) {
    $foto = $fila[10];
}
$sql = "SELECT * FROM funkos where 1";
foreach ($conn->query($sql) as $fila) {
    $id[$count] = $fila[0];
    $nombre[$count] = $fila[1];
    $descripcion[$count] = $fila[2];
    $price[$count] = $fila[3];
    $imagen[$count] = $fila[4];
    $inventario[$count] = $fila[5];
    $count++;
}

if (!isset($_SESSION['usuario'])) {
    echo "Por favor inicie sesion primero: ";
    echo "<a href='../links/sesion.php'>Inicio sesion</a>";
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
        <link rel="stylesheet" href="../vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="../fonts/css/all.css">
        <title>Compras</title>
    </head>

    <body>
        <nav class="menu_bar">
            <ul class="menu">
                <li class="menu_item"><a href="../index.html">Home</a></li>
                <li class="menu_item"><a href="./conocenos.html">Con&oacute;cenos</a></li>
                <li class="menu_item"><a href="./contacto.html">Contacto</a></li>
                <li class="menu_item"><a href="./Add_funko.php">Crear Funko</a></li>
                <li class="menu_item item_perfil"><img src="<?php echo $foto ?>" alt="Foto perfil">
                    <ul class="menu_perfil_contenedor">
                        <li class="menu_perfil--item"><a href="../php/compra.php">Compras</a></li>
                        <li class="menu_perfil--item"><a href="../php/close_sesion.php">Cerrar sesion</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <h1>Bienvenido a compras <?php echo $_SESSION['nombre']; ?></h1>
        <section class="item_contenedor">
            <form action="../php/ejecutar_compra.php" method="POST" name="form_item-selected" class="form_contenedor">
                <?php
                for ($i = 0; $i < $count; $i++) {
                    if ($inventario[$i] != 0) {
                        echo "<div class='item'>";
                        echo "<div class='item_img'>
                    <a href='./shop_links/" . $link[$i] . ".html' target='window' onclick='windowFunction()'>
                    <img src='" . $imagen[$i] . "' alt='" . $nombre[$i] . "'></div>
                    </a>";
                        echo "<div class='item_description'>";
                        echo "<h3>funko " . $nombre[$i] . "</h3>";
                        echo "<p>" . $descripcion[$i] . "</p>";
                        echo "<h4>$ " . $price[$i] . "</h4>";
                        echo "</div>";
                        echo "<div class='item_cant'>";
                        echo "<p>Cantidad: </p>";
                        echo "<input type='number' value='1' name='cant" . $i . "' max='".$inventario[$i]."'>";
                        echo "</div>";
                        echo "<input type='checkbox' value='" . $id[$i] . "' name=" . $i . " class='item_selected'>";
                        echo "</div>";
                    }
                }
                echo "<input type='hidden' name='cont' value='" . $i . "'>";
                ?>
                <div class="comprar_contenedor">
                    <input type="submit" name="submit" value="Comprar" class="btn_comprar">
                </div>
            </form>
        </section>
        <section class="iframe_contenedor" id="iframeContenedor">
            <div class="btn_exit" onclick="windowClose()">
                <i class="fas fa-times"></i>
            </div>
            <iframe src="" frameborder="0" name="window"></iframe>
        </section>
        <!-- <div>
            <h5>Paginación</h5>
            <ul class="pagination">
            <?php
            $sql = "SELECT COUNT(id) FROM clientes";
            foreach ($conn->query($sql) as $fila) {
                $registros = $fila[0];
            }
            $limit1 = 0;
            echo "<li class='page-item disabled'><a class='page-link' href='#'>Previous</a></li>";
            for ($i = 1; $i < $registros / 10; $i++) {
                $limit2 = ($i * 10);
                echo "<li class='page-item'><a class='page-link' href='./paginacion.php?limite1=" . $limit1 . "&limite2=10'>" . $i . "</a></li>";
                $limit1 = ($i * 10) + 1;
            }
            $limit2 += 1;
            //echo "<li class='page-item'><a class='page-link' href='./paginacion.php?1=10'>" . $limit2 . " " . $registros . "</a></li>";
            echo "<li class='page-item'><a class='page-link' href='./paginacion.php?limite1=" . $limit1 . "&limite2=10'>" . $i . "</a></li>";

            ?>
            </ul>

        </div> -->
        <footer>
            <p>Made with <i class="fas fa-heart"></i> by JS Creations</p>
        </footer>
        <script src="../JS/shop.js"></script>
        <script src="../vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
    </body>

<?php

}

?>

    </html>