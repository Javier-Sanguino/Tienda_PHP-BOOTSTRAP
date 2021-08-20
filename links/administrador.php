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
    <title>Administrador</title>
</head>

<body>
    <section>
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
                <input type="submit" name="submit" value="Modificar">
            </form>
        </div>
    </section>
    <section>
        <h3>Inventarios</h3>
        <div>
            <form action="../php/admin.php" method="post">
                <input type="hidden" name="opc" value="inventario">
                <input type="submit" name="submit" value="Ver inventario">
            </form>
        </div>
    </section>
    <section>
        <h3>Movimientos de Compras</h3>
        <div>
            <form action="../php/admin.php" method="post">
                <input type="hidden" name="opc" value="compras">
                <input type="submit" name="submit" value="Ver Compras">
            </form>
        </div>
    </section>

</body>

</html>