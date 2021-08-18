<?php
session_start();

include("../php/coneccion.php");

$count = 0;
$link = ['wolverine2', 'batman', 'superman', 'capitanAmerica', 'venom', 'ironman', 'wolverine', 'wonderWoman', 'daenerys'];

$sql = "SELECT COUNT(id) FROM clientes";
foreach ($conn->query($sql) as $fila) {
    $registros = $fila[0];
}

// echo "Limite 1: " . $_GET['limite1'];
// echo "<br>";
// echo "Limite 2: " . $_GET['limite2'];
// echo "<br>";

$sql = "SELECT * FROM clientes LIMIT " . $_GET['limite1'] . ", " . $_GET['limite2'];
foreach ($conn->query($sql) as $fila) {
    $id[$count] = $fila[0];
    $nombre[$count] = $fila[1];
    $apellidos[$count] = $fila[2];
    $count++;
}

for ($i = 0; $i < $count; $i++) {
    echo $id[$i];
    echo "  ";
    echo $nombre[$i];
    echo "  ";
    echo $apellidos[$i];
    echo "<br>";
}

$id = null;
$nombre = null;
$apellidos = null;

if (!isset($_SESSION['usuario'])) {
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
        <link rel="stylesheet" href="../vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="../fonts/css/all.css">
        <title>Compras</title>
    </head>

    <body>
        <!-- <nav class="menu_bar">
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
        </nav> -->
        <h1>Bienvenido a compras <?php echo $_SESSION['nombre']; ?></h1>
        <div>
            <ul class="pagination">
                <?php
                $pag_actual = $_GET['limite1'];
                if ($pag_actual == 0) {
                    echo "<li class='page-item disabled'><a class='page-link' href='./paginacion.php?limite1=" . $pag_actual . "&limite2=10'><i class='fas fa-chevron-circle-left'></i></a></li>";
                } else {
                    $pag_actual -= 10;
                    echo "<li class='page-item'><a class='page-link' href='./paginacion.php?limite1=" . $pag_actual . "&limite2=10'><i class='fas fa-chevron-circle-left'></i></a></li>";
                }
                $item_actual = $_GET['limite1'] / 10 + 1;
                $limit1 = 0;
                for ($i = $item_actual; $i < $item_actual + 2; $i++) {
                    $pag_actual = $_GET['limite1'];
                    if ($limit1 == $pag_actual) {
                        //$item_actual = $i;
                        echo "<li class='page-item active'><a class='page-link' href='./paginacion.php?limite1=" . $limit1 . "&limite2=10'>" . $i . "</a></li>";
                    } else {
                        echo "<li class='page-item'><a class='page-link' href='./paginacion.php?limite1=" . $limit1 . "&limite2=10'>" . $i . "</a></li>";
                    }
                    $limit1 = ($i * 10);
                }

                $pag_actual = $_GET['limite1'];
                if ($limit1 == $pag_actual) {
                    $item_actual = $i;
                    echo "<li class='page-item active'><a class='page-link' href='./paginacion.php?limite1=" . $limit1 . "&limite2=10'>" . $i . "</a></li>";
                } else {
                    echo "<li class='page-item'><a class='page-link' href='./paginacion.php?limite1=" . $limit1 . "&limite2=10'>" . $i . "</a></li>";
                }
                $pag_actual = $_GET['limite1'];
                if ($pag_actual == $limit1) {
                    echo "<li class='page-item disabled'><a class='page-link' href='./paginacion.php?limite1=" . $pag_actual . "&limite2=10'><i class='fas fa-chevron-circle-right'></i></a></li>";
                } else {
                    $pag_actual += 10;
                    echo "<li class='page-item'><a class='page-link' href='./paginacion.php?limite1=" . $pag_actual . "&limite2=10'><i class='fas fa-chevron-circle-right'></i></a></li>";
                }
                echo "Numero Actual: " . $item_actual;
                ?>
            </ul>

        </div>
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