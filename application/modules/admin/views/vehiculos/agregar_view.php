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



    </div>
</div>

<br>

<div class="card">
    <h5 class="card-header">Agregar <?php echo ucwords($controller) ?></h5>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">    
                <form method="post" enctype="multipart/form-data">
                    <?php if ( array_key_exists("mensaje",$_SESSION)): ?>
                        <h5 class="text-danger"><?php echo $_SESSION["mensaje"] ?></h5>
                        <?php $_SESSION["mensaje"] = "" ?>
                    <?php endif; ?>
                    <?php helper_form_select("idClientes","Cliente",$clientes,"nombresCompletos") ?>
                    <?php helper_form_text("placa","Placa",set_value('placa')) ?>
                    <?php helper_form_select("idMarcas","Marca",$marcas) ?>
                    <?php helper_form_select("idModelos","Modelo",array() ) ?>
                    <?php helper_form_text("motor","Motor",set_value('motor')) ?>
                    <?php helper_form_text("anio","Año",set_value('anio'),"number") ?>
                    <?php helper_form_text("serie","Serie",set_value('serie')) ?>
                    <?php helper_form_text("imagen","Imagen","","file") ?>

                    <button type="submit" class="btn btn-outline-success"><i class="fas fa-save"></i> Guardar</button>
                </form>
            </div>
        </div>

    </div>

</div>