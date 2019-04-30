<div class="row">
    <div class="col-md-12">



    </div>
</div>

<br>

<div class="card">
    <h5 class="card-header">Editar Repuestos</h5>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <form method="post">
                    <?php helper_form_text("codigo","Codigo",$model->codigo) ?>
                    <?php helper_form_text("descripcion","Descripción",$model->descripcion) ?>
                    <?php helper_form_text("costo","Precio de Venta",$model->costo,"number") ?>
                    <?php helper_form_text("precioCosto","Precio de Costo",$model->precioCosto,"number") ?>
                    <?php helper_form_text("stock","Stock",$model->stock,"number") ?>

                    <button type="submit" class="btn btn-outline-success"><i class="fas fa-save"></i> Guardar</button>
                </form>
            </div>
        </div>

    </div>

</div>