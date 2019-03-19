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
                    <?php helper_form_select("idClientes","Cliente",$clientes,"nombresCompletos") ?>
                    <?php helper_form_text("placa","Placa") ?>
                    <?php helper_form_select("idMarcas","Marca",$marcas) ?>
                    <?php helper_form_select("idModelos","Modelo",$modelos ) ?>
                    <?php helper_form_text("motor","Motor") ?>
                    <?php helper_form_text("anio","Año","","number") ?>
                    <?php helper_form_text("serie","Serie") ?>
                    <?php helper_form_text("imagen","Imagen","","file") ?>

                    <button type="submit" class="btn btn-outline-success"><i class="fas fa-save"></i> Guardar</button>
                </form>
            </div>
        </div>

    </div>

</div>