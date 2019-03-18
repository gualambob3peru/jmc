<div class="row">
    <div class="col-md-12">



    </div>
</div>

<br>

<div class="card">
    <h5 class="card-header">Agregar Cliente</h5>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <form method="post">
                    <?php helper_form_text("nombres","Nombres") ?>
                    <?php helper_form_text("apellidoPaterno","Apellido Paterno") ?>
                    <?php helper_form_text("apellidoMaterno","Apellido Materno") ?>
                    <?php helper_form_text("dni","DNI","","number") ?>
                    <?php helper_form_text("ruc","RUC") ?>
                    <?php helper_form_text("direccion","Dirección") ?>
                    <?php helper_form_text("correo","Correo","","email") ?>

                    <button type="submit" class="btn btn-outline-success"><i class="fas fa-save"></i> Guardar</button>
                </form>
            </div>
        </div>

    </div>

</div>