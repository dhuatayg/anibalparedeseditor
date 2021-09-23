<h3 class="page-header" style="color:#086788";><b>Producción</b></h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-body">
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-12 text-center">
                                <div class="box box-solid " style="align:center">        
                                    <div class="box-body form-vertical">
                                        <div class="form-group col-md-3">
                                            <div class="form-horizontal">
                                                <div class="form-group">
                                                    <label class="control-label col-md-5">OSI</label>
                                                    <div class="col-md-7">
                                                        <input id="busqueda_codigo" data-column="1"
                                                            placeholder="Busqueda código" required
                                                            class="search-input-text form-control mayusculas" style="text-transform: uppercase;" type="text"> <span class="help-block"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <div class="form-horizontal">
                                                <div class="form-group">
                                                    <label class="control-label col-md-5">Nombre</label>
                                                    <div class="col-md-7">
                                                        <input id="busqueda_nombre" data-column="2"
                                                            placeholder="Busqueda nombre" required
                                                            class="search-input-text form-control mayusculas" style="text-transform: uppercase;" type="text"> <span class="help-block"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-1">
                                        </div>
                                        <div class="form-group col-md-5">
                                            <div class="btn-group" role="group" aria-label="First group">
                                                <button id="btn_nuevo" type="button" class="btn btn-primary btn-sm" onclick="nuevo_produccion()"><strong>NUEVA PRODUCCION&nbsp;&nbsp;&nbsp;</strong><span class="fa fa-plus-circle"></span></button>                                                    
                                                <button id="btn_excel" type="button" class="btn btn-success btn-sm"><strong>REPORTE EN EXCEL&nbsp;&nbsp;&nbsp;</strong><span class="fa fa-file-excel-o"></span></button>
                                                <button id="btn_pdf" type="button" class="btn btn-danger btn-sm"><strong>REPORTE EN PDF&nbsp;&nbsp;&nbsp;</strong><span class="fa fa-file-pdf-o"></span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                        <hr>
                        <?php  $num=0; ?>
                        <table id="tabla" class="table table-hover table-condensed table-striped" style="width: 100%; cellspacing: 0">
                            <thead>
                                <tr>
                                    <th class="text-center" style="vertical-align: middle;">N°</th>
                                    <th class="text-center" style="vertical-align: middle;">OSI</th>
                                    <th class="text-center" style="vertical-align: middle;">Producto</th>
                                    <th class="text-center" style="vertical-align: middle;">Fecha de Inicio</th>
                                    <th class="text-center" style="vertical-align: middle;">Fecha de Fin</th>
                                    <th class="text-center" style="vertical-align: middle;">Solicitado</th>
                                    <th class="text-center" style="vertical-align: middle;">Elaborados</th>
                                    <th class="text-center" style="vertical-align: middle;">Estado</th>
                                    <th class="text-center" style="vertical-align: middle;">Flujo</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php if(!empty($entidades)):   ?>             
                                    <?php foreach($entidades as $entidad):?>
                                        <?php $num++;  ?>
                                        <tr>
                                            <td class="text-center" style="vertical-align: middle;"><?php echo $num;?></td>                                     
                                            <td class="text-center" style="vertical-align: middle;"><?php echo $entidad->produccion_codigo;?></td>          
                                            <td class="text-center" style="vertical-align: middle;"><?php echo $entidad->producto_nombre;?></td>
                                            <td class="text-center" style="vertical-align: middle;"><?php echo $entidad->produccion_inicio;?></td>
                                            <td class="text-center" style="vertical-align: middle;"><?php echo $entidad->produccion_fin;?></td>
                                            <td class="text-center" style="vertical-align: middle;"><?php echo $entidad->produccion_cantidad;?></td>
                                            <td class="text-center" style="vertical-align: middle;"><?php echo $entidad->produccion_producido;?></td>
                                            <td class="text-center" style="vertical-align: middle;">
                                                <small class="label label-success"><?php echo $entidad->estado_nombre;?></small>
                                            </td>
                                            <td class="text-center" style="vertical-align: middle;">
                                                    <?php if($entidad->estado_id == "6"){    ?>
                                                        <a href="<?php echo base_url()?>produccion/programar/<?php echo $entidad->produccion_id;?>" class="btn btn-primary btn-xs">
                                                        <span class="glyphicon glyphicon-calendar"></span></a>
                                                    <?php }else{    ?>
                                                        <!-- Seguimiento y Control -->
                                                        <div class="btn-group"> 
                                                            <button type="button" class="btn btn-xs btn-primary btn-view-produccion" data-toggle="modal" data-target="#modal-produccion" value="<?php echo $entidad->produccion_id;?>">
                                                            <span class="glyphicon glyphicon-list-alt"></span>
                                                            </button>
                                                            <a href="<?php echo base_url()?>produccion/progreso/<?php echo $entidad->produccion_id;?>" class="btn btn-xs btn-flat btn-primary"> <span class="glyphicon glyphicon-align-left"></span></a>
                                                            <a href="<?php echo base_url();?>produccion/seguimiento/<?php echo $entidad->produccion_id;?>" class="btn btn-xs btn-flat btn-primary"> <span class="glyphicon glyphicon-copy"></span></a>
                                                            <a href="<?php echo base_url();?>produccion/timeline/<?php echo $entidad->produccion_id;?>" class="btn btn-xs btn-flat btn-primary"> <span class="glyphicon glyphicon-hourglass"></span></a>
                                                        </div>
                                                    <?php }  ?>
                                                </td>
                                        </tr>
                                    <?php endforeach;   ?>
                                <?php endif;    ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


