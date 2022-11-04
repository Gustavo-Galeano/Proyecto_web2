<?php
require_once 'conexion.php';
if ($_POST['tipo'] == "INSERCION") {
    if (empty($_FILES['imagen']['name'])) {
        $dir = "imgart/descarga.jpg";
        $sql = mysqli_query($db, "insert into productos(idcat,descripcion,precio,img,resena)values('$_POST[categoria]','$_POST[descripcion]','$_POST[precio]','$dir','$_POST[resena]')");
        echo "<div class='alert alert-success' role='alert'>Insertado imagen por defecto</div>";

    }else{
    if (($_FILES["imagen"]["type"] == "image/pjpeg")
        || ($_FILES["imagen"]["type"] == "image/jpeg")
        || ($_FILES["imagen"]["type"] == "image/png")
        || ($_FILES["imagen"]["type"] == "image/gif")
    ) {
        if (move_uploaded_file($_FILES["imagen"]["tmp_name"], "../imgart/" . $_FILES['imagen']['name'])) {
            //more code here...
            // echo "images/".$_FILES['imagen']['name'];
            $dir = "imgart/" . $_FILES['imagen']['name'];
            $sql = mysqli_query($db, "insert into productos(idcat,descripcion,precio,img,resena)values('$_POST[categoria]','$_POST[descripcion]','$_POST[precio]','$dir','$_POST[resena]')");
            // echo "Insertado con imagen por seleccion";
            echo "<div class='alert alert-secondary' role='alert'>Insertado con imagen por seleccion</div>";
        } else {
            echo 0;
        }
    } else {
        echo 0;
    }
}
}
if ($_POST['tipo'] == "ACTUALIZACION") {
    if (empty($_FILES['imagen']['name'])) {
        $sql = mysqli_query($db, "update productos set idcat='$_POST[categoria]',descripcion='$_POST[descripcion]',precio='$_POST[precio]',resena='$_POST[resena]' where id = $_POST[pk]");
        echo "Modificado Sin Imagen";
    } else {
        if (($_FILES["imagen"]["type"] == "image/pjpeg")
            || ($_FILES["imagen"]["type"] == "image/jpeg")
            || ($_FILES["imagen"]["type"] == "image/png")
            || ($_FILES["imagen"]["type"] == "image/gif")
        ) {
            if (move_uploaded_file($_FILES["imagen"]["tmp_name"], "../imgart/" . $_FILES['imagen']['name'])) {
                //more code here...
                // echo "images/".$_FILES['imagen']['name'];
                $dir = "imgart/" . $_FILES['imagen']['name'];
                $sql = mysqli_query($db, "update productos set idcat='$_POST[categoria]',descripcion='$_POST[descripcion]',precio='$_POST[precio]',resena='$_POST[resena]', img='$dir' where id = $_POST[pk]");
                echo "Modificado con Imagen";
            } else {
                echo 0;
            }
        } else {
            echo 0;
        }
    }
}

// if ($_GET['tipo'] == "ELIMNAR") {

//     $dato = mysqli_query($db, "delete from productos where id=$_GET[id]");
//     if ($dato) {
//         echo 1;
//     }
// }

