<div class="row">
    <div class="col-md-12">



    </div>
</div>

<br>

<div class="card">
    <h5 class="card-header">Editar <?php echo ucwords($controller) ?></h5>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <form method="post">
                    <?php helper_form_select("idVehiculos","Vehiculo",$vehiculos,"placa",$model->idVehiculos ) ?>
                    <?php helper_form_select("idPersonas","Mecánico",$personas,"nombresCompletos",$model->idPersonas ) ?>
                    <?php helper_form_select("idServicios","Servicio",$servicios,"descripcion",$model->idServicios ) ?>
                    <?php helper_form_text("fechaServicio","Fecha de Servicio",$model->fechaServicio,"date") ?>

                    <button type="submit" class="btn btn-outline-success"><i class="fas fa-save"></i> Guardar</button>
                </form>
            </div>
        </div>

    </div>

</div>