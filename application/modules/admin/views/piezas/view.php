<script>
$(function() {
    let controller = "<?php echo $controller ?>";
    $(".btnEliminar").click(function() {
        let id = $(this).attr("id");
        $("#modalEliminar").attr("elId",id);
        $("#modalEliminar").modal();
    });

    $("#btnAceptar").click(function(){
        window.location = "admin/"+controller+"/eliminar/"+$("#modalEliminar").attr("elId");
    });

    $('#miTable').DataTable( {
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "No se encontro",
            "info": "Mostrando pagina _PAGE_ de _PAGES_",
            "infoEmpty": "No se encontraron",
            "infoFiltered": "(Buscando de _MAX_ total registros)"
        }
    } );

    $(".miImagen").click(function(){
        $(".modalImagen").modal();
        $(".imagenGrande").attr("src",$(this).attr("src"));
    });
});
</script>

<style>
    .modal-body{
        text-align:center;
    }
    .miImagen{
        cursor:pointer;
    }
</style>

<br>

<div class="card">
    <h5 class="card-header">Repuestos</h5>
    <div class="card-body">
        <!-- <h5 class="card-title">Special title treatment</h5> -->

        <div class="row">
            <div class="col-md-12">
                <a href="admin/<?php echo $controller ?>/agregar" class="btn btn-outline-info" data-toggle="tooltip" data-placement="top" title="Repuestos"> <i class="fas fa-plus"></i></a>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">

                <table class="table" id="miTable">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Descripción</th>
                            <th>Precio Venta</th>
                            <th>Precio Costo</th>
                            <th>Stock</th>
                            <th>Imagen</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                    
                        <?php foreach($model as $key=>$value): ?>
                        <tr>
                            <td><?php echo $value->codigo ?></td>
                            <td><?php echo $value->descripcion ?></td>
                            <td><?php echo $value->costo ?></td>
                            <td><?php echo $value->precioCosto ?></td>
                            <td><?php echo $value->stock ?></td>
                            <td><img class="miImagen" style="max-width:100px;max-height:100px" src="static/images/repuestos/<?php echo $value->id ?>/<?php echo $value->imagen ?>" onError='this.onerror=null;this.src="static/images/image-not-found.png";' alt=""></td>
                            <td>
                                <div class="input-group">
                                    <div class="input-group-prepend" id="button-addon3">
                                        <a href="admin/<?php echo $controller ?>/editar/<?php echo $value->id ?>"
                                            class="btn btn-outline-info" data-toggle="tooltip" data-placement="top" title="Editar"><i class="far fa-edit"></i></a>
                                        <button id="<?php echo $value->id ?>" class="btn btn-outline-danger btnEliminar" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="far fa-trash-alt"></i></button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</div>


<div elId="" class="modal" tabindex="-1" role="dialog" id="modalEliminar">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Eliminación de <?php echo ucwords($controller) ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>¿Desea eliminar?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-outline-success" id="btnAceptar">Aceptar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal modalImagen" tabindex="-1" role="dialog" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Imagen de repuesto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" >
                <img src="" alt="" class="imagenGrande img-fluid" >
            </div>
        </div>
    </div>
</div>