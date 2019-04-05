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
});
</script>

<br>

<div class="card">
    <h5 class="card-header">Compras</h5>
    <div class="card-body">
        <!-- <h5 class="card-title">Special title treatment</h5> -->

        <div class="row">
            <div class="col-md-12">
                <a href="admin/<?php echo $controller ?>/agregar" class="btn btn-outline-info"> <i class="fas fa-plus"></i> Agregar <?php echo ucwords($controller) ?></a>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">

                <table class="table">
                    <tr>
                        <th>Fecha</th>
                        <th>RUC</th>
                        <th>Razon Social</th>
                        <th>Cantidad</th>
                        <th>Costo</th>
                        <th></th>
                    </tr>

                    <?php foreach($model as $key=>$value): ?>
                    <tr>
                        <td><?php echo $value->fechaCompras ?></td>
                        <td><?php echo $value->ruc ?></td>
                        <td><?php echo $value->razonSocial ?></td>
                        <td><?php echo $value->cantidad ?></td>
                        <td><?php echo $value->costo ?></td>
                        <td>
                            <div class="input-group">
                                <div class="input-group-prepend" id="button-addon3">
                                    <!-- <a href="admin/<?php echo $controller ?>/editar/<?php echo $value->id ?>"
                                        class="btn btn-outline-info"><i class="far fa-edit"></i> Editar</a> -->
                                    <button id="<?php echo $value->id ?>" class="btn btn-outline-danger btnEliminar"><i class="fas fa-minus-circle"></i>
                                        Anular</button>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>

    </div>

</div>


<div elId="" class="modal" tabindex="-1" role="dialog" id="modalEliminar">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Anulación de Compra</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>¿Desea anular?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-outline-success" id="btnAceptar">Aceptar</button>
            </div>
        </div>
    </div>
</div>