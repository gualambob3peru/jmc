<script>
$(function() {
    let controller = "<?php echo $controller ?>";
    $(".btnEliminar").click(function() {
        let id = $(this).attr("id");
        $("#modalEliminar").attr("elId", id);
        $("#modalEliminar").modal();
    });

    $("#btnAceptar").click(function() {
        window.location = "admin/" + controller + "/eliminar/" + $("#modalEliminar").attr("elId");
    });

    $('[data-toggle="tooltip"]').tooltip();

    $('#miTabla').DataTable({
        language : {
            url : "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
        },
        "order": []
    });
   
});
</script>

<br>

<div class="card">
    <h5 class="card-header"><?php echo ucwords($controller) ?></h5>
    <div class="card-body">
        <!-- <h5 class="card-title">Special title treatment</h5> -->

        <div class="row">
            <div class="col-md-12">
                <a href="admin/<?php echo $controller ?>/agregar" class="btn btn-outline-info" data-toggle="tooltip" data-placement="top" title="Agregar Clientes"> <i
                        class="fas fa-plus"></i></a>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">

                <table class="table" id="miTabla">
                    <thead>
                        <tr>
                            <th>Nombres</th>
                            <th>Documento</th>
                            <th>Número</th>
                            <th>Dirección</th>
                            <th>Correo</th>
                            <th>Saldo</th>
                            <th>Acción</th>
                        </tr>
                    </thead>

                    <tbody>
                    
                        <?php foreach($model as $key=>$value): ?>
                        <tr>
                            <td><?php echo $value->nombresCompletos ?></td>
                            <td><?php echo $value->descripcion_tipoDocumentos ?></td>
                            <td><?php echo $value->documento ?></td>
                            <td><?php echo $value->direccion ?></td>
                            <td><?php echo $value->correo ?></td>
                            <td><?php echo $value->saldo ?></td>
                            <td>
                                <div class="input-group">
                                    <div class="input-group-prepend" id="button-addon3">
                                        <a href="admin/<?php echo $controller ?>/editar/<?php echo $value->id ?>" class="btn btn-outline-info" data-toggle="tooltip" data-placement="top" title="Editar"><i class="far fa-edit"></i></a>
                                        <a href="admin/<?php echo $controller ?>/pagos/<?php echo $value->id ?>" class="btn btn-outline-success" data-toggle="tooltip" data-placement="top" title="Pagos"><i class="far fa-edit"></i></a>
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