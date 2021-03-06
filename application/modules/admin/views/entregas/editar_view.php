<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<style>
    .select2-selection__rendered {
    line-height: 31px !important;
}
.select2-container .select2-selection--single {
    height: 35px !important;
}
.select2-selection__arrow {
    height: 34px !important;
}
</style>

<script>
    $(function() {
        $('#idServicios').select2({ 
            width: '100%' ,
            language: {
                        noResults: function() {
                          return "No hay resultados";        
                        },
                        searching: function() {
                    
                          return "Buscando..";
                        }
                    }
        });

        $("#formuploadajax").on("submit", function(e) {
            e.preventDefault();
            var f = $(this);
            var formData = new FormData(document.getElementById("formuploadajax"));
            formData.append("idEntregaServicios", $("#imagenIdEntregaServicios").val());
            formData.append("imagenIdEntregas", $("#imagenIdEntregas").val());
            //formData.append(f.attr("name"), $(this)[0].files[0]);
            $.ajax({
                    url: "admin/entregas/subeAjaxImages",
                    type: "post",
                    dataType: "html",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false
                })
                .done(function(res) {
                    $("#imagen").val("")
                    $("#modalImagen").modal("hide");
                });
        });



        $("body").on("click", ".btnDeleteImagen", function() {
            let idImagenEntregas = $(this).parents("tr").eq(0).attr("idImagenEntregas");
            let $this = $(this);
            $.ajax({
                url: 'admin/entregas/ajaxDeleteImagen',
                type: 'post',
                dataType: 'json',
                error: function(e) {
                    console.log(e);
                },
                data: {
                    idImagenEntregas: idImagenEntregas
                },
                success: function(response) {
                    $this.parents("tr").eq(0).remove();
                }
            });
        });


        $("body").on("click", ".btnAddImagen", function() {
            $("#imagenIdEntregaServicios").val($(this).attr("idEntregaServicios"));
            //Creando Imagenes
            let idEntregaServicios = $("#imagenIdEntregaServicios").val(),
                idEntregas = $("#imagenIdEntregas").val();

            $.ajax({
                url: 'admin/entregas/getAjaxImagenes',
                type: 'post',
                dataType: 'json',
                error: function(e) {
                    console.log(e);
                },
                data: {
                    idEntregaServicios: idEntregaServicios
                },
                success: function(response) {
                    let imagenes = response.imagenes,
                        divImagenes = "<table class='table table-bordered'>";

                    for (ind in imagenes) {
                        divImagenes += "<tr idImagenEntregas='" + imagenes[ind].id +
                            "'><td><img src='static/images/entregas/" + idEntregas + "/" +
                            idEntregaServicios + "/" + imagenes[ind].imagen +
                            "' style='height: 100px;'></td><td><button type='button' class='btn btn-danger btnDeleteImagen'><i class='far fa-trash-alt'></i></button></td></tr>";
                    }
                    divImagenes += "</table>";
                    $("#divImagenes").html(divImagenes);
                    $("#modalImagen").modal();
                }
            });

            //  $("#imagenIdEntregas").val($(this).attr("imagenIdEntregas"));

        });


        let vehiculos = <?php echo json_encode($vehiculos) ?>;
        let piezas = <?php echo json_encode($piezas) ?>;

        vehiculos = $.map(vehiculos, function(item) {
            return {
                label: item
                    .placa, // Set the display lebel for the searched list of company names which we're getting from server side coding.
                value: item.id // Set the raw value of each shown items.
            }
        })

        piezas = $.map(piezas, function(item) {
            return {
                label: item
                    .descripcion, // Set the display lebel for the searched list of company names which we're getting from server side coding.
                value: item.id, // Set the raw value of each shown items.
                stock: item.stock,
                costo: item.costo,
                imagen: item.imagen
            }
        })

        console.log(piezas);

        $("#autoPieza").autocomplete({
            source: piezas,
            select: function(event, ui) {
                $("#autoPieza").val(ui.item.label)
                $("#idPiezas").val(ui.item.value)

                //Hallando stock de pieza

                $("#stock").val(ui.item.stock);
                $("#costoPieza").val(ui.item.costo);
                $("#cantidad").val("");
                $("#costoMonto").val("");

                return false;
            }
        }).autocomplete("instance")._renderItem = function(ul, item) {


            return $("<li><div><img onError='this.onerror=null;this.src=\"static/images/image-not-found.png\";' style='max-height:40px' src='static/images/repuestos/" + item.value + "/" + item.imagen + "'><span>" + item.label + "</span></div></li>").appendTo(ul);
        };

        $("#autoVehiculo").autocomplete({
            source: vehiculos,
            select: function(event, ui) {
                $("#autoVehiculo").val(ui.item.label)
                $("#idVehiculos").val(ui.item.value)
                return false;
            }
        })



        $("#cargarPlaca").click(function() {
            $.ajax({
                url: "admin/vehiculos/ajax_cargar_vehiculo/" + $("#autoVehiculo").val(),
                type: "post",
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    let vehiculo = response.respuesta;

                    $("#ajax_cliente").val(vehiculo.nombresCompletos);
                    $("#ajax_marca").text(vehiculo.descripcion_marcas);
                    $("#ajax_modelo").text(vehiculo.descripcion_modelos);
                    $("#ajax_placa").text(vehiculo.placa);
                    $("#ajax_anio").text(vehiculo.anio);

                }
            })
        });

        $("#btnAddServicio").click(function() {
            $("#modalAddServicio").modal();
            $("#idPersonas").val("");
            $("#idServicios").val("");
            $("#observacionesServicio").val("");
            $("#monto").val("");
        });


        $("#idServicios").change(function() {

            $("#monto").val($(this).find(":selected").attr("monto"));
        });



        $("body").on("click", ".btnEliminarServicio", function() {
            $(this).parents("tr").eq(0).remove();
        });

        $("#cargarPlaca").click();

        id = "<?php echo $id ?>";

        $("#btnGuardarEntrega").click(function() {
            let idVehiculos = $("#idVehiculos").val(),
                fechaServicio = $("#fechaServicio").val(),
                observaciones = $("#observaciones").val();



            $.ajax({
                url: "admin/entregas/actualizarEntrega",
                type: "post",
                dataType: "json",
                data: {
                    idVehiculos: idVehiculos,
                    fechaServicio: fechaServicio,
                    observaciones: observaciones,
                    id: $("#ide").val()
                },
                success: function(response) {

                    location.reload();
                }
            });
        });

        $("body").on("click", ".btnAddRepuesto", function() {
            let idEntregaServicios = $(this).attr("idEntregaServicios");

            $("#modalAddRepuestos").attr("idEntregaServicios", idEntregaServicios);
            $("#modalIdEntregaServicios").val(idEntregaServicios);

            $.ajax({
                url: "admin/entregas/getAjaxRepuestos",
                type: "post",
                dataType: "json",
                data: {
                    idEntregaServicios: idEntregaServicios
                },
                success: function(response) {
                    let rows =
                        "<tr><th>Repuesto</th><th>Cantidad</th><th>Costo</th><th>Factura</th><th>Acciones</th></tr>",
                        repuestos = response.repuestos;

                    for (i in repuestos) {
                        rows += "<tr idServicioRepuestos = '" + repuestos[i].id + "' >";
                        rows += "<td>" + repuestos[i].descripcion + "</td>";
                        rows += "<td>" + repuestos[i].cantidad + "</td>";
                        rows += "<td>" + repuestos[i].monto + "</td>";
                        rows += "<td>" + ((repuestos[i].factura == 1) ? "<i class='fas fa-check'></i>" : "") + "</td>";
                        rows +=
                            "<td> <button type='button' class='btnAjaxRepuesEliminar btn btn-danger'><i class='fas fa-trash-alt'></i></button> </td>";
                        rows += "</tr>";
                    }

                    $(".tableRepuestos").html(rows);
                    $("#modalAddRepuestos").modal();

                }
            });




        });

        $("body").on("click", ".btnAjaxRepuesEliminar", function() {
            let idServicioRepuestos = $(this).parents("tr").eq(0).attr("idServicioRepuestos");
            $(this).parents("tr").eq(0).attr("id", "servicio" + idServicioRepuestos);

            $("#modalQuitarRepuesto").modal();
            $("#modalQuitarRepuesto").attr("idServicioRepuestos", idServicioRepuestos);
        });


        $("body").on("click", ".btnQuitarRepuestoAceptar", function() {
            let idServicioRepuestos = $("#modalQuitarRepuesto").attr("idServicioRepuestos");
            $this = $(this);
            $.ajax({
                url: "admin/entregas/btnAjaxServRepuesEliminar",
                type: "post",
                dataType: "json",
                data: {
                    idServicioRepuestos: idServicioRepuestos
                },
                success: function(response) {
                    $("#servicio" + idServicioRepuestos).remove();
                    $("#modalQuitarRepuesto").modal("hide");
                }
            });
        });




        $("#btnModalRepuestos").click(function() {
            let $this = $("#idPiezas");
            $("#stock").val("");
            $("#cantidad").val("");
            $("#costoMonto").val("");
            $("#autoPieza").val("");

            $.ajax({
                url: "admin/piezas/getAjaxPiezas",
                type: "post",
                dataType: "json",
                success: function(response) {
                    piezas = response.respuesta;

                    piezas = $.map(piezas, function(item) {
                        return {
                            label: item
                                .descripcion, // Set the display lebel for the searched list of company names which we're getting from server side coding.
                            value: item.id, // Set the raw value of each shown items.
                            stock: item.stock,
                            costo: item.costo,
                            imagen: item.imagen
                        }
                    })


                    $("#autoPieza").autocomplete("destroy");
                    $("#autoPieza").autocomplete({
                        source: piezas,
                        select: function(event, ui) {
                            $("#autoPieza").val(ui.item.label)
                            $("#idPiezas").val(ui.item.value)

                            //Hallando stock de pieza

                            $("#stock").val(ui.item.stock);
                            $("#costoPieza").val(ui.item.costo);
                            $("#cantidad").val("");
                            $("#costoMonto").val("");

                            return false;
                        }
                    }).autocomplete("instance")._renderItem = function(ul, item) {
                        console.log(item);

                        return $("<li><div><img onError='this.onerror=null;this.src=\"static/images/image-not-found.png\";' style='max-height:40px' src='static/images/repuestos/" + item.value + "/" + item.imagen + "'><span>" + item.label + "</span></div></li>").appendTo(ul);
                    };

                    // let options = "<option value=''>Elegir</option>",
                    //     piezas = response.respuesta;

                    // for (i in piezas) {
                    //     options += "<option value='" + piezas[i].id + "' stock='" + piezas[i]
                    //         .stock + "' costo='" + piezas[i].costo + "'>" + piezas[i]
                    //         .descripcion + "</option>"
                    // }

                    // $this.html(options);
                    $("#modalAdd2").modal();
                }
            });
        });


        // $("#idPiezas").change(function() {
        //     $("#stock").val($(this).find(":selected").attr("stock"));
        //     $("#cantidad").val("");
        //     $("#costoMonto").val("");
        // });

        $("#cantidad").keyup(function() {
            console.log($(this).val(), $("#stock").val());

            if (parseInt($(this).val()) > parseInt($("#stock").val())) {
                $(this).val($("#stock").val());

            }

            console.log($("#cantidad").val(), $("#costoPieza").val());

            $("#costoMonto").val($("#cantidad").val() * $("#costoPieza").val());
        });

        $("#btnAddModal2").click(function() {

            let idPieza = $("#idPiezas").val(),
                desIdPieza = $("#autoPieza").val(),
                cantidad = $("#cantidad").val(),
                costoMonto = $("#costoMonto").val(),
                factura = $("#factura").is(":checked")
            row = "";

            if (factura) {
                factura = 1;
                tdFactura = "<i class='fas fa-check'></i>";
            } else {
                factura = 0;
                tdFactura = "";
            }



            if (idPieza == "" || cantidad == "") {
                alert("Debe llenar todos los campos")
                return;
            }
            row = "<tr><td><input type='hidden' name='factura[]' value='" + factura + "'><input type='hidden' name='idRepuestos[]' value='" + idPieza +
                "'> <input type='hidden' name='monto[]' value='" + costoMonto + "'>" +
                desIdPieza + "</td><td><input type='hidden' name='cantidad[]' value='" + cantidad + "'>" +
                cantidad + "</td> <td> " + costoMonto +
                " </td> <td> " + tdFactura + " </td>   <td> <button type='button' class='btnRepuesEliminar btn btn-danger'><i class='fas fa-trash-alt'></i></button> </td> </tr>";


            $("#trBorrar").remove();
            $("#tableAddRepuestos").append(row);
            $(".tablaRepuestosAgregados").css("display", "table");
        });


        $("body").on("click", ".btnRepuesEliminar", function() {
            $(this).parents("tr").eq(0).remove();
        });

        $(".btnOkDeleteEntregaServicio").click(function() {
            window.location.href = "<?php echo base_url() ?>" + $("#modalDeleteEntregaServicio").attr(
                "ruta");
        });

        $("body").on("click", ".btnDeleteEntregaServicio", function() {
            $("#modalDeleteEntregaServicio").modal();
            $("#modalDeleteEntregaServicio").attr("ruta", $(this).attr("ruta"));

        });

        $("body").on("click", ".imagenCarrusel", function() {
            $("#modalCarrusel").modal();
            $("#imagenModalCarrusel").attr("src", $(this).attr("src"));
        })

        $("#formSaveRepuestos").submit(function(e) {
            if ($("[name='idRepuestos[]'").length == 0) {
                $("#modalAddRepuestos").modal("hide");
                e.preventDefault();
                return false;
            }
        });

        $(".btnModalMano").click(function() {

            $("#modalEditarMano").attr("idEntregaServicios", $(this).attr("idEntregaServicios"));
            $("#modalEditarMano").modal();
        });

        $("#btnGuardarMano").click(function() {
            if (isNaN($("#manoObra").val()) || $("#manoObra").val() == "") {
                alert("Debe poner un número")
                return;
            }

            let manoObra = $("#manoObra").val(),
                idEntregaServicios = $("#modalEditarMano").attr("idEntregaServicios");
            console.log(idEntregaServicios);
            console.log(manoObra);
            $.ajax({
                url: "admin/entregas/ajaxGuardarMano",
                type: "post",
                dataType: "json",
                data: {
                    manoObra: manoObra,
                    idEntregaServicios: idEntregaServicios
                },
                error: function(e) {
                    alert("No se pudo realizar la operación, intente actualizar");
                },
                success: function(response) {
                    if (response.resultado == "1") {
                        location.reload();
                    } else {
                        alert("No se pudo realizar la operación");
                    }
                }
            });
        });
    })
