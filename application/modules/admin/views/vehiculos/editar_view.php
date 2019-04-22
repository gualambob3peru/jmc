<script>
$(function(){
    (function(a){a.fn.validCampoFranz=function(b){a(this).on({keypress:function(a){var c=a.which,d=a.keyCode,e=String.fromCharCode(c).toLowerCase(),f=b;(-1!=f.indexOf(e)||9==d||37!=c&&37==d||39==d&&39!=c||8==d||46==d&&46!=c)&&161!=c||a.preventDefault()}})}})(jQuery);

    $('#placa').validCampoFranz('abcdefghijklmnopqrstuvwxyz0123456789');


    $("#idMarcas").change(function(){
        $.ajax({
            url: 'admin/vehiculos/getAjaxModelos',
            type: 'post',
            dataType:'json',
            data : {idMarcas:$(this).val()},
            success : function(response){
                let modelos = response.respuesta;
                let options = '<option value="">Elegir</option>'
                for(ind in modelos){
                    options+= '<option value="'+ modelos[ind].id +'">' + modelos[ind].descripcion + '</option>';
                }
                
                $("#idModelos").html(options);
            }
        });
    });
});

</script>


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <h5 class="card-header">Editar <?php echo ucwords($controller) ?></h5>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <form method="post" enctype="multipart/form-data">
                            <?php helper_form_select("idClientes","Cliente",$clientes,"nombresCompletos",$model->idClientes) ?>
                            <?php helper_form_text("placa","Placa", $model->placa) ?>
                            <?php helper_form_select("idMarcas","Marca",$marcas,"descripcion",$model->idMarcas ) ?>
                            <?php helper_form_select("idModelos","Modelo",$modelos,"descripcion",$model->idModelos ) ?>

                            <?php helper_form_text("motor","Motor",$model->motor) ?>
                            <?php helper_form_text("anio","Año",$model->anio,"number") ?>
                            <?php helper_form_text("serie","Serie",$model->serie) ?>


                            <div class="form-group row">
                                <label for="imagen" class="col-sm-4 col-form-label">Foto</label>
                                <div class="col-sm-8">
                                    <input type="file" name="imagen" class="form-control" id="imagen">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-outline-success"><i class="fas fa-save"></i>
                                Guardar</button>


                        </form>
                    </div>
                    <div class="col-md-6">
                        <img heigth="100px"
                            src="static/images/vehiculos/<?php echo $model->id ?>/<?php echo $model->imagen ?>"
                            class="img-fluid" alt="">
                    </div>
                </div>

            </div>

        </div>

    </div>

</div>

<br>