<div class="row">
    <div class="col-md-12">



    </div>
</div>

<br>

<div class="card">
    <h5 class="card-header">Editar Cliente</h5>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <form method="post">
                    <?php helper_form_text("nombres","Nombres",$model->nombres) ?>
                    <?php helper_form_text("apellidoPaterno","Apellido Paterno",$model->apellidoPaterno) ?>
                    <?php helper_form_text("apellidoMaterno","Apellido Materno",$model->apellidoMaterno) ?>
                    <?php helper_form_text("dni","DNI",$model->dni,"number") ?>
                    <?php helper_form_text("ruc","RUC",$model->ruc) ?>
                    <?php helper_form_text("direccion","Dirección",$model->direccion) ?>
                    <?php helper_form_text("correo","Correo",$model->correo,"email") ?>

                    <button type="submit" class="btn btn-outline-success"><i class="fas fa-save"></i> Guardar</button>
                </form>
            </div>
        </div>

    </div>

</div>