</script>

<style>
    .ui-autocomplete {
        z-index: 10000;
        max-height: 300px;
        overflow-y: auto;
        /* prevent horizontal scrollbar */
        overflow-x: hidden;
    }
</style>

<input type="hidden" id="ide" value="<?php echo $id; ?>">
<div class="row">
    <div class="col-md-12">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="card">
                <h5 class="card-header">Editar Registros de Vehículos</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">

                            <?php helper_form_text("fechaServicio", "Fecha de Registro", substr($model->fechaServicio, 0, 10), "date") ?>
                            <div class='form-group row'>
                                <label for='autoVehiculo' class='col-sm-4 col-form-label'>Placa de Vehículo</label>
                                <div class='col-sm-8'>
                                    <div class="input-group">
                                        <input type='text' name='autoVehiculo' class='form-control' id='autoVehiculo' value='<?php echo $model->placa ?>'>
                                        <div class="input-group-append">
                                            <input type="button" value="Cargar" class="btn btn-outline-info" id="cargarPlaca">
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <input type="hidden" name="idVehiculos" id="idVehiculos" value="<?php echo $model->idVehiculos ?>">

                            <div class="dropdown">
                                <button class="btn btn-outline-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    ...
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <table class="table table-sm table-borderless">
                                        <tr>
                                            <td style="border:0 !important">Marca</td>
                                            <td style="border:0 !important" id="ajax_marca"></td>
                                        </tr>
                                        <tr>
                                            <td style="border:0 !important">Modelo</td>
                                            <td style="border:0 !important" id="ajax_modelo"></td>
                                        </tr>
                                        <tr>
                                            <td style="border:0 !important">Año</td>
                                            <td style="border:0 !important" id="ajax_anio"></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            <div class='form-group row' style="display:none">
                                <label for='observaciones' class='col-sm-4" col-form-label'></label>
                                <div class='col-sm-".$size2."'>
                                    <textarea rows='4' rows='4' name='observaciones' class='form-control' id='observaciones'></textarea>
                                </div>
                            </div>


                            <!-- <?php helper_form_textarea("observaciones", "Observaciones", $model->observaciones, "4", "8", "4", "2") ?> -->

                            <div class="form-group row">
                                <label for="imagen" class="col-sm-4 col-form-label">Imagen</label>
                                <div class="col-sm-8">
                                    <input multiple="multiple" type="file" name="imagen[]" class="form-control" value="">
                                </div>
                            </div>


                            <button type="submit" class="btn  btn-success"><i class="fas fa-save"></i>
                                Guardar</button>

                        </div>

                        <div class="col-md-6">
                            <div class='form-group row'>
                                <label for='ccliente' class='col-sm-4 col-form-label'>Cliente</label>
                                <div class='col-sm-8'>
                                    <div class="input-group">
                                        <input disabled type='text' name='ccliente' class='form-control' id='ajax_cliente'>

                                    </div>

                                </div>
                            </div>
                            <?php helper_form_text("kilometraje", "Kilometraje", $model->kilometraje, "number") ?>


                            <!-- <table class="table table-sm table-bordered">
                            <tr>
                                <td>Cliente</td>
                                <td id="ajax_cliente2"></td>
                            </tr>
                            <tr>
                                <td>Marca</td>
                                <td id="ajax_marca"></td>
                            </tr>
                            <tr>
                                <td>Modelo</td>
                                <td id="ajax_modelo"></td>
                            </tr>
                            <tr>
                                <td>Placa</td>
                                <td id="ajax_placa"></td>
                            </tr>
                            <tr>
                                <td>Año</td>
                                <td id="ajax_anio"></td>
                            </tr>
                        </table> -->

                            <div style="max-height:175px;overflow-y:auto">
                                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">


                                        <?php foreach ($imagenes as $key => $value) : ?>
                                            <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $key ?>">
                                            <?php endforeach; ?>


                                            <!-- <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active">
                                        </li>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li> -->
                                    </ol>
                                    <div class="carousel-inner">
                                        <?php foreach ($imagenes as $key => $value) : ?>
                                            <?php $active = ($key == 0) ? 'active' : '' ?>
                                            <div class="carousel-item <?php echo $active ?>">
                                                <img src="static/images/entregas/<?php echo $model->id ?>/<?php echo $value->imagen ?>" class="d-block w-100 imagenCarrusel" alt="...">
                                            </div>
                                        <?php endforeach; ?>



                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </form>
    </div>
