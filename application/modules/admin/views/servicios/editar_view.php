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
                    <?php helper_form_text("descripcion","Nombre del Servicio",$model->descripcion) ?>
                    <?php helper_form_text("costo","Costo",$model->costo,"number") ?>
                    <?php helper_form_textarea("detalle","Descripción",$model->detalle) ?>

                    <button type="submit" class="btn btn-outline-success"><i class="fas fa-save"></i> Guardar</button>
                </form>
            </div>
        </div>

    </div>

</div>