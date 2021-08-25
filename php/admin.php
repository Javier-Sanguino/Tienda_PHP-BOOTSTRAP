<?php

session_start();
include("./coneccion.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="../css/ejecutar_compra.css"> -->
    <link rel="stylesheet" href="../vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/admin.css">
    <title>Administrador</title>
</head>

<body class="bg-warning">
    <?php
    if (isset($_SESSION['usuario'])) {

        class admin
        {
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
                $sql = "SELECT * FROM funkos WHERE 1";
                foreach ($conx->query($sql) as $fila) {
                    $id[$count] = $fila[0];
                    $nombre[$count] = $fila[1];
                    $descripcion[$count] = $fila[2];
                    $price[$count] = $fila[3];
                    $imagen[$count] = $fila[4];
                    $inventario[$count] = $fila[5];
                    $count++;
                }
                echo "<div class='inventario_container d-flex'>";
                for ($i = 0; $i < $count; $i++) {
                    echo "<div class='inventario_item_box'>";
                    echo "<div class='item_img'><img src='" . $imagen[25] . "' alt='" . $nombre[$i] . "' class='img-fluid rounded'></div>";
                    echo "<h3>Funko " . $nombre[$i] . "</h3>";
                    echo "<h4>Cantidad: <span class='item_cant'>" . $inventario[$i] . "</span></h4>";
                    echo "<input type='hidden' name='cantidad" . $i . "' value='" . $inventario[$i] . "'>";
                    echo "<a href='./eliminar_item.php?funko=" . $id[$i] . "'><i class='fas fa-times'></i></a>";
                    echo "<input type='hidden' name='id" . $i . "' value='" . $id[$i] . "'>";
                    echo "</div>";
                }
                echo "</div>";
            }
            function consulta_compras_completa($conx)
            {
                $count = 0;
                $countx = 0;
                $total = 0;
                $total_abs = 0;
                $sql = "SELECT DISTINCT usuario FROM compras";
                foreach ($conx->query($sql) as $fila) {
                    $nombre[$count] = $fila[0];
                    $count++;
                }
                for ($i = 0; $i < count($nombre); $i++) {
                    $sql = "SELECT * FROM compras WHERE usuario = '" . $nombre[$i] . "'";
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
                            $total += 15.99 * $cantidad[$nombre[$i]][$j];
                        }
                    }
                    $total_abs += $total;
                    echo "<tr>";
                    echo  "<td>Total:</td>";
                    echo  "<td>" . $total . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo  "Total: ";
                echo  "<strong>" . $total_abs . "</strong>";
                //echo $sql;
            }
            function consulta($conx, $url)
            {
                $total = 0;
                $sql = "SELECT * FROM compras WHERE " . $url;
                echo "<table class='table table-hover table-dark'>";
                echo "<thead>";
                echo "<tr>";
                echo "<th>Cliente</th>";
                echo "<th>Funko</th>";
                echo "<th>Cantidad</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                foreach ($conx->query($sql) as $fila) {
                    echo "<tr>";
                    echo  "<td>" . $fila[1] . "</td>";
                    echo  "<td>" . $fila[2] . "</td>";
                    echo  "<td>" . $fila[3] . "</td>";
                    echo "</tr>";
                    $total += 15.99 * $fila[3];
                }
                echo "<tr>";
                echo "<th></th>";
                echo "<th>Total</th>";
                echo  "<th>" . $total . "</th>";
                echo "</body>";
                echo "</table>";
            }
            function menu()
            {
    ?>
                <ul class="nav nav-pills bg-warning">
                    <form action="./admin.php" method="get" class="nav form-inline">
                        <li class="nav-item form-group">
                            <label for="">Nombre:</label>
                            <input type="text" name="usuario" placeholder="Usuario1" class="form-control">
                        </li>
                        <li class="nav-item form-group">
                            <label for="">Id funko:</label>
                            <input type="text" name="id_funko" placeholder="111" class="form-control">
                        </li>
                        <li class="nav-item form-group">
                            <label for="">Fecha</label>
                            <input type="date" name="fecha" class="form-control">
                            <input type="hidden" name="opc" value="compras">

                        </li>
                        <li class="nav-item">
                            <input type="submit" value="Consultar" name="submit" class="btn btn-primary btn-sm">
                        </li>
                    </form>
                </ul>
    <?php
            }
        }
        $admin1 = new admin($_SESSION['usuario']);
        switch ($_GET['opc']) {
            case 'modificar':
                $admin1->modificar_inventario($conn, $_POST['id_funko'], $_POST['cantidad']);
                break;

            case 'inventario':
                $admin1->ver_inventario($conn);
                break;

            case 'compras':
                $admin1->menu();
                if ($_GET['usuario'] != '' || $_GET['id_funko'] != '') {
                    //echo "Aqui va una consulta detallada";
                    if ($_GET['usuario'] != '' && $_GET['id_funko'] == '') {
                        $sql = "usuario LIKE '%" . $_GET['usuario'] . "%'";
                        $admin1->consulta($conn, $sql);
                    } elseif ($_GET['id_funko'] != '' && $_GET['usuario'] == '') {
                        $sql = "id_funko = " . $_GET['id_funko'];
                        $admin1->consulta($conn, $sql);
                    } else {
                        $sql = "usuario LIKE '%" . $_GET['usuario'] . "%' AND id_funko = " . $_GET['id_funko'];
                        $admin1->consulta($conn, $sql);
                    }
                } else {
                    //echo "Aqui va una consulta general";
                    $sql = "1";
                    $admin1->consulta($conn, $sql);
                }
                break;

            default:
                # code...
                break;
        }
    } else {
        echo "Ingrese";
    }
    ?>

</body>

</html>