</div>


<div class="row mt-1">
    <div class="col-md-12   ">
        <div class="card">
            <h5 class="card-header">Catálogo de servicios</h5>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <button type="button" class="btn btn-outline-info" id="btnAddServicio" data-toggle="tooltip" data-placement="top" title="Agregar Servicio"><i class="fas fa-plus"></i></button>

                        <br>
                        <br>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Nombre</th>
                                    <th>Mano de Obra</th>
                                    <th>Repuestos</th>
                                    <th>Mecánico</th>
                                    <th>Total</th>
                                    <th>Acciones</th>
                                </tr>

                            </thead>

                            <tbody id="tbodyServicios">
                                <?php
                                $total = 0;
                                foreach ($entregaServicios as $key => $value) {
                                    $originalDate = substr($value->fechaServicio, 0, 10);
                                    $newDate = date("d/m/Y", strtotime($originalDate));


                                    $total += $value->monto + $value->montoTotal;
                                    echo "<tr>";
                                    echo "<td>" . $newDate . "</td>";
                                    echo "<td>" . $value->descripcion . "</td>";
                                    echo "<td style='text-align: right;'>" . $value->monto . " <button type='button' class='btn btnModalMano btn-outline-info' idEntregaServicios='" . $value->id . "' ><i class='far fa-edit'></i></button></td>";
                                    echo "<td>" . $value->montoTotal . "</td>";
                                    echo "<td>" . $value->nombresCompletos . "</td>";
                                    echo "<td>" . ($value->monto + $value->montoTotal) . "</td>";
                                    echo "<td><div class='input-group'> <button idEntregaServicios='" . $value->id . "' class='btn btn-outline-info btnAddRepuesto form-control' type='button' data-toggle='tooltip' data-placement='top' title='Repuestos'><i class='fas fa-plus'></i></button> <button idEntregaServicios='" . $value->id . "' class='btn btn-outline-success btnAddImagen form-control' type='button' data-toggle='tooltip' data-placement='top' title='Imagenes'><i class='fas fa-plus'></i></button>    <button type='button' ruta='admin/entregas/eliminarServicio/" . $value->id . "/" . $id . "' class='btn btn-outline-danger btnDeleteEntregaServicio form-control' data-toggle='tooltip' data-placement='top' title='Eliminar'><i class='fas fa-trash-alt'></i></button></div></td>";
                                    echo "</tr>";
                                }

                                ?>
                                <tr>

                                    <th colspan="4"></th>
                                    <th>Total</th>
                                    <th><?php echo $total ?></th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

        </div>
    </div>


