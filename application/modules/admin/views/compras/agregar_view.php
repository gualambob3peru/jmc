<div class="row">
    <div class="col-md-12">



    </div>
</div>

<br>

<div class="card">
    <h5 class="card-header">Agregar Compra</h5>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <form method="post">
                    <?php helper_form_text("ruc","RUC") ?>
                    <?php helper_form_text("razonSocial","Razón Social") ?>
                    <?php helper_form_select("idPiezas","Repuesto",$piezas,"descripcion" ) ?>
                    <?php helper_form_text("cantidad","Cantidad") ?>
                    <?php helper_form_text("costo","Costo") ?>
                    <?php helper_form_text("fechaCompras","Fecha de Compra",date("Y-m-d\TH:i"),"datetime-local") ?>


                    <button type="submit" class="btn btn-outline-success"><i class="fas fa-save"></i> Guardar</button>
                </form>
            </div>
        </div>

    </div>

</div>