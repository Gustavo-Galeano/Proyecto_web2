<?php
require_once 'header.php';
require_once 'conexion.php';
?>

<table class="table table-striped ml-1">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Producto</th>
      <th scope="col">Precio</th>
      <th scope="col">Estado</th>
    </tr>
  </thead>
  <tbody>
    <?php
    /*select * from carrito c, productos p where c.idproducto=p.id and estado='Pendiente' and idcliente=$_SESSION[id] */
    //$sql = mysqli_query($db, "select * from carrito where estado='Confirmado' ");
    $sql = mysqli_query($db, "select * from carrito c, productos p where c.idproducto=p.id and estado='Facturado'");
    $i = 1;
    while ($row = mysqli_fetch_array($sql)) {
    ?>
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $row['descripcion'] ?></td>
        <td><?php echo $row['precio']; ?></td>
        <td><?php echo $row['estado']; ?></td>
      </tr>
    <?php
      $i++;
    }
    ?>
  </tbody>
</table>
<!--  -->

<?php
require_once 'footer.php';
?>