</div>


<div class="modal fade" id="modalAddServicio" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="admin/entregas/guardarServicios" method="post">
                <input type="hidden" name="idModal" value="<?php echo $id ?>">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Servicio</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <?php helper_form_select("idPersonas", "Mecánico", $personas, "nombresCompletos") ?>


                    <div class="form-group row">
                        <label for="idPersonas" class="col-sm-4 col-form-label">Servicio</label>
                        <div class="col-sm-8">
                            <select required class="form-control" name="idServicios" id="idServicios">
                                <option value="">Elegir...</option>
                                <?php foreach ($servicios as $key => $value) : ?>
                                    <?php
                                    if ($value->codigo == "") {
                                        $codigo = "";
                                    } else {
                                        $codigo = $value->codigo . " - ";
                                    }

                                    ?>
                                    <option value="<?php echo $value->id ?>" monto="<?php echo $value->costo ?>">
                                        <?php echo $codigo . $value->descripcion ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>






                    <?php helper_form_textarea("observacionesServicio", "Observaciones") ?>
                    <?php helper_form_text("fechaEntregaServicio", "Fecha de Servicio", date("Y-m-d"), "date") ?>
                    <?php helper_form_text("monto", "Monto", "", "number") ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-outline-success">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="modalAddRepuestos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="formSaveRepuestos" action="admin/entregas/postSavePiezas" method="post">
                <input type="hidden" name="idEntregaServicios" id="modalIdEntregaServicios">
                <input type="hidden" name="idEntrega" value="<?php echo $model->id ?>">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Repuestos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="misRepuestos">


                        <table class="table tableRepuestos">

                        </table>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <button type="button" class="btn btn-outline-info" id="btnModalRepuestos"> <i class="fas fa-plus"></i> </button>
                        </div>
                    </div>

                    <br>

                    <div class="divAddRepuestos">
                        <table class="table table-bordered tablaRepuestosAgregados" style="display:none">
                            <thead>
                                <tr>
                                    <th>Repuesto</th>
                                    <th>Cantidad</th>
                                    <th>Costo</th>
                                    <th>Factura</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody id="tableAddRepuestos">
                                <tr id="trBorrar">

                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-outline-success" id="saveRepuestos">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="modalAdd2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="" method="post">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Repuestos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                    <div class="form-group row">
                        <label for="cantidad" class="col-sm-4 col-form-label">Repuesto</label>
                        <div class="col-sm-8">
                            <input type='text' name='autoPieza' class='form-control' id='autoPieza'>
                            <input type="hidden" name="idPiezas" id="idPiezas" value="">
                            <input type="hidden" name="costoPieza" id="costoPieza" value="">
                            <!-- <select class="form-control" name="" id="autoPieza">
                                <option value="">Elegir</option>
                                <?php foreach ($piezas as $key => $value) : ?>
                                <option value="<?php echo $value->id ?>" stock="<?php echo $value->stock ?>"
                                    costo="<?php echo $value->costo ?>">
                                    <?php echo $value->descripcion ?></option>
                                <?php endforeach; ?>
                            </select> -->

                        </div>
                    </div>




                    <div class="form-group row">
                        <label for="cantidad" class="col-sm-4 col-form-label">Stock</label>
                        <div class="col-sm-8">
                            <input disabled type="text" name="stock" id="stock" class="form-control" value="">
                        </div>
                    </div>

                    <?php helper_form_text("cantidad", "Cantidad") ?>

                    <div class="form-group row">
                        <label for="costoMonto" class="col-sm-4 col-form-label">Monto</label>
                        <div class="col-sm-8">
                            <input type="text" name="costoMonto" id="costoMonto" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="factura" class="col-sm-4 col-form-label">Factura</label>
                        <div class="col-sm-8">
                            <input type="checkbox" name="factura" id="factura" class="form-control">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
                    <button type="button" id="btnAddModal2" data-dismiss="modal" class="btn btn-outline-success">Agregar</button>
                </div>
            </form>
        </div>
    </div>
</div>




<div class="modal" id="modalImagen" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Fotos del Servicio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="divImagenes">

                </div>

                <form action="" methdo="post" id="formuploadajax">
                    <div class="form-group row">
                        <label for="imagen" class="col-sm-4 col-form-label">Imagen</label>
                        <div class="col-sm-8">

                            <input type="hidden" id="imagenIdEntregaServicios" value="">
                            <input type="hidden" id="imagenIdEntregas" value="<?php echo $model->id ?>">
                            <input multiple="multiple" type="file" name="imagen[]" class="form-control" id="imagen" value="">
                        </div>
                    </div>

                    <button class="btn btn-outline-info btnSaveImagen">Guardar</button>
                </form>

            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary btnGuardarImagen">Guardar</button>
            </div> -->
        </div>
    </div>
</div>



<div class="modal" id="modalDeleteEntregaServicio" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Eliminar Servicio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>¿Desea eliminar el servicio?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger btnOkDeleteEntregaServicio">Aceptar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="modalCarrusel" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Imagen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="max-height: 561px;overflow-y: auto;">
                <img id="imagenModalCarrusel" src="" style="width:100%">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Aceptar</button>
            </div>
        </div>
    </div>
</div>


<div class="modal" id="modalQuitarRepuesto" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Quitar repuesto</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>¿Desea quitar el repuesto?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger btnQuitarRepuestoAceptar">Aceptar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal" tabindex="-1" id="modalEditarMano" idEntregaServicios="">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar mano de obra</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-4 col-form-label">Mano de Obra</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="manoObra">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" id="btnGuardarMano" class="btn btn-outline-success">Guardar</button>
            </div>
        </div>
    </div>
</div>