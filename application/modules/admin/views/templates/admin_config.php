<!DOCTYPE HTML>

<html>

<head>
    <title>Administraci&oacute;n</title>
    <base href="<?php echo base_url(); ?>">
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="static/main/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" type="text/css" href="static/modules/admin/estilo.css">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Exo">
    <link href="static/main/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!--[if IE]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

    <script type="text/javascript" src="static/main/jquery.js"> </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script type="text/javascript" src="static/main/bootstrap/js/bootstrap.min.js"></script>
    <link rel="icon" href="osinerg.ico" type="image/ico">
    <script>
        $(function(){
            $('[data-toggle="tooltip"]').tooltip()
        });
    </script>
    <style>
    body {
        font-family: Exo;
        background: #f0f4f7;
    }

    #cabecera {
        background: #000;
        color: white;

    }

    #cabecera a {
        color: white;
    }

    .barraLateral {
        background: #EBE9E9;
        height: 100%;
    }

    .barraLateral i {
        color: #a4abb3;
        font-size: 18px;
        width: 30px;
        text-align: center;
    }

    .cuerpo {
        background: #f0f4f7;
        margin-top: 10px;
    }

    a.barraEnlace {
        text-decoration: none;
    }

    .barraEnlace {

        border-style: solid;
        border-width: 0 1px 1px 1px;
        color: #4b4b4b;
        /* text-align: center; */
        vertical-align: middle;
        display: block;
        width: 100%;
        height: 50px;
        padding-top: 13px;
        padding-left: 30px;
        border-color: black;
    }

    .barraEnlace:hover {
        background: #ddd;
        color: #181818;
    }

    .barraEnlace:hover i {

        color: #181818;
    }

    .subMenu {
        background: #EBE9E9;
        top: -1px;
        z-index: 1000;
        width: 200px;
        right: -200px;
        border: 1px solid black;
        border-width: 1px 0 0 0;
        position: absolute;
        display: none;
    }

    .barraPadre:hover .subMenu {
        display: block;
    }

    .table {
        color: #434345;
    }

    .table td,
    .table th {
        vertical-align: middle;
        border-top: 1px solid #bababa;
    }

    .table th {
        border-top: 1px solid #fff;
    }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg" id="cabecera">
        <a class="navbar-brand" href="#">JMC Racing</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <!-- <li class="nav-item active">
                    <a class="nav-link" href="admin/entregas">Entrega <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin/clientes">Configuraciones Generales</a>
                </li> -->

                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">Usuario</span>

                        <i class="fas fa-user"></i>
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="admin/logout" style="color:black">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Cerrar sesión
                        </a>
                    </div>
                </li>

            </ul>

        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 barraLateral">
                <div class="row">
                    <a class="barraEnlace" href="admin/clientes"><i class="fas fa-male"></i> Clientes</a>
                    <a class="barraEnlace" href="admin/vehiculos"><i class="fas fa-car"></i> Vehiculos</a>
                    <a class="barraEnlace" href="admin/entregas"><i class="fas fa-car-crash"></i> Registros</a>
                    <div class="barraEnlace barraPadre" style="position:relative">
                        <i class="fas fa-cubes"></i>Almacen

                        <div class="subMenu">
                            <a href="admin/piezas" class="barraEnlace">Repuestos</a>
                            <a href="admin/compras" class="barraEnlace">Compras</a>
                        </div>

                    </div>

                    <div class="barraEnlace barraPadre" style="position:relative">
                        <i class="fas fa-cogs"></i> Tablas Varios

                        <div class="subMenu">
                            <a href="admin/marcas" class="barraEnlace">Marcas</a>
                            <a href="admin/modelos" class="barraEnlace">Modelos</a>
                            <a href="admin/personas" class="barraEnlace">Mecánicos</a>
                            <a href="admin/servicios" class="barraEnlace">Servicios</a>
                        </div>

                    </div>

                    <a class="barraEnlace" href="admin/reportes"><i class="fas fa-car"></i> Reportes</a>
                </div>
            </div>
            <div class="col-md-10 cuerpo">
                <?php echo $body; ?>
            </div>
        </div>

    </div>
</body>

</html>