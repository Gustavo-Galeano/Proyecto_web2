<?php
require_once 'conexion.php';
session_start();
$query = mysqli_query($db, "select * from carrito c, productos p where c.idproducto=p.id and estado='Confirmado' and idcliente=$_SESSION[id]");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.css">
  <script src="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.js"></script>
  <title>Historial</title>
</head>

<body>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Articulo</th>
        <th scope="col">Estado</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $i = 1;
      while ($row = mysqli_fetch_array($query)) {
      ?>
        <tr class="table-info">
          <th scope="row"><?php echo $i ?></th>
          <td><?php echo $row['descripcion'] ?></td>
          <td><strong style="color: green; text-transform: uppercase;"><?php echo $row['estado'] ?></strong></td>
        </tr>
      <?php
        $i++;
      }
      ?>
    </tbody>
  </table>

</body>

</html>