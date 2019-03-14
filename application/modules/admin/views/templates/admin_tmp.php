<!DOCTYPE HTML>

<html>

<head>
    <title>Administraci&oacute;n</title>
    <base href="<?php echo base_url(); ?>">
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="static/main/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" type="text/css" href="static/modules/admin/estilo.css">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Roboto">

    <!--[if IE]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

    <script type="text/javascript" src="static/main/jquery.js"> </script>
    <script type="text/javascript" src="static/main/bootstrap/js/bootstrap.min.js"></script>
    <link rel="icon" href="osinerg.ico" type="image/ico">
</head>

<body style="background:#eee;font-family:Roboto">
    <nav class="navbar navbar-default" style="box-shadow: 0 1px 8px rgba(0,0,0,.3);">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Navegación</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">JMC</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav menu" style="font-size: 17px;">
                    <li class="<?php echo (($menu=='admin')?'active':'') ?>"><a href="admin">Admin</a></li>

                </ul>

                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                            aria-expanded="false"><?php echo $this->session->userdata('usuario'); ?> <span
                                class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="admin/logout">Salir</a></li>
                        </ul>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
    <div class="container">
        <?php echo $body; ?>
    </div>
</body>

</html>