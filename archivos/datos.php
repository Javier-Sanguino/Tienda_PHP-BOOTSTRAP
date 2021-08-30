<?php
// comprobar si tenemos los parametros w1 y w2 en la URL
if (isset($_POST["inputx"])) {
    // asignar w1 y w2 a dos variables
    $phpVar1 = $_POST["inputx"];
    //$phpVar2 = $_POST["input2"];
    // mostrar $phpVar1 y $phpVar2
    echo "<p>Parameters: " . $phpVar1 . "</p>";
    //echo "<p>Parameters: " . $phpVar2 . "</p>";
} else {
    echo "<p>No parameters</p>";
}

    //header('Location: ./API.php');
