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
    <script type="text/javascript" src="static/main/bootstrap/js/bootstrap.min.js"></script>
    <link rel="icon" href="osinerg.ico" type="image/ico">

    <style>
    body{
        font-family:Exo;
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
        height:100%;
    }
    .barraLateral li {
        color: #4b4b4b;
        background: #EBE9E9;
        height: 52px;
        padding: 13px;
        padding-left:25px;
        border: 1px solid #C9CAD9;
        /* text-align:center; */
        
    }
    .barraLateral li:hover i{
        color:#181818;
        cursor:pointer;
    }

    .barraLateral li:hover{
        color:#181818;
        cursor:pointer;
    }
        

    .barraLateral ul {
        width:100%;
        padding-left:0;
        list-style: none;
    }

    .barraLateral i {
        color: #a4abb3;
        font-size:18px;
        width:30px;
        text-align:center; 
    }

    .cuerpo {
        background: #f0f4f7;
        margin-top:10px;
    }
    </style>
</head>

<body style="background:#eee;">
    <nav class="navbar navbar-expand-lg" id="cabecera">
        <a class="navbar-brand" href="#">JMC Racing</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="admin">Admin <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin/clientes">Clientes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin/vehiculos">Vehiculos</a>
                </li>

                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">Usuario</span>
                        
                        <i class="fas fa-user"></i>
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown" >
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
                    <ul>
                        <li><i class="fas fa-male"></i> Clientes</li>
                        <li><i class="fas fa-car"></i> Vehículos</li>
                        <li><i class="fas fa-car-crash"></i> Servicios</li>
                        
                    </ul>
                </div>
            </div>
            <div class="col-md-10 cuerpo">
                <?php echo $body; ?>
            </div>
        </div>

    </div>
</body>

</html>