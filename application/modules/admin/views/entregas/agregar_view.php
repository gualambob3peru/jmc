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


})
</script>


<div class="row">
    <div class="col-md-12">



    </div>
</div>

<br>

<div class="card">
    <h5 class="card-header">Agregar <?php echo ucwords($controller) ?></h5>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <form method="post">
                    <?php helper_form_text("autoVehiculo","Vehiculo","","text" ) ?>
                    <input type="hidden" name="idVehiculos" id="idVehiculos">


                    <?php helper_form_select("idPersonas","Mecánico",$personas,"nombresCompletos" ) ?>
                    <?php helper_form_select("idServicios","Servicio",$servicios,"descripcion" ) ?>
                    <?php helper_form_text("fechaServicio","Fecha de Servicio","","date") ?>

                    <button type="submit" class="btn btn-outline-success"><i class="fas fa-save"></i> Guardar</button>
                </form>
            </div>
        </div>

    </div>

</div>