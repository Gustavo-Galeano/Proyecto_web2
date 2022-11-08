<?php
require_once 'conexion.php';

if ($_GET['tipo'] == "INSERCION") {

    $dato = mysqli_query($db, "insert into categorias(descripcion)values('$_GET[descripcion]')");
    if ($dato) {
        $var[] = "<div class='alert alert-success' role='alert'> Insercion exitosa </div>";
        $var[] = 1;
        echo $Json = json_encode($var);
    } else {
        $var[] = "<div class='alert alert-danger' role='alert'> Error ar insertar datos </div>";
        $var[] = 0;
        echo $Json = json_encode($var);
    }
}


if ($_GET['tipo'] == "ACTUALIZACION") {

    $dato = mysqli_query($db, "update categorias set descripcion='$_GET[descripcion]' where id=$_GET[id]");
    if ($dato) {
        $var[] = "<div class='alert alert-success' role='alert'> Actualizacion exitosa </div>";
        $var[] = 1;
        echo $Json = json_encode($var);
    } else {
        $var[] = "<div class='alert alert-danger' role='alert'> Fallo en la actualizacion </div>";
        $var[] = 0;
        echo $Json = json_encode($var);
    }
}



if ($_GET['tipo'] == "ELIMNAR") {

    $dato = mysqli_query($db, "delete from categorias where id=$_GET[id]");
    if ($dato) {
        echo 1;
    }
}
