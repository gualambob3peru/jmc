
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(function(){
        var availableTags = <?php echo json_encode($vehiculos) ?>;
        $("#autoVehiculo").autocomplete({
            minLength: 0,
            focus: function( event, ui ) {
                console.log(ui)
                $( "#autoVehiculo" ).val( ui.item.placa );
                return false;
            },
            source : availableTags,
            change : function(event,ui){
                console.log(ui)
            },
            select : function(event,ui){
                console.log(ui)
                $("#autoVehiculo").val(ui.item.placa);
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