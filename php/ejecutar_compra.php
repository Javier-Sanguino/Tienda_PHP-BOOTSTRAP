<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/ejecutar_compra.css">
    <link rel="stylesheet" href="../fonts/css/all.css">
    <link rel="shortcut icon" href="../img/PopLogo.png" type="image/x-icon">
    <title>Pagar</title>
</head>

<body>
    <?php
    $count_funkos = 0;
    $count = 0;

    include('./coneccion.php');

    if (!isset($_SESSION['usuario'])) {
        echo "Por favor inicie sesion primero: ";
        echo "<a href='../links/sesion.html'>Inicio sesion</a>";
    } else {
        $id_user = $_SESSION['usuario'];
        for ($i = 0; $i < $_POST['cont']; $i++) {
            if ($_POST[$i] != '') { //Solo se ejecuta cuando POST tiene algun valor
                $sql = "SELECT * FROM carrito where usuario = '" . $id_user . "' AND id_funko = " . $_POST[$i]; //Url para buscar el Id si existe en la tabla
                foreach ($conn->query($sql) as $fila) {
                    $id_temporal = $fila[1];            //Se guarda el Id encontrado en la taba en una variable temporal
                    $cantidad_temporal = $fila[2];      //Se trae la cantidad de la tabla en una variable temporal
                }
                if ($id_temporal == $_POST[$i]) {       //Se valida si el Id existe en la tabla
                    $cantidadASubir = $cantidad_temporal + $_POST['cant' . $i];
                    try {       //Se insertan en la tabla carrito los nuevos valores
                        $sql = "UPDATE carrito SET cantidad = " . $cantidadASubir . " WHERE usuario = '" . $id_user . "' AND id_funko = '" . $_POST[$i] . "'";
                        // use exec() because no results are returned
                        $conn->exec($sql);
                        $mensaje = "Registro creado satisfactoriamente";
                    } catch (PDOException $e) {
                        $mensaje = "Error";
                        echo $sql . "<br>" . $e->getMessage();
                    }
                } else {        //En el caso que no exista el Id en la tabla
                    try {       //Se insertan en la tabla carrito los nuevos valores
                        $sql = "INSERT INTO carrito (usuario, id_funko,	cantidad)
                        VALUES ('" . $id_user . "',
                            '" . $_POST[$i] . "'," .
                            "'" . $_POST['cant' . $i] . "')";
                        // use exec() because no results are returned
                        $conn->exec($sql);
                        $mensaje = "Registro creado satisfactoriamente";
                    } catch (PDOException $e) {
                        $mensaje = "Error";
                        echo $sql . "<br>" . $e->getMessage();
                    }
                }
            }
        }
        $sql = "SELECT * FROM carrito where usuario = '" . $id_user . "'";
        foreach ($conn->query($sql) as $fila) {
            $funko_agregados[$count_funkos] = $fila[1];
            $cantidad_funkos[$count_funkos] = $fila[2];
            $count_funkos++;
        }
        for ($i = 0; $i < count($funko_agregados); $i++) {
            $sql = "SELECT * FROM funkos where id ='" . $funko_agregados[$i] . "'";
            foreach ($conn->query($sql) as $fila) {
                $id[$count] = $fila[0];
                $nombre[$count] = $fila[1];
                $descripcion[$count] = $fila[2];
                $price = $fila[3];
                $imagen[$count] = $fila[4];
                $cantidad[$count] = $cantidad_funkos[$count];
                $count++;
                $total = $total + $price * $cantidad[$count - 1];
            }
        }

    ?>
        <h1>Elementos seleccionados</h1>
        <section class="item_contenedor">
            <form action="../php/pagar.php" method="POST">
            <?php
            for ($i = 0; $i < $count; $i++) {
                echo "<div class='item'>";
                echo "<div class='item_img'><img src='" . $imagen[$i] . "' alt='" . $nombre[$i] . "'></div>";
                echo "<div class='item_description'>";
                echo "<h3>funko " . $nombre[$i] . "</h3>";
                //echo "<p>" . $descripcion[$i] . "</p>";
                echo "</div>";
                echo "<h4>Cantidad: <span class='item_cant'>" . $cantidad[$i] . "</span></h4>";
                echo "<input type='hidden' name='cantidad".$i."' value='" . $cantidad[$i] . "'>";
                echo "<h4>Precio: <span class='item_price'>$ " . $price . "</span></h4>";
                echo "<div class='btn_exit'>";
                echo "<a href='./eliminar_item.php?funko=" . $id[$i] . "'><i class='fas fa-times'></i></a>";
                echo "<input type='hidden' name='id".$i."' value='" . $id[$i] . "'>";
                echo "</div>";
                echo "</div>";
            }
            echo "<input type='hidden' name='contador' value='" . $count . "'>";
            echo "<input type='hidden' name='valor' value='" . $total . "'>";
            //echo "<input type='submit' name='submit' value='Pagar' class='btn_back'>";
            echo "<button class='btn_back' type='submit' name='submit'>Pagar</button>";

            ?>
            <div class="total">
                <h2>TOTAL: $<?php echo $total; ?></h2>
            </div>
            <button class="btn_back"><a href="../links/compra.php"><i class="fas fa-arrow-left"></i>Volver</a></button>
            <!-- <button class="btn_back"><a href="../php/pagar.php?cantidad=<?php echo $count;?>&id"><i class="fas fa-arrow-left"></i>Pagar</a></button> -->
            <!--  -->
            </form>
        </section>
</body>
<?php

    }

?>

</html>