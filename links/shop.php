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
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="../img/PopLogo.png">
    <link rel="stylesheet" href="../css/style_shop.css">
    <link rel="stylesheet" href="../fonts/css/all.css">
    <title>Tienda PHP</title>
</head>

<body>
    <main>
        <nav class="menu_bar">
            <ul class="menu">
                <li class="menu_item"><a href="../index.html">Home</a></li>
                <li class="menu_item"><a href="./conocenos.html">Con&oacute;cenos</a></li>
                <li class="menu_item"><a href="./contacto.html">Contacto</a></li>
                <?php
                if ($_SESSION['usuario'] == '') {
                    echo "<li class='menu_item'><a href='./sesion.php'>Iniciar sesión</a></li>";
                } else {
                ?>
                    <li class="menu_item menu_perfil">
                        <div class="perfil_contenedor">
                            <figure class="perfil_contenedor--img">
                                <img src="<?php echo $foto ?>" alt="Foto perfil">
                            </figure>
                        </div>
                        <ul class="menu_perfil_contenedor">
                            <li class="menu_perfil--item"><a href="../php/compra.php">Compras</a></li>
                            <li class="menu_perfil--item"><a href="../php/close_sesion.php">Cerrar sesion</a></li>
                        </ul>
                    </li>
                <?php
                }
                ?>
            </ul>
        </nav>
        <section class="contenedor">
            <div class="item_box">
                <a href="./shop_links/wolverine.html" target="window" onclick="windowFunction()">
                    <div class="item wolverine" title="Wolverine"></div>
                </a>
            </div>
            <div class="item_box">
                <a href="./shop_links/superman.html" target="window" onclick="windowFunction()">
                    <div class="item superman" title="Superman"></div>
                </a>
            </div>
            <div class="item_box">
                <a href="./shop_links/batman.html" target="window" onclick="windowFunction()">
                    <div class="item batman" title="Batman"></div>
                </a>
            </div>
            <div class="item_box">
                <a href="./shop_links/ironman.html" target="window" onclick="windowFunction()">
                    <div class="item ironman" title="Iron man"></div>
                </a>
            </div>
            <div class="item_box">
                <a href="./shop_links/capitanAmerica.html" target="window" onclick="windowFunction()">
                    <div class="item capi" title="Capitán America"></div>
                </a>
            </div>
            <div class="item_box">
                <a href="./shop_links/venom.html" target="window" onclick="windowFunction()">
                    <div class="item venom" title="Venom"></div>
                </a>
            </div>
        </section>
        <section class="iframe_contenedor" id="iframeContenedor">
            <div class="btn_exit" onclick="windowClose()">
                <i class="fas fa-times"></i>
            </div>
            <iframe src="" frameborder="0" name="window"></iframe>
        </section>
        <footer>
            <p>Made with <i class="fas fa-heart"></i> by JS Creations</p>
        </footer>
    </main>
    <script src="../JS/shop.js"></script>
</body>

</html>