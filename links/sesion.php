<?php

session_start();

function perfil_item()
{
    echo "<li class='menu_item'><a href='../index.html'>Perfil</a></li>";
}

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/sesion.css">
    <link rel="stylesheet" href="../fonts/css/all.css">
    <link rel="shortcut icon" href="../img/PopLogo.png">
    <link rel="stylesheet" href="../vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
    <title>Inicio de sesi&oacute;n</title>
</head>

<body>
    <nav class="menu_bar">
        <ul class="menu">
            <li class="menu_item"><a href="../index.html">Home</a></li>
            <li class="menu_item"><a href="./shop.php">Shop</a></li>
            <li class="menu_item"><a href="./conocenos.html">Con&oacute;cenos</a></li>
            <li class="menu_item"><a href="./contacto.html">Contacto</a></li>
            <?php
            if ($_SESSION['usuario'] != '') {
                perfil_item();
            }
            ?>
        </ul>
    </nav>
    <section class="sign_contenedor" id="sign_contenedor">
        <h2>Bienvenid@</h2>
        <button class="sign_btn sign-in" onclick="doSignIn()">Sign In</button>
        <button class="sign_btn" onclick="makeUser()">Crear cuenta</button>
    </section>
    <section class="newUser" id="newUser">
        <h2>Nuevo usuario</h2>
        <form action="../php/users.php" method="POST" name="form_newUser" enctype="multipart/form-data">
            <div class="form_item">
                <label for="">Nombre:</label>
                <input type="text" name="nombre" placeholder="Javier Sanguino">
            </div>
            <div class="form_item">
                <label for="">Usuario:</label>
                <input type="text" name="user" placeholder="Javier_Sanguino_97">
            </div>
            <div class="form_item">
                <label for="">Contraseña:</label>
                <input type="password" name="passw" placeholder="0123456789">
            </div>
            <div class="form_item">
                <label for="">Dirección:</label>
                <input type="text" name="adress" placeholder="Av 1 N° 1-11">
            </div>
            <div class="form_item">
                <label for="">Telefono:</label>
                <input type="tel" name="phone" placeholder="311 222 3333">
            </div>
            <div class="form_item">
                <label for="">Sexo:</label>
                <div class="input_radio">
                    <input type="radio" name="sexo" value="M" class="radio">M
                    <input type="radio" name="sexo" value="F" class="radio">F
                    <input type="radio" name="sexo" value="X" class="radio">Ninguno
                </div>
            </div>
            <div class="form_item">
                <label for="">Correo:</label>
                <input type="mail" name="mail" placeholder="tucorreo@gmail.com">
            </div>
            <div class="form_item">
                <label for="">Fecha de nacimiento:</label>
                <input type="date" name="fecha_nac">
            </div>
            <div class="form_item">
                <label for="">Pasatiempos:</label>
                <div class="input_radio">
                    <input type="radio" name="pasatiempo" value="Dormir" class="radio">Dormir
                    <input type="radio" name="pasatiempo" value="comer" class="radio">Comer
                    <input type="radio" name="pasatiempo" value="descansar" class="radio">Descansar
                </div>
            </div>
            <div class="form_item">
                <label for="">Ciudad:</label>
                <select name="ciudad" id="ciudad">
                    <option value="Cucuta">Cúcuta</option>
                    <option value="Medellin">Medellín</option>
                    <option value="Bogota">Bogotá</option>
                    <option value="Cali">Cali</option>
                    <option value="Barranquilla">Barranquilla</option>
                </select>
            </div>
            <div class="form_item">
                <label for="">Foto:</label>
                <input type="hidden" name="MAX_FILE_SIZE" value="900000" />
                <input type="file" name="file">
            </div>
            <input type="submit" value="Guardar" class="btn_guardar">
        </form>
    </section>
    <section class="sign_in_contenedor" id="signIn">
        <h2>Iniciar Sesion</h2>
        <form action="../php/signin.php" method="POST" name="form_signIn">
            <div class="form_item">
                <label for="">Usuario:</label>
                <input type="text" name="user" placeholder="Javier_Sanguino_97">
            </div>
            <div class="form_item">
                <label for="">Contraseña:</label>
                <input type="password" name="passw" placeholder="0123456789">
            </div>
            <input type="submit" value="Guardar" class="btn_guardar">
        </form>
    </section>
    <section class="sign_in_contenedor active">
        <h2>Eliminar usuarios</h2>
        <form action="../php/borrar_usuario.php" method="POST" name="form_signIn">
            <div class="form_item">
                <label for="">Usuario:</label>
                <input type="text" name="user" placeholder="Javier_Sanguino_97">
            </div>
            <input type="submit" value="Borrar" class="btn_guardar">
        </form>
    </section>
    <button class="btn_back" onclick="back()" id="btn_back">Volver</button>
    <button class="btn_close"><a href="../php/close_sesion.php">Cerrar sesión</a></button>
    <footer>
        <p>Made with <i class="fas fa-heart"></i> by JS Creations</p>
        <button><a href="./administrador.php">Admin</a></button>
    </footer>

    <script src="../JS/sesion.js"></script>
</body>

</html>