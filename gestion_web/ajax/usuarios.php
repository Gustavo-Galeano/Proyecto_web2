<?php

require_once 'conexion.php';

if ($_GET['tipo'] == "INSERTAR") {
    /* Inserting the data into the database. */
    $dato = mysqli_query($db, "insert into usuarios(nombre, apellido, usuario, password)
    values( '$_GET[nombre]', '$_GET[apellido]', '$_GET[usuario]', '$_GET[password]') ");

    if ($dato) {
        $var[] = "<div class='alert alert-success' role='alert'> Insercion exitosa </div>";
        $var[] = 1;
        echo $Json = json_encode($var);
    } else {
        $var[] = "<div class='alert alert-danger' role='alert'> Fallo en la insercion </div>";
        $var[] = 0;
        echo $Json = json_encode($var);
    }
}

if ($_POST['tipo'] == "ACTUALIZACION") {

    $dato = mysqli_query($db, "update usuarios set nombre='$_POST[nombre_usuario]' apellido='$_POST[apellido_usuario]' usuario='$_POST[usuario_usuario]' 
    password='$_POST[password_usuario]'  where id=$_POST[pk]");

    if ($dato) {
        $var[] = "<div class='alert alert-success' role='alert'> Actualizacion exitosa exitosa </div>";
        $var[] = 1;
        echo $Json = json_encode($var);
    } else {
        $var[] = "<div class='alert alert-danger' role='alert'> Fallo en la actualizacion </div>";
        $var[] = 0;
        echo $Json = json_encode($var);
    }
}


if ($_GET['tipo'] == "ELIMNAR") {

    $dato = mysqli_query($db, "delete from usuarios where id=$_GET[id]");
    if ($dato) {
        echo 1;
    }
}
