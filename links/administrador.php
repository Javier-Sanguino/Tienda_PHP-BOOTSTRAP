<?php

session_start();

include("../php/admin.php");

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/PopLogo.png" type="image/x-icon">
    <link rel="stylesheet" href="../vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../fonts/css/all.min.css">
    <script src="../vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Administrador</title>
</head>

<body>
    <main class="row bg-warning">
        <section class="bg-light col-sm-3 d-flex flex-column pt-3">
            <div class="logo-box row">
                <div class="col-sm-3"></div>
                <a href="../index.html" class="col-sm-6"><img src="../img/Funko_Logo.png" alt="" class="img-fluid"></a>
                <div class="col-sm-3"></div>
            </div>
            <div class="title">
                <h4>Menu</h4>
            </div>
            <section class="modificar_inv">
                <h3>Modificar cantidades</h3>
                <div>
                    <form action="../php/admin.php" method="post">
                        <div>
                            <label for="">ID Funko:</label>
                            <input type="text" name="id_funko">
                        </div>
                        <div>
                            <label for="">Cantidad:</label>
                            <input type="text" name="cantidad">
                        </div>
                        <input type="hidden" name="opc" value="modificar">
                        <input type="submit" name="submit" value="Modificar" class="btn btn-outline-primary">
                    </form>
                </div>
            </section>
            <section class="my-1 p-1 btn-box">
                <a href="../php/admin.php?opc=inventario" id="btn_inventario" class="btn btn-outline-secondary p-4" target="window">
                    <div><i class="fas fa-border-all"></i></div>
                    <span>inventario</span>
                </a>
            </section>
            <section class="my-1 p-1 btn-box">
                <a href="../php/admin.php?opc=compras" id="btn_compras" class="btn btn-outline-secondary p-4" target="window">
                    <div><i class="fas fa-cart-arrow-down"></i></div>
                    <span>Ver Compras</span>
                </a>
            </section>
            <section class="my-1 p-1 btn-box dropdown">
                <a href="../php/admin.php?opc=historial" id="btn_compras" class="btn btn-outline-secondary p-4 dropdown-toggle" data-toggle="dropdown">
                    <div><i class="fas fa-history"></i></i></div>
                    <span>Ver historial</span>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="../php/admin.php?opc=historial&op=1" target="window">Funkos</a>
                    <a class="dropdown-item" href="../php/admin.php?opc=historial&op=2" target="window">Usuarios</a>
                </div>
            </section>
            <a href="../index.html" class="btn btn-primary" id="btn_back">Volver</a>
        </section>
        <section class="col-sm-9 d-flex">
            <iframe src="../php/admin.php" frameborder="0" name="window"></iframe>
        </section>
    </main>
    <script src="../JS/admin.js"></script>
</body>

</html>