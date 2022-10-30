<?php
session_start();
if(empty($_SESSION['nombre'])){
echo "<script>alert('no tiene permisos'); location.href='index.html'</script>";
echo 0;
}else{
    echo 1;
}
?>