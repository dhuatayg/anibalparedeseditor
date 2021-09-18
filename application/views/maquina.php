<h3 class="page-header" style="color:#086788" ;><b>Maquina</b></h3>
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
                                            <label class="control-label col-md-5">Código</label>
                                            <div class="col-md-7">
                                                <input id="busqueda_codigo" data-column="1" placeholder="Busqueda código" required class="search-input-text form-control mayusculas" style="text-transform: uppercase;" type="text"> <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <div class="form-horizontal">
                                        <div class="form-group">
                                            <label class="control-label col-md-5">Nombre</label>
                                            <div class="col-md-7">
                                                <input id="busqueda_nombre" data-column="2" placeholder="Busqueda nombre" required class="search-input-text form-control mayusculas" style="text-transform: uppercase;" type="text"> <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-1">
                                </div>
                                <div class="form-group col-md-5">
                                    <div class="btn-group" role="group" aria-label="First group">
                                        <button id="btn_nuevo" type="button" class="btn btn-primary btn-sm" onclick="nuevo_maquina()"><strong>NUEVA MAQUINA&nbsp;&nbsp;&nbsp;</strong><span class="fa fa-plus-circle"></span></button>
                                        <button id="btn_excel" type="button" class="btn btn-success btn-sm"><strong>REPORTE EN EXCEL&nbsp;&nbsp;&nbsp;</strong><span class="fa fa-file-excel-o"></span></button>
                                        <button id="btn_pdf" type="button" class="btn btn-danger btn-sm"><strong>REPORTE EN PDF&nbsp;&nbsp;&nbsp;</strong><span class="fa fa-file-pdf-o"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <?php $num = 0; ?>
                <table id="tabla" class="table table-hover table-condensed table-striped" style="width: 100%; cellspacing: 0">
                    <thead>
                        <tr>
                            <th class="text-center" style="vertical-align: middle;">N°</th>
                            <th class="text-center" style="vertical-align: middle;">Código</th>
                            <th class="text-center" style="vertical-align: middle;">Máquina</th>
                            <th class="text-center" style="vertical-align: middle;">Descripción</th>
                            <th class="text-center" style="vertical-align: middle;">Cantidad</th>
                            <th class="text-center" style="vertical-align: middle;">Estado</th>
                            <th class="text-center" style="vertical-align: middle;">Acción</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php if (!empty($entidades)) :   ?>
                            <?php foreach ($entidades as $entidad) : ?>
                                <?php $num++;  ?>
                                <tr>
                                    <td class="text-center" style="vertical-align: middle;"><?php echo $num; ?></td>
                                    <td class="text-center" style="vertical-align: middle;"><?php echo $entidad->maquina_codigo; ?></td>
                                    <td class="text-center" style="vertical-align: middle;"><?php echo $entidad->maquina_nombre; ?></td>
                                    <td class="text-center" style="vertical-align: middle;"><?php echo $entidad->maquina_descripcion; ?></td>
                                    <td class="text-center" style="vertical-align: middle;"><?php echo $entidad->maquina_cantidad; ?></td>
                                    <?php switch ($entidad->estado_id) {
                                        case 1:
                                    ?>
                                            <td class="text-center" style="vertical-align: middle;"><span class="label label-success">ACTIVO</span></td>
                                        <?php
                                            break;
                                        case 2:
                                        ?>
                                            <td class="text-center" style="vertical-align: middle;"><span class="label label-danger">INACTIVO</span></td>
                                    <?php
                                            break;
                                    }
                                    ?>
                                    <td class="text-center" style="vertical-align: middle;"><a onclick="cambiar_maquina(<?php echo $entidad->maquina_id; ?>)"><i class="fa fa-pencil fa-2x"></i></a>&nbsp;&nbsp;&nbsp;<a onclick="quitar_maquina(<?php echo $entidad->maquina_id; ?>)"><i class="fa fa-trash fa-2x"></i></a></td>
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

<div class="modal fade" id="modal_maquina" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                                        <input id="maquina_codigo" style="text-transform: uppercase" placeholder="Código" required readonly class="form-control mayusculas" type="text"> <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label style="width: 100%" class="control-label col-md-6">Nombre</label>
                                    <div class="col-md-12">
                                        <input id="maquina_nombre" style="text-transform: uppercase" placeholder="Nombre" required class="form-control mayusculas" type="text"> <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label style="width: 100%" class="control-label col-md-6">Descripción</label>
                                    <div class="col-md-12">
                                        <textarea id="maquina_descripcion" style="text-transform: uppercase" placeholder="Descripcion" required class="form-control mayusculas" type="text"> </textarea><span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label style="width: 100%" class="control-label col-md-6">Cantidad</label>
                                    <div class="col-md-12">
                                        <input id="maquina_cantidad" style="text-transform: uppercase" placeholder="Cantidad" required class="form-control mayusculas" type="number" min="1" pattern="^[0-9]+"> <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="width: 100%" class="control-label col-md-6">Area</label>
                                        <div class="col-md-12">
                                            <select style="height:35px;" class="form-control" id="area_id">
                                                <?php foreach ($areas as $area) : ?>
                                                    <option value="<?php echo $area->area_id ?>"><?php echo $area->area_nombre; ?></option>
                                                <?php endforeach; ?>
                                            </select> <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label style="width: 100%" class="control-label col-md-6">Estado</label>
                                    <div class="col-md-12">
                                        <select style="height:35px;" id="estado_id" class="form-control">
                                            <option value="1">ACTIVO</option>
                                            <option value="2">INACTIVO</option>
                                        </select> <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <button type="button" id="boton_multiuso" class="btn btn-primary btn-sm"><i class="fa fa-check"></i>&nbsp;GUARDAR</button>
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