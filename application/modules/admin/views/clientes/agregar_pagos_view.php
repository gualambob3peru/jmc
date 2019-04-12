<script>
$(function() {
    $("#idTipoPago").change(function() {
        let valor = $(this).val();
        console.log(valor);
    
        switch (valor) {
            case "1":
                $(".divDocumento").css("display","none");
                break;
            case "2":
                $(".divDocumento").css("display","flex");
                break;
            default:
                break;
        }
    });
});
</script>

<div class="row">
    <div class="col-md-12">



    </div>
</div>

<br>

<div class="card">
    <h5 class="card-header">Agregar Pago</h5>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <form method="post">
                    <input type="hidden" name="idClientes" value="<?php echo $idClientes ?>">
                    <?php helper_form_text("fechaPago","Fecha de Pago",date("Y-m-d"),"date") ?>


                    <?php helper_form_select("idTipoPago","Tipo de Pago",$tipoPagos) ?>

                    <div class="form-group row divDocumento">
                        <label for="documento" class="col-sm-4 col-form-label">Nro de documento</label>
                        <div class="col-sm-8">
                            <input type="text" name="documento" class="form-control" id="documento" value="">
                        </div>
                    </div>


                    <?php helper_form_select("idTipoMoneda","Tipo de Moneda",$tipoMonedas) ?>
                    <?php helper_form_text("tipoCambio","Tipo de Cambio","3.21") ?>
                    <?php helper_form_text("monto","Monto","") ?>

                    <button type="submit" class="btn btn-outline-success"><i class="fas fa-save"></i> Guardar</button>
                </form>
            </div>
        </div>

    </div>

</div>