<!-- ====================================================================================================== -->

<div class="modal fade" id="modal_produccion"
                role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"
                                aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 id="msg_cabecera" class="modal-title text-center"></h4>
                    </div>
                    <div class="modal-body" align="center">
                        <div class="row" align="center">
                            <div class="col-md-12" align="center">                            
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label style="width: 100%" class="control-label col-md-6">Código</label>
                                            <div class="col-md-12">
                                                <input id="produccion_codigo" style="text-transform: uppercase"
                                                        placeholder="Código" required readonly
                                                        class="form-control mayusculas" type="text"> <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label style="width: 100%" class="control-label col-md-6">Producto</label>
                                            <div class="col-md-12">
                                            <select style="height:35px;" class="form-control" id="producto_id">
                                                <?php foreach($productos as $producto):?>
                                                    <option value="<?php echo $producto->producto_id?>"><?php echo $producto->producto_nombre;?></option>
                                                <?php endforeach;?>
                                            </select> <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label style="width: 100%" class="control-label col-md-6">Fecha de Inicio</label>
                                            <div class="col-md-12">
                                                <input type="date" class="form-control" id="produccion_inicio" name="produccion_inicio" value="<?php echo date("Y-m-d");?>"><span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label style="width: 100%" class="control-label col-md-6">Fecha de Fin</label>
                                            <div class="col-md-12">
                                                <input type="date" class="form-control" id="produccion_fin" name="produccion_fin" value="<?php echo date("Y-m-d");?>"><span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div> 

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label style="width: 100%" class="control-label col-md-6">Cantidad</label>
                                            <div class="col-md-12">
                                                <input id="produccion_cantidad" style="text-transform: uppercase"
                                                        placeholder="CANTIDAD" required 
                                                        class="form-control mayusculas" type="text"> <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label style="width: 100%" class="control-label col-md-6">Estado</label>
                                            <div class="col-md-12">
                                                <select style="height:35px;" id="estado_id" class="form-control">
                                                    <option value="1">Activo</option>
                                                    <option value="0">Inactivo</option>
                                                </select> <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                <br>
                                <div class="row">
                                    <button type="button" id="boton_multiuso"
                                            class="btn btn-primary btn-sm" ><i class="fa fa-check"></i>&nbsp;GUARDAR</button>
                                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;CANCELAR</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- ====================================================================================================== -->                                  




    </div>