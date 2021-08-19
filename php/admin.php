<?php

session_start();
require("./coneccion.php");

if (isset($_SESSION['usuario'])) {

    class admin
    {
        public $nombre;

        function __construct($name)
        {
            $this->nombre = $name;
        }

        function saludar()
        {
            echo "Hola " . $this->nombre;
        }
        function modificar_inventario($id, $cantidad)
        {
            try {
                $conn = new PDO("mysql:host=localhost;dbname=tienda_js", 'root', '12345678');
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "UPDATE funkos SET cantidad = " . $cantidad . " WHERE id = '" . $id . "'";
                // use exec() because no results are returned
                $conn->exec($sql);

                $mensaje = "Exito";
                echo $mensaje;
            } catch (PDOException $e) {
                $mensaje = "Error";
                echo $sql . "<br>" . $e->getMessage();
            }
        }
    }

    $admin1 = new admin($_SESSION['usuario']);
} else {
    echo "Ingrese";
}
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
    <?php
    echo $admin1->saludar();

    ?>
    <form action="./admin.php" method="POST">
        <label for="">Id: </label>
        <input type="text" name="id">
        <label for="">Cantidad: </label>
        <input type="number" name="cant" id="">

        <input type="submit" value="submit" onclick="modificar_inventario()">
    </form>
    <?php
    if ($_POST!=null) {
        $admin1->modificar_inventario($_POST['id'], $_POST['cant']);
    }
    
    ?>
</body>

</html>