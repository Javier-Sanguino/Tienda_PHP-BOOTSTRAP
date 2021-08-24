<?php
//For que se ejecuta el numero de items seleccionados y 
//trae de la base de datos los datos de los Ids seleccionados
for ($i = 0; $i < $_POST['cont']; $i++) {
    if ($_POST[$i] != '') {
        $sql = "SELECT * FROM funkos where id ='" . $_POST[$i] . "'";
        foreach ($conn->query($sql) as $fila) {
            $id[$count] = $fila[0];
            $nombre[$count] = $fila[1];
            $descripcion[$count] = $fila[2];
            $price = $fila[3];
            $imagen[$count] = $fila[4];
            $cantidad[$count] = $_POST['cant' . $i];
            $count++;
            $total = $total + $price * $cantidad[$count - 1];
        }
    }
}

//Codigo para agregar registros en la tabla carrito

try {
    $sql = "INSERT INTO carrito (id_funko,	cantidad)
    VALUES ('" . $id[$count] . "'," .
        "'" . $cantidad[$count] . "')";
    // use exec() because no results are returned
    $conn->exec($sql);
    $mensaje = "Registro creado satisfactoriamente";
} catch (PDOException $e) {
    $mensaje = "Error";
    echo $sql . "<br>" . $e->getMessage();
}

//Codigo para modificar valores en la tabla carrito

try {
    $sql = "UPDATE carrito SET cantidad='" . $cantidad[$count] . "' WHERE id='" . $id_funko[$count] . "'";
    $conn->exec($sql);
    $mensaje = "Registro creado satisfactoriamente";
} catch (PDOException $e) {
    $mensaje = "Error";
    echo $sql . "<br>" . $e->getMessage();
}

//SQL para modificar un valor con 2 condiciones

$sql = "UPDATE carrito SET id_funko = 4, cantidad = 4 WHERE id_funko = 3 AND cantidad = 3";


$sql = "SELECT * FROM carrito where usuario = '" . $id_user . "' AND id_funko = " . $_POST[$i]; //Url para buscar el Id si existe en la tabla
foreach ($conn->query($sql) as $fila) {
    $id_temporal = $fila[1];            //Se guarda el Id encontrado en la taba en una variable temporal
    $cantidad_temporal = $fila[2];      //Se trae la cantidad de la tabla en una variable temporal
}

if ($id_temporal == $_POST[$i]) {       //Se valida si el Id existe en la tabla
    $funko_agregados[$count_funko] = $_POST[$i];        //Se guarda el Id en el arreglo de Ids para impresion
    $cantidad[$count_funko] = $cantidad_temporal + $_POST['cant' . $i];     //Se guarda en el arreglo de posciciones la cantidad de 
    //la tabla y la nueva digitada por el usuario
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
    $funko_agregados[$count_funko] = $_POST[$i];        //Se agrega el Id al arreglo
    $cantidad[$count_funko] = $_POST['cant' . $i];      // Se agrega al arreglo de cantidades la cantidad digitada unicamente
}