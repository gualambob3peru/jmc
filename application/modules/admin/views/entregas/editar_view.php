<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$(function() {
    let vehiculos = <?php echo json_encode($vehiculos) ?>;
    vehiculos = $.map(vehiculos, function(item) {
        return {
            label: item
                .placa, // Set the display lebel for the searched list of company names which we're getting from server side coding.
            value: item.id // Set the raw value of each shown items.
        }
    })

    $("#autoVehiculo").autocomplete({
        source: vehiculos,
        select: function(event, ui) {
            $("#autoVehiculo").val(ui.item.label)
            $("#idVehiculos").val(ui.item.value)
            return false;
        }
    })

    $("#cargarPlaca").click(function() {
        $.ajax({
            url: "admin/vehiculos/ajax_cargar_vehiculo/" + $("#autoVehiculo").val(),
            type: "post",
            dataType: "json",
            success: function(response) {
                console.log(response);
                let vehiculo = response.respuesta;

                $("#ajax_cliente").text(vehiculo.nombresCompletos);
                $("#ajax_marca").text(vehiculo.descripcion_marcas);
                $("#ajax_modelo").text(vehiculo.descripcion_modelos);
                $("#ajax_placa").text(vehiculo.placa);
                $("#ajax_anio").text(vehiculo.anio);

            }
        })
    });

    $("#btnAddServicio").click(function() {
        $("#modalAddServicio").modal();
    });



    // $("#saveService").click(function() {
    //     $("#modalAddServicio").modal("hide");
    //     let idPersonas = $("#idPersonas").val();
    //     idServicios = $("#idServicios").val(),
    //         observacionesServicio = $("#observacionesServicio").val(),
    //         monto = $("#monto").val(),
    //         persona = $("#idPersonas").find(":selected").text(),
    //         servicio = $("#idServicios").find(":selected").text();


    //     let tr = '<tr><td>   <input type="hidden" name="idPersonas[]" value="' + idPersonas +
    //         '"> <input type="hidden" name="idServicios[]" value="' + idServicios +
    //         '"><input type="hidden" name="observacionesServicio[]" value="' + observacionesServicio +
    //         '"><input type="hidden" name="monto[]" value="' + monto + '">    ' + servicio +
    //         '</td><td>' + monto + '</td><td>' + persona +
    //         '</td><td> <input type="button" class="btn btn-danger    btnEliminarServicio" value="Eliminar"> </td> </tr>';
    //     $("#tbodyServicios").append(tr);
    // });

    $("body").on("click", ".btnEliminarServicio", function() {
        $(this).parents("tr").eq(0).remove();
    });

    $("#cargarPlaca").click();

    id = "<?php echo $id ?>";

    $("#btnGuardarEntrega").click(function() {
        let idVehiculos = $("#idVehiculos").val(),
            fechaServicio = $("#fechaServicio").val(),
            observaciones = $("#observaciones").val();

        console.log(idVehiculos, fechaServicio, observaciones);

        $.ajax({
            url: "admin/entregas/actualizarEntrega",
            type: "post",
            dataType: "json",
            data: {
                idVehiculos: idVehiculos,
                fechaServicio: fechaServicio,
                observaciones: observaciones,
                id: $("#ide").val()
            },
            success: function(response) {
                console.log(response);
                location.reload();
            }
        });
    });
})
</script>


<form action="" method="post">
    <input type="hidden" id="ide" value="<?php echo $id; ?>">
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <h5 class="card-header">Editar Registros de Vehículos</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">

                            <div class='form-group row'>
                                <label for='autoVehiculo' class='col-sm-4 col-form-label'>Placa de Vehículo</label>
                                <div class='col-sm-8'>
                                    <div class="input-group">
                                        <input type='text' name='autoVehiculo' class='form-control' id='autoVehiculo'
                                            value='<?php echo $model->placa ?>'>
                                        <div class="input-group-append">
                                            <input type="button" value="Cargar" class="btn btn-outline-info"
                                                id="cargarPlaca">
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <input type="hidden" name="idVehiculos" id="idVehiculos"
                                value="<?php echo $model->idVehiculos ?>">
                            <?php helper_form_text("fechaServicio","Fecha de Registro",$model->fechaServicio,"date") ?>

                            <?php helper_form_textarea("observaciones","Observaciones",$model->observaciones) ?>

                            <button id="btnGuardarEntrega" type="button" class="btn btn-lg btn-success"><i
                                    class="fas fa-save"></i> Guardar</button>
                        </div>

                        <div class="col-md-4">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Cliente</th>
                                    <td id="ajax_cliente"></td>
                                </tr>
                                <tr>
                                    <th>Marca</th>
                                    <td id="ajax_marca"></td>
                                </tr>
                                <tr>
                                    <th>Modelo</th>
                                    <td id="ajax_modelo"></td>
                                </tr>
                                <tr>
                                    <th>Placa</th>
                                    <td id="ajax_placa"></td>
                                </tr>
                                <tr>
                                    <th>Año</th>
                                    <td id="ajax_anio"></td>
                                </tr>
                            </table>
                        </div>
                    </div>

                </div>

            </div>


        </div>
    </div>

    <br>

    <div class="row">
        <div class="col-md-12   ">
            <div class="card">
                <h5 class="card-header">Catálogo de servicios</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <button type="button" class="btn btn-outline-info" id="btnAddServicio"><i
                                    class="fas fa-plus"></i>
                                Agregar Servicio</button>

                            <br>
                            <br>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Nombre</th>
                                        <th>Costo</th>
                                        <th>Mecánico</th>
                                        <th>Acciones</th>
                                    </tr>

                                </thead>

                                <tbody id="tbodyServicios">
                                    <?php
                                        foreach ($entregaServicios as $key => $value) {
                                            echo "<tr>";
                                            echo "<td>".substr($value->fechaServicio,0,10)."</td>";
                                            echo "<td>".$value->descripcion."</td>";
                                            echo "<td>".$value->monto."</td>";
                                            echo "<td>".$value->nombresCompletos."</td>";
                                            echo "<td><a href='admin/entregas/eliminarServicio/".$value->id."/".$id."' class='btn btn-danger' ><i class='fas fa-trash-alt'></i> Eliminar</a></td>";
                                            echo "</tr>";
                                        }

                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

            </div>
        </div>

        
    </div>
</form>

<div class="modal fade" id="modalAddServicio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="admin/entregas/guardarServicios" method="post">
            <input type="hidden" name="idModal" value="<?php echo $id ?>">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Servicio</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <?php helper_form_select("idPersonas","Mecánico",$personas,"nombresCompletos" ) ?>
                    <?php helper_form_select("idServicios","Catálogo",$servicios,"descripcion" ) ?>
                    <?php helper_form_textarea("observacionesServicio","Observaciones") ?>
                    <?php helper_form_text("fechaEntregaServicio","Fecha de Servicio",date("Y-m-d"),"date") ?>                         
                    <?php helper_form_text("monto","Monto","","number") ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-outline-success">Guardar</button>
                </div>
            </form>
            </div>
    </div>
</div>