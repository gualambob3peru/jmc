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

    var table = $('#miTabla').DataTable({
        language : {
            url : "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
        },
        "order": [],
        "paging":   false
    });

    $('#fechaInicio, #fechaFin').change( function() {
        table.draw();
    } );

    $.fn.dataTable.ext.search.push(
        function( settings, data, dataIndex ) {
            var min = $("#fechaInicio").val();
            var max = $("#fechaFin").val()+" 23:59:59";
          
            var columnaFecha = data[0];
            columnaFecha = columnaFecha.split('/');
            columnaFecha = columnaFecha[2]+"-"+columnaFecha[1]+"-"+columnaFecha[0]  
            console.log(columnaFecha);
            if(columnaFecha > min && columnaFecha <max){
                
                return true;
            }
            return false;
        }
    );
});
</script>

<br>
<?php 
    $fecha_actual = date("Y-m-d");
    $fecha_actual = date("Y-m-d",strtotime($fecha_actual."+ 1 days")); 

?>

<div class="card">
    <h5 class="card-header">Registros de Vehículos</h5>
    <div class="card-body">
        <!-- <h5 class="card-title">Special title treatment</h5> -->

        <div class="row mb-3">
            <div class="col-md-12">
                <a href="admin/<?php echo $controller ?>/agregar" class="btn btn-lg btn-outline-info"> <i
                        class="fas fa-plus"></i></a>
            </div>
        </div>
        
        <div class="row mb-3">
            <div class="col-auto">
                <span>Fecha Inicio</span>
                <input type="date" class="form-control" id="fechaInicio">
            </div>
            <div class="col-auto">
                <span>Fecha Fin</span>
                <input type="date" class="form-control" id="fechaFin" value="<?php echo $fecha_actual ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">

                <table class="table" id="miTabla">
                    <thead>
                        <tr>
                            <th>Fecha de Servicio</th>
                            <th>Vehículo</th>
                            <th>Cliente</th>
                            <th>Total Servicio</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach($model as $key=>$value): ?>
                        <tr>
                            <td><?php 
                            $originalDate = substr($value->fechaServicio,0,10);
                            $newDate = date("d/m/Y", strtotime($originalDate));

                            echo substr($newDate,0,10) 
                            
                            ?></td>
                            <td><?php echo $value->placa ?></td>
                            <td><?php echo $value->nombresClientes ?></td>
                            <td><?php echo $value->montoTotal ?></td>
                            <td>
                                <div class="input-group">
                                    <div class="input-group-prepend" id="button-addon3">
                                        <a href="admin/<?php echo $controller ?>/editar/<?php echo $value->id ?>"
                                            class="btn btn-outline-info" data-toggle="tooltip" data-placement="top" title="Editar"><i class="far fa-edit"></i></a>
                                        <button id="<?php echo $value->id ?>" class="btn btn-outline-success BtnCorreo"><i class="far fa-envelope" data-toggle="tooltip" data-placement="top" title="Email"></i></button>
                                        <button id="<?php echo $value->id ?>" class="btn btn-outline-danger btnEliminar"><i
                                                class="far fa-trash-alt" data-toggle="tooltip" data-placement="top" title="Eliminar"></i></button>
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