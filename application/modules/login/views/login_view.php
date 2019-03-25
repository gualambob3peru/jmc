<!DOCTYPE HTML>
<html>

<head>
    <base href="<?php echo base_url(); ?>">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración</title>
    <link rel="stylesheet" href="static/main/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="static/modules/login/css/estilo.css">
    <!--[if IE]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
    <script src="static/main/jquery.js"></script>
</head>

<body>
    <div class="container-fluid">

        <div class="row">
            <br>
            <br>
            <br>
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div>
                    <form method="post"> 
                        <div class="row text-center">
                            <img src="static/images/logo.png" alt="">
                        </div>

                        <br>

                        <?php helper_form_text("usuario","Usuario","admin"); ?>

                        <?php helper_form_text("contrasena","Contraseña","123456","password"); ?>

                        <div class="form-group row">
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-lg btn-success">Entrar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</body>

</html>