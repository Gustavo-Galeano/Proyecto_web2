<?php
require_once 'header.php';
require_once 'conexion.php';
?>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#productoModal" id="add">
    Nuevo Producto
</button>


<table class="table table-striped ml-1">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Imagen</th>
            <th scope="col">Categoria</th>
            <th scope="col">Producto</th>
            <th scope="col">Reseña</th>
            <th scope="col">Precio</th>
            <th scope="col">Acción</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = mysqli_query($db, "select p.img, c.descripcion as categoria, p.descripcion as producto, p.resena, p.precio, p.id as cod, c.id as cat from productos p, categorias c where p.idcat= c.id ");
        $i = 1;
        while ($row = mysqli_fetch_array($sql)) {
        ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><img src="<?php echo $row['img']; ?>" alt="" width="100%" height="70px"></td>
                <td width="5%"><?php echo $row['categoria']; ?></td>
                <td><?php echo $row['producto']; ?></td>
                <td><?php echo $row['resena']; ?></td>
                <td><?php echo number_format($row['precio'], 0, ',', '.'); ?></td>
                <td>
                    <button type="submit" class="btn btn-success" data-toggle="modal" data-target="#productoModal" 
                    onclick="relleno('<?php echo $row['cod'] ?>','<?php echo $row['cat'] ?>','<?php echo $row['producto'] ?>','<?php echo $row['precio'] ?>','<?php echo $row['resena'] ?>')">
                        Editar
                    </button>
                    <!-- <a href="#" title="Borrar"> <i class='fas fa-trash' style='font-size:12px;color:red'></i></a> -->
                    <button type="submit" class="btn btn-danger" onclick="eliminar(<?php echo $row['cod']; ?>)">
                        Eliminar
                    </button>
                </td>
            </tr>
        <?php
            $i++;
        }
        ?>
    </tbody>
</table>
</table>

<!-- Modal -->
<div class="modal fade" id="productoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cargar Producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formPr" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="exampleInputEmail1">Categoria</label>
                        <input type="hidden" class="form-control" id="tipo" name="tipo">
                        <input type="hidden" class="form-control" id="pk" name="pk">
                        <select name="categoria" id="categoria" class="form-control">
                            <option value="">Seleccionar</option>
                            <?php
                            $sql = mysqli_query($db, "select * from categorias");
                            $i = 1;
                            while ($row = mysqli_fetch_array($sql)) {
                            ?>
                                <option value="<?php echo $row['id'] ?>"><?php echo $row['descripcion'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Descripción</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Ingresar la descripcion para el producto">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Precio</label>
                        <input type="number" class="form-control" id="precio" name="precio" placeholder="Ingresar el precio para el producto">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Imagen</label>
                        <input type="file" class="form-control" id="imagen" name="imagen" placeholder="Ingresar la descripcion para la categoria">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Reseña</label>
                        <textarea name="resena" id="resena" cols="10" rows="5" placeholder="Alguna reseña para el producto" class="form-control"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="boton">Guardar</button>
            </div>
            <div id="mensaje"></div>
        </div>
    </div>
</div>


<script src="js/productos.js"></script>
<?php
require_once 'footer.php';
?>