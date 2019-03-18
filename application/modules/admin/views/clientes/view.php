<div class="row">
    <div class="col-md-12">



    </div>
</div>

<br>

<div class="card">
    <h5 class="card-header">Clientes</h5>
    <div class="card-body">
        <!-- <h5 class="card-title">Special title treatment</h5> -->

        <div class="row">
            <div class="col-md-12">
                <a href="admin/clientes/agregar" class="btn btn-outline-info"> <i class="fas fa-plus"></i> Agregar
                    Clientes</a>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">

                <table class="table">
                    <tr>
                        <th>Nombres</th>
                        <th>DNI</th>
                        <th>RUC</th>
                        <th>Dirección</th>
                        <th>Correo</th>
                        <th>Saldo</th>
                        <th>Acción</th>
                    </tr>

                    <?php foreach($model as $key=>$value): ?>
                    <tr>
                        <td><?php echo $value->nombres." ".$value->apellidoPaterno." ".$value->apellidoMaterno ?></td>
                        <td><?php echo $value->dni ?></td>
                        <td><?php echo $value->ruc ?></td>
                        <td><?php echo $value->direccion ?></td>
                        <td><?php echo $value->correo ?></td>
                        <td><?php echo $value->saldo ?></td>
                        <td>


                            <div class="input-group">
                                <div class="input-group-prepend" id="button-addon3">


                                    <a href="admin/clientes/editar/<?php echo $value->idClientes ?>" class="btn btn-outline-info"><i class="far fa-edit"></i> Editar</a>
                                    <a href="admin/clientes/eliminar/<?php echo $value->idClientes ?>" class="btn btn-outline-danger"><i class="far fa-trash-alt"></i> Eliminar</a>
                                </div>
                                
                            </div>

                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>

    </div>

</div>