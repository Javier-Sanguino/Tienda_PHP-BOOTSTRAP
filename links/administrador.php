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
        <section class="bg-secondary col-sm-3 d-flex flex-column pt-3">
            <div class="title">
                <h1>Menu de opciones</h1>
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
            <section class="p-1">
                <a href="../php/admin.php?opc=inventario" class="d-flex align-items-center enlace justify-content-between btn btn-dark px-4" target="window">
                    <div><i class="fas fa-border-all"></i></div>
                    <span>inventario</span>
                </a>
            </section>
            <section class=" p-1">
                <a href="../php/admin.php?opc=compras" class="d-flex align-items-center enlace justify-content-between btn btn-dark px-4" target="window">
                    <div><i class="fas fa-cart-arrow-down"></i></div>
                    <span>Ver Compras</span>
                </a>
            </section>
            <section class=" p-1">
                <a href="../php/admin.php?opc=compras" class="d-flex align-items-center enlace justify-content-between btn btn-dark px-4" target="window">
                    <div><i class="fas fa-cart-arrow-down"></i></div>
                    <span>Ver Compras</span>
                </a>
                <div class="dropdown">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                        Dropdown button
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Link 1</a>
                        <a class="dropdown-item" href="#">Link 2</a>
                        <a class="dropdown-item" href="#">Link 3</a>
                    </div>
                </div>
            </section>
            <a href="../index.html" class="btn btn-primary" id="btn_back">Volver</a>
        </section>
        <section class="col-sm-9 d-flex">
            <iframe src="../php/admin.php" frameborder="0" name="window"></iframe>
        </section>
    </main>
    
</body>

</html>