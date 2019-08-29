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
                <form method="post" enctype="multipart/form-data">
                    <?php helper_form_text("codigo","Codigo",$model->codigo) ?>
                    <?php helper_form_text("descripcion","Descripción",$model->descripcion) ?>
                    <?php helper_form_text("costo","Precio de Venta",$model->costo,"number") ?>
                    <?php helper_form_text("precioCosto","Precio de Costo",$model->precioCosto,"number") ?>
                    <?php helper_form_text("stock","Stock",$model->stock,"number") ?>

                    <?php helper_form_text("imagen","Imagen","","file") ?>
                     <?php echo ((isset($error))? '<span class="badge badge-danger">'. $error. '</span>' :"") ?> 
                    <br>

                    <button type="submit" class="btn btn-outline-success"><i class="fas fa-save"></i> Guardar</button>
                </form>
            </div>
            <div class="col-md-6">
                <img src="static/images/repuestos/<?php echo $model->id ?>/<?php echo $model->imagen ?>" class="img-fluid" alt="Foto">
            </div>
        </div>

    </div>

</div>