<div class="row">
    <div class="col-md-12">



    </div>
</div>

<br>

<div class="card">
    <h5 class="card-header">Editar Compra</h5>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <form method="post">
                    <?php helper_form_text("ruc","RUC",$model->ruc) ?>
                    <?php helper_form_text("razonSocial","Razón Social",$model->razonSocial) ?>
                    <?php helper_form_select("idPiezas","Repuesto",$piezas,"descripcion" ,$model->idPiezas) ?>
                    <?php helper_form_text("cantidad","Cantidad",$model->cantidad) ?>
                    <?php helper_form_text("costo","Costo",$model->costo) ?>
                    <?php helper_form_text("fechaCompras","Fecha de Compra",str_replace(" ", "T", $model->fechaCompras),"datetime-local") ?>

                    <button type="submit" class="btn btn-outline-success"><i class="fas fa-save"></i> Guardar</button>
                </form>
            </div>
        </div>

    </div>

</div>