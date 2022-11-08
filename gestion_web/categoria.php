<?php
require_once 'header.php';
require_once 'conexion.php';
?>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#categoriaModal" id="add">
    Nueva Categoria
</button>


<table class="table table-striped ml-1">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Descripción</th>
            <th scope="col">Acción</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = mysqli_query($db, "select * from categorias");
        $i = 1;
        while ($row = mysqli_fetch_array($sql)) {
        ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $row['descripcion']; ?></td>
                <td>
                    <button type="submit"  data-toggle="modal" data-target="#categoriaModal"
                        class="btn btn-success"
                        onclick="relleno('<?php echo $row['id']; ?>','<?php echo $row['descripcion']; ?>')" >
                        Editar
                    </button>

                    <button type="submit" class="btn btn-danger" 
                        onclick="eliminar(<?php echo $row['id']; ?>)">
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

<!-- Modal -->
<div class="modal fade" id="categoriaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear Categoria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Descripcion</label>
                        <input type="hidden" class="form-control" id="tipo">
                        <input type="hidden" class="form-control" id="pk">
                        <input type="text" class="form-control" id="descripcion" placeholder="Categoria descripcion">
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

<script src="js/categorias.js"></script>
<?php
require_once 'footer.php';
?>


<!-- 
<div class="modal fade" id="categoriaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Categorias</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Descripcion</label>
                        <input type="hidden" class="form-control" id="tipo">
                        <input type="hidden" class="form-control" id="pk">
                        <input type="text" class="form-control" id="descripcion" placeholder="Categoria descripcion">
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="boton">Enviar Datos</button>
            </div>
            <div id="mensaje"></div>
        </div>
    </div>
</div> -->
