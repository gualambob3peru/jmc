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

    $(".imagen").click(function() {
        $("#modalImagen").modal();
        let id = $(this).attr("idVehiculo");
        let nombreFoto = $(this).attr("nombreFoto");
        $("#miFoto").attr("src","static/images/vehiculos/"+id+"/"+nombreFoto);

    });

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
                <a href="admin/<?php echo $controller ?>/agregar" class="btn btn-outline-info" data-toggle="tooltip" data-placement="top" title="Agregar Vehiculos"> <i
                        class="fas fa-plus"></i></a>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">

                <table class="table" id="miTabla">
                    <thead>
                        <tr>
                            <th>Placa</th>
                            <th>Cliente</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Año</th>
                            <th>Motor</th>
                            <th>Serie</th>
                            <th>Foto</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach($model as $key=>$value): ?>
                        <tr>
                            <td><?php echo $value->placa ?></td>
                            <td><?php echo $value->nombresCompletos ?></td>
                            <td><?php echo $value->descripcion_marcas ?></td>
                            <td><?php echo $value->descripcion_modelos ?></td>
                            <td><?php echo $value->anio ?></td>
                            <td><?php echo $value->motor ?></td>
                            <td><?php echo $value->serie ?></td>
                            <td><img class="imagen" nombreFoto="<?php echo $value->imagen ?>" idVehiculo="<?php echo $value->id ?>" style="width:100px;cursor:pointer"
                                    src="static/images/vehiculos/<?php echo $value->id ?>/<?php echo $value->imagen ?>">
                            </td>
                            <td>
                                <div class="input-group">
                                    <div class="input-group-prepend" id="button-addon3">
                                        <a href="admin/<?php echo $controller ?>/editar/<?php echo $value->id ?>"
                                            class="btn btn-outline-info" data-toggle="tooltip" data-placement="top" title="Editar"><i class="far fa-edit"></i></a>
                                        <button id="<?php echo $value->id ?>" class="btn btn-outline-danger btnEliminar" data-toggle="tooltip" data-placement="top" title="Eliminar"><i
                                                class="far fa-trash-alt"></i></button>
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


<div class="modal" tabindex="-1" role="dialog" id="modalImagen">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Foto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <img class="img-fluid" id="miFoto" src="" alt="">
            </div>

        </div>
    </div>
</div>