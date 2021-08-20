<?php

session_start();
include("./coneccion.php");

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
        function modificar_inventario($conx, $id, $cantidad)
        {
            try {
                $sql = "UPDATE funkos SET cantidad = " . $cantidad . " WHERE id = '" . $id . "'";
                // use exec() because no results are returned
                $conx->exec($sql);
                $mensaje = "Exito";
                echo $mensaje;
            } catch (PDOException $e) {
                $mensaje = "Error";
                echo $sql . "<br>" . $e->getMessage();
            }
            header("Location: ../links/administrador.php");
            return $mensaje;
        }

        function ver_inventario($conx)
        {
            $count = 0;
            $sql = "SELECT * FROM funkos where 1";
            foreach ($conx->query($sql) as $fila) {
                $id[$count] = $fila[0];
                $nombre[$count] = $fila[1];
                $descripcion[$count] = $fila[2];
                $price[$count] = $fila[3];
                $inventario[$count] = $fila[5];
                $count++;
            }
            for ($i = 0; $i < $count; $i++) {
                echo "ID: " . $id[$i];
                echo "<br>";
                echo "funko " . $nombre[$i];
                echo "<br>";
                echo "$ " . $price[$i];
                echo "<br>";
                echo "Cantidad: " . $inventario[$i];
                echo "<br>";
                echo "<br>";
                echo "<br>";
            }
        }
        function compras($conx)
        {
            $count = 0;
            $countx = 0;
            $sql = "SELECT DISTINCT usuario FROM compras";
            foreach ($conx->query($sql) as $fila) {
                $nombre[$count] = $fila[0];
                $count++;
            }
            for ($i = 0; $i < count($nombre); $i++) {
                $sql = "SELECT * FROM compras where usuario = '" . $nombre[$i] . "'";
                foreach ($conx->query($sql) as $fila) {
                    $funko[$nombre[$i]][$countx] = $fila[2];
                    $cantidad[$nombre[$i]][$countx] = $fila[3];
                    $countx++;
                }
            }
            echo "<table>";
            for ($i = 0; $i < count($nombre); $i++) {
                echo "<tr>";
                echo "<th>Cliente: " . $nombre[$i] . "</th>";
                echo "</tr>";
                echo "<tr>";
                echo "<th>Funkos</th>";
                echo "<th>Cantidades</th>";
                echo "</tr>";

                for ($j = 0; $j < $countx; $j++) {
                    if ($funko[$nombre[$i]][$j] != '') {
                        echo "<tr>";
                        echo  "<td>" . $funko[$nombre[$i]][$j] . "</td>";
                        echo  "<td>" . $cantidad[$nombre[$i]][$j] . "</td>";
                        echo "</tr>";
                    }
                }
            }
            echo "</table>";
        }
    }
    $admin1 = new admin($_SESSION['usuario']);
    switch ($_POST['opc']) {
        case 'modificar':
            $admin1->modificar_inventario($conn, $_POST['id_funko'], $_POST['cantidad']);
            break;
        case 'inventario':
            $admin1->ver_inventario($conn);
            break;

        case 'compras':
            $admin1->compras($conn);
            break;
        default:
            # code...
            break;
    }
} else {
    echo "Ingrese";
}
?>


<!-- <!DOCTYPE html>
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
    // if ($_POST != null) {
    //     $admin1->modificar_inventario($_POST['id'], $_POST['cant']);
    // }

    ?>
</body>

</html> -->