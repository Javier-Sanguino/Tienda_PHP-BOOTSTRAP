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
    <link rel="stylesheet" href="../css/ejecutar_compra.css">
    <link rel="stylesheet" href="../vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
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
                $sql = "SELECT * FROM funkos where 1";
                foreach ($conx->query($sql) as $fila) {
                    $id[$count] = $fila[0];
                    $nombre[$count] = $fila[1];
                    $descripcion[$count] = $fila[2];
                    $price[$count] = $fila[3];
                    $imagen[$count] = $fila[4];
                    $inventario[$count] = $fila[5];
                    $count++;
                }
                for ($i = 0; $i < $count; $i++) {
                    echo "<div class='item'>";
                    echo "<div class='item_img'><img src='" . $imagen[$i] . "' alt='" . $nombre[$i] . "'></div>";
                    echo "<div class='item_description'>";
                    echo "<h3>Funko " . $nombre[$i] . "</h3>";
                    echo "</div>";
                    echo "<h4>Cantidad: <span class='item_cant'>" . $inventario[$i] . "</span></h4>";
                    echo "<input type='hidden' name='cantidad" . $i . "' value='" . $inventario[$i] . "'>";
                    echo "<div class='btn_exit'>";
                    echo "<a href='./eliminar_item.php?funko=" . $id[$i] . "'><i class='fas fa-times'></i></a>";
                    echo "<input type='hidden' name='id" . $i . "' value='" . $id[$i] . "'>";
                    echo "</div>";
                    echo "</div>";
                }
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
            function consulta_compras_usuario($conx, $url)
            {
                $total = 0;
                echo "<table>";
                echo "<tr>";
                echo "<th>Funkos</th>";
                echo "<th>Cantidad</th>";
                echo "</tr>";
                foreach ($conx->query($url) as $fila) {
                    echo "<tr>";
                    echo  "<td>" . $fila[2] . "</td>";
                    echo  "<td>" . $fila[3] . "</td>";
                    echo "</tr>";
                    $total += 15.99 * $fila[3];
                }
                echo "<tr>";
                echo "<th>Total:</th>";
                echo "<th>" . $total . "</th>";
                echo "</tr>";
                echo "</table>";
            }
            function consulta_compras_funko($conx, $url)
            {
                $total = 0;
                echo "<table>";
                echo "<tr>";
                echo "<th>Cliente</th>";
                echo "<th>Cantidad</th>";
                echo "</tr>";
                foreach ($conx->query($url) as $fila) {
                    echo "<tr>";
                    echo  "<td>" . $fila[1] . "</td>";
                    echo  "<td>" . $fila[3] . "</td>";
                    echo "</tr>";
                    $total += 15.99 * $fila[3];
                }
                echo "<tr>";
                echo "<th>Total:</th>";
                echo "<th>" . $total . "</th>";
                echo "</tr>";
                echo "</table>";
            }
            function menu()
            {
    ?>
                <ul class="nav nav-pills bg-warning">
                    <li class="nav-item">
                        <form action="./admin.php" method="get">
                            <input type="text" name="user" placeholder="Nombre">
                            <input type="hidden" name="opc" value="compras">
                            <input type="hidden" name="op" value="1">
                            <input type="submit" value="Consultar" name="submit" class="btn btn-primary btn-sm">
                        </form>
                    </li>
                    <li class="nav-item">
                        <form action="./admin.php" method="get">
                            <input type="text" name="user" placeholder="Código">
                            <input type="hidden" name="opc" value="compras">
                            <input type="hidden" name="op" value="2">
                            <input type="submit" value="Consultar" name="submit" class="btn btn-primary btn-sm">
                        </form>
                    </li>
                    <li class="nav-item">
                        <form action="./admin.php" method="get">
                            <label for="">Fecha</label>
                            <input type="date" name="fecha">
                            <input type="hidden" name="opc" value="compras">
                            <input type="hidden" name="op" value="4">
                            <input type="submit" value="Consultar" name="submit" class="btn btn-primary btn-sm">
                        </form>
                    </li>
                    <li class="nav-item"><a href="./admin.php?opc=compras&op=4" class="nav-link">Todos</a></li>
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
                //$admin1->compras($conn, 1, 2);
                switch ($_GET['op']) {
                    case 1:
                        $sql = "SELECT * FROM compras WHERE usuario = '" . $_GET['user'] . "'";
                        $admin1->consulta_compras_usuario($conn, $sql);
                        break;
                        case 2:
                            $sql = "SELECT * FROM compras WHERE id_funko = '" . $_GET['user'] . "'";
                        $admin1->consulta_compras_funko($conn, $sql);
                            break;
                    case 4:
                        $admin1->consulta_compras_completa($conn);
                        break;

                    default:
                        # code...
                        break;
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