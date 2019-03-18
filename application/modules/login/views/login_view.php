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
        <!-- <h1 style="text-align:center;color:#002d6a">JMC</h1> -->

        <div class="row">
            
        </div>
        <div class="row">
            
            <br>
            <div class="col-md-offset-4 col-md-4">
                <div class="row">
                    <?php echo form_open('',array('class'=>'form-horizontal')); ?>
                    <div class="row text-center">
                        <img src="static/images/logo.png" alt="">
                    </div>
                        
                    <br>

                    <div class="form-group">
                        <label class="control-label col-md-3" for="usuario">Usuario</label>
                        <div class="col-md-9">
                            <input class="form-control" type="text" id="usuario" placeholder="Usuario" name="usuario">
                            <?php echo form_error('usuario','<div class="error">', '</div>'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3" for="contrasena">Contraseña</label>
                        <div class="col-md-9">
                            <input class="form-control" type="password" id="contrasena" placeholder="Contraseña"
                                name="contrasena">
                            <?php echo form_error('contrasena','<div class="error">', '</div>'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-offset-3 col-md-9">
                            <button type="submit" class="btn btn-primary">Entrar</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>