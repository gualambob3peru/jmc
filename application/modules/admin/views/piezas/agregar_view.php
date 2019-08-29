<div class="row">
    <div class="col-md-12">



    </div>
</div>

<br>

<div class="card">
    <h5 class="card-header">Agregar Repuestos</h5>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <form method="post" enctype="multipart/form-data">
                    <?php helper_form_text("codigo","Codigo",set_value('codigo')) ?>
                    <?php helper_form_text("descripcion","Descripción",set_value('descripcion')) ?>
                    <?php helper_form_text("costo","Precio de Venta",set_value('costo'),"number") ?>
                    <?php helper_form_text("precioCosto","Precio de Costo",set_value('precioCosto'),"number") ?>
                    <?php helper_form_text("stock","Stock",set_value('stock'),"number") ?>

                    <?php helper_form_text("imagen","Imagen","","file") ?>
                    <?php echo ((isset($error))? '<span class="badge badge-danger">'. $error. '</span>' :"") ?> 
                    <br>

                    <button type="submit" class="btn btn-outline-success"><i class="fas fa-save"></i> Guardar</button>
                </form>
            </div>
        </div>

    </div>

</div>