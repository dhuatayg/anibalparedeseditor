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
    <div class="container">
        <div class="row">
            <div class="col-md-12">