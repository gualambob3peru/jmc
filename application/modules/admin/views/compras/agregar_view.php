<script>
$(function() {
    $("#addItem").click(function() {
        let fila = $(".filaRepuestoCopy").html();
        console.log(fila);

        $("#divItems").append(fila);
    });

    $("body").on("click", '.btnDeleteItem', function() {
        $(this).parents(".filaRepuesto").eq(0).remove();
    });

    $("#btnGuardar").click(function(e){
        $("#divItems select[name='idRepuestos[]']").each(function(index, value){
            let idRepuestos = $("#divItems select[name='idRepuestos[]']").eq(index),
                cantidad = $("#divItems [name='cantidad[]']").eq(index),
                costo = $("#divItems [name='costo[]']").eq(index),
                vacio = false;

                if(idRepuestos.val()=="" || cantidad.val()=="" || costo.val()==""){
                    vacio = true;
                }
            
            if(vacio){
                alert('Debe llenar correctamente los repuestos');
                e.preventDefault(); 
            }
        });

        // if($("#divItems select[name='idRepuestos[]']").length>0 && $("#divItems select[name='idRepuestos[]']").eq(0).val()!="" && $("#divItems [name='cantidad[]']").eq(0).val()!="" && $("#divItems [name='costo[]']").eq(0).val()!=""){

        // }else{
        //     alert('Debe llenar correctamente los repuestos');
        //     e.preventDefault(); 
        // }
    });
});
</script>

<form method="post">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header">Agregar Compra</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <?php helper_form_text("ruc","RUC") ?>
                            <?php helper_form_text("razonSocial","Razón Social") ?>
                            <?php helper_form_text("fechaCompras","Fecha de Compra",date("Y-m-d\TH:i"),"datetime-local") ?>
                            <button type="submit" id="btnGuardar" class="btn btn-outline-success"><i class="fas fa-save"></i>
                                Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header">Repuestos</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <button class="btn btn-outline-info" type="button" id="addItem"><i class="fas fa-plus"></i>
                                Item</button>
                        </div>
                    </div>

                    <br>
                    <div class="row">
                        <div class="col-md-12" id="divItems">
                            <div class="filaRepuesto">
                                <div class="form-row">
                                    <div class="col">
                                        <select class="form-control" name="idRepuestos[]">
                                            <option value="">Elegir Repuesto...</option>
                                            <?php foreach($piezas as $key=>$value): ?>
                                            <option value="<?php echo $value->id ?>"><?php echo $value->descripcion ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>

                                    </div>
                                    <div class="col">
                                        <input type="number" name="cantidad[]" class="form-control"
                                            placeholder="Cantidad">
                                    </div>
                                    <div class="col">
                                        <input type="number" step=".01" name="costo[]" class="form-control"
                                            placeholder="Costo">
                                    </div>
                                    <div class="col">
                                        <input type="button" class="btn btn-danger btnDeleteItem" value="Eliminar">
                                    </div>
                                </div>
                                <br>
                            </div>
                        </div>

                    </div>


                </div>
            </div>
        </div>
    </div>
</form>


<div class="filaRepuestoCopy" style="display:none">
    <div class="filaRepuesto">

        <div class="form-row">
            <div class="col">
                <select class="form-control" name="idRepuestos[]">
                    <option value="">Elegir Repuesto...</option>
                    <?php foreach($piezas as $key=>$value): ?>
                    <option value="<?php echo $value->id ?>"><?php echo $value->descripcion ?></option>
                    <?php endforeach; ?>
                </select>

            </div>
            <div class="col">
                <input type="number" name="cantidad[]" class="form-control" placeholder="Cantidad">
            </div>
            <div class="col">
                <input type="number" step=".01" name="costo[]" class="form-control" placeholder="Costo">
            </div>
            <div class="col">
                <input type="button" class="btn btn-danger btnDeleteItem" value="Eliminar">
            </div>
        </div>
        <br>
    </div>
</div>