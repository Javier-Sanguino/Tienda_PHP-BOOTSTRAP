<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../vendor/twbs/bootstrap/dist/css/bootstrap.min.css">

    <title>Datos recibidos</title>
</head>

<body>
    <?php
    //var_dump($_POST);
    class Catcher
    {

        function show_table($str)
        {
            $opc = 1;
            $lines = explode("\n", $str);

            for ($i = 0; $i < count($lines); $i++) {
                $colums = explode("\t", $lines[$i]);
                echo "<tr>";
                for ($j = 0; $j < count($colums); $j++) {
                    echo "<td>" . $colums[$j] . "</td>";
                    echo "<input type='hidden' name='id_client" . $i . "' value='" . $colums[0] . "'>";
                    echo "<input type='hidden' name='nombre" . $i . "' value='" . $colums[1] . "'>";
                    echo "<input type='hidden' name='apellido" . $i . "' value='" . $colums[2] . "'>";
                }
                echo "</tr>";
            }
            return $opc;
        }
    }

    $carga1 = new Catcher();

    // if ($carga1->show_table($str) == 1) {
    //     echo "Enviado";
    // }
    ?>
    <h2 class="display-4">Datos recibidos:</h2>
    <div class="col-sm-8 mx-auto mt-4">
        <table class="table table-hover table-active">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                </tr>
            </thead>
            <tbody>
                <form action="./catch.php" method="post">
                    <?php
                    $str = $_POST['datos'];
                    $carga1->show_table($str);
                    ?>
                    <input type="submit" value="Guardar" class="btn btn-outline-secondary my-3">
                </form>
            </tbody>
        </table>

    </div>
</body>

</html>