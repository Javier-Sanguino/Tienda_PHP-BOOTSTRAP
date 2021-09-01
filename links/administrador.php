<?php

session_start();

include('../php/coneccion.php');
include("../php/admin.php");

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <?php

    class administrador
    {
        function menu_login()
        {
    ?>
            <section class="row login-box" id="login-box">
                <!-- <div class="col-sm-4"></div> -->
                <section class="sign_in_contenedor col-sm-12 my-5 text-center d-flex flex-column align-items-center" id="signIn">
                    <h2 class="display-4 py-3">Iniciar Sesion</h2>
                    <form action="./administrador.php" method="post" name="form_signIn" autocomplete="on" class="col-sm-6">
                        <div class="form_item form-group my-2">
                            <label for="">Usuario:</label>
                            <input type="text" name="user" placeholder="Javier_Sanguino_97" class="form-control" required>
                        </div>
                        <div class="form_item form-group">
                            <label for="">Contraseña:</label>
                            <input type="password" name="passw" placeholder="WD06yln#GibB" class="form-control" required>
                        </div>
                        <input type="hidden" name="sesion" value="1">
                        <input type="submit" value="Ingresar" class="btn btn-danger m-3" onclick="sesion()">
                    </form>
                </section>
                <!-- <div class="col-sm-4"></div> -->
            </section>
        <?php
        }

        function sesion($conx)
        {

            $mensaje = false;
            if ($_POST['user'] != '') {
                $sql = "SELECT * FROM administradores where usuario = '" . $_POST['user'] . "'";

                foreach ($conx->query($sql) as $fila) {
                    $usuario = $fila[1];
                    $contrasena = $fila[2];
                    $_SESSION['permiso'] = $fila[3];
                }

                if ($_POST['user'] == $usuario && $_POST['passw'] == $contrasena) {
                    $mensaje = true;
                    $_SESSION['admin'] = $usuario;
                    //echo "Exito";
                } else {
                    $mensaje = false;
                }
            }
            return $mensaje;
        }
    }

    $admin1 = new administrador();
    if ($_POST['user'] == '') {
        $admin1->menu_login();
    } elseif ($admin1->sesion($conn)) {
        $permiso = $_SESSION['permiso'];
        ?>
        <div class="alert alert-success alert-dismissible alert-box">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Success!</strong> Indicates a successful or positive action.
        </div>
        <main class="row bg-warning main" id="main-container">
            <section class="bg-light col-sm-3 d-flex flex-column pt-3">
                <div class="logo-box row">
                    <div class="col-sm-3"></div>
                    <a href="../index.html" class="col-sm-6"><img src="../img/Funko_Logo.png" alt="" class="img-fluid"></a>
                    <div class="col-sm-3"></div>
                </div>
                <div class="title">
                    <h4>Menu</h4>
                </div>

                <section class="my-1 p-1 btn-box">
                    <a href="../php/admin.php?opc=inventario" id="btn_inventario" class="btn btn-outline-dark p-4" target="window">
                        <div><i class="fas fa-border-all"></i></div>
                        <span>inventario</span>
                    </a>
                </section>
                <?php
                if ($permiso < 3) {
                ?>
                    <section class="my-1 p-1 btn-box">

                        <a href="../php/admin.php?opc=compras" id="btn_compras" class="btn btn-outline-secondary p-4" target="window">
                            <div><i class="fas fa-cart-arrow-down"></i></div>
                            <span>Ver Compras</span>
                        </a>
                    </section>
                <?php
                }

                if ($permiso == 1) {
                ?>
                    <section class="my-1 p-1 btn-box">
                        <a href="../php/admin.php?opc=usuarios" id="btn_usuarios" class="btn btn-outline-secondary p-4" target="window">
                            <div><i class="fas fa-user-plus"></i></div>
                            <span>Crear Ususarios</span>
                        </a>
                    </section>
                <?php
                }
                if ($permiso == 1) {
                ?>
                    <section class="my-1 p-1 btn-box dropdown">
                        <a href="../php/admin.php?opc=historial" id="btn_historial" class="btn btn-outline-secondary p-4 dropdown-toggle" data-toggle="dropdown">
                            <div><i class="fas fa-history"></i></i></div>
                            <span>Ver historial</span>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="../php/admin.php?opc=historial&op=1" target="window">Funkos</a>
                            <a class="dropdown-item" href="../php/admin.php?opc=historial&op=2" target="window">Usuarios</a>
                        </div>
                    </section>
                <?php
                }
                ?>
                <a href="../index.html" class="btn btn-primary" id="btn_back">Volver</a>
            </section>
            <section class="col-sm-9 d-flex">
                <iframe src="../php/admin.php" frameborder="0" name="window"></iframe>
            </section>
        </main>
        <script src="../JS/admin.js"></script>

    <?php
    } elseif (!$admin1->sesion($conn)) {
        $admin1->menu_login();
    ?>
        <div class="alert alert-danger alert-dismissible alert-box">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Success!</strong> Indicates a successful or positive action.
        </div>
    <?php
    }
    ?>
</body>

</html>