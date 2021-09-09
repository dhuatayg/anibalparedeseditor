<!doctype html>
<html lang="en">
    <head>
        <title>Anibal Paredes Editor S.A.C.</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/AdminLTE.min.css"-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/skins/_all-skins.min.css"-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>dist/menu/css/default.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>dist/menu/css/component.css" />
        <script src="<?php echo base_url(); ?>dist/menu/js/modernizr.custom.js"></script>
        <style type="text/css">
            .modal {
              text-align: center;
              padding: 0 !important;
            }
            .modal:before {
              content: '';
              display: inline-block;
              height: 100%;
              vertical-align: middle;
              margin-right: -4px;
            }
            .modal-dialog {
              display: inline-block;
              text-align: left;
              vertical-align: middle;
            }
            .noresize {
              resize: none; 
            }

            .page-header {
              margin: 0px 0 20px;
            }

            body {
              margin: 0;
              padding: 0;
            }

            .headline {

              text-align: center;
              position: absolute;
              margin: auto;
              height: 50%;
              width: 50%;
              top: 0;
              left: 0;
              bottom: 0;
              right: 0;
            }

            .headline h1 {
              border: 2px solid #FFF;
              margin-top: 10%;
              padding: 20px;
              font-size: 4vw;
              color: #FFF;
            }

            #gradient {
              width: 100%;
              height: 100%;
              position: absolute;
              background: linear-gradient(270deg, #003366, #b27000, #06617d, #067370);
              background-size: 800% 800%;
              -webkit-animation: colors 30s ease infinite;
              -moz-animation: colors 30s ease infinite;
              animation: colors 30s ease infinite;
            }

            @-webkit-keyframes colors {
              0%{background-position:0% 50%}
              50%{background-position:100% 50%}
              100%{background-position:0% 50%}
            }
            @-moz-keyframes colors {
              0%{background-position:0% 50%}
              50%{background-position:100% 50%}
              100%{background-position:0% 50%}
            }
            @keyframes colors { 
              0%{background-position:0% 50%}
              50%{background-position:100% 50%}
              100%{background-position:0% 50%}
            }


        </style>
    </head>

    <body class="hold-transition skin-blue sidebar-mini sidebar-collapse">
        <div id="gradient">
            <div class="container-fluid">
                <div class="row">
                <nav class="navbar navbar-default navbar-static-top">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="<?php echo site_url('menu'); ?>" style="font-size: 20px"><strong style="color:#41D3BD;">ANIBAL </strong><strong style="color:#ffffff;">PAREDES EDITOR S.A.C</strong></a>
                    </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-industry"></i>
                                PRODUCCIÓN </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="<?php echo base_url(); ?>produccion">Producción</a>
                                </li> 
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-cubes"></i>
                                ALMACÉN </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="<?php echo base_url(); ?>material">Materiales</a>
                                </li> 
                                <li>
                                    <a href="<?php echo base_url(); ?>producto">Productos</a>
                                </li> 
                            </ul>
                        </li>                 
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-cog"></i>
                                MANTENIMIENTO </a>
                            <ul class="dropdown-menu">    
                                <li>
                                    <a href="<?php echo base_url(); ?>area">Áreas</a>
                                </li> 
                                <li>
                                    <a href="<?php echo base_url(); ?>categoria">Categorías</a>
                                </li> 
                                <li>
                                    <a href="<?php echo base_url(); ?>cliente">Clientes</a>
                                </li> 
                                <li>
                                    <a href="<?php echo base_url(); ?>estado">Estados</a>
                                </li> 
                                <li>
                                    <a href="<?php echo base_url(); ?>fase">Fase</a>
                                </li>    
                                <li>
                                    <a href="<?php echo base_url(); ?>maquina">Maquinas</a>
                                </li>                    
                                <li>
                                    <a href="<?php echo base_url(); ?>rol">Roles</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>usuario">Usuarios</a>
                                </li>
                            </ul>
                        </li> 
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-area-chart"></i>
                                ESTADÍSTICA </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="<?php echo base_url(); ?>produccion/productividad">Nivel de productividad</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>produccion/defectuoso">Productos defectuosos</a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-user"></i>
                                HOLA, <span><?php echo ' '.$this->session->userdata("usuario_nombres").' '.$this->session->userdata("usuario_apellidos")?></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="<?php echo base_url(); ?>usuario/configuracion">Cambio de contraseña</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>login/logout">
                                        <i class="fa fa-sign-out"></i>Desconectarse</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
                </div>
            </div>
            <div class="headline">
                <h1>SISTEMA<br>DE CONTROL DE PRODUCCIÓN</h1>
            </div>
        </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </body>
</html>