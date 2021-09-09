<h3 class="page-header" style="color:#086788";><b>Cambio de contraseña</b></h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-body">
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-12">
                                <div class="box box-default">
                                    <div class="box-body">
                                        
                                        <input type="hidden" class="form-control" id="usuario_cambio" value="<?php echo $this->session->userdata('usuario_id')?>">

                                        <div class="col-md-12">                            
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label style="width: 100%" class="control-label col-md-6">Nueva contraseña</label>
                                                        <div class="col-md-12">
                                                            <input id="clave_nueva" style="text-transform: uppercase"
                                                                    placeholder="nueva contraseña" required autocomplete="off"
                                                                    class="form-control" type="password"> <span class="help-block"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-7">
                                                </div>
                                            </div> 
                                        </div>
                                        <div class="col-md-12">                            
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label style="width: 100%" class="control-label col-md-6">Vuelva a escribir la contraseña</label>
                                                        <div class="col-md-12">
                                                            <input id="clave_nueva_1" style="text-transform: uppercase"
                                                                    placeholder="nueva contraseña" required autocomplete="off"
                                                                    class="form-control" type="password"> <span class="help-block"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-7">
                                                </div>
                                            </div> 
                                        </div>
                                        <div class="col-md-12">                            
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                    <br>
                                                        <div class="col-md-12">
                                                            <button type="button" id="boton_contraseña" onclick="configuracion_usuario();" class="btn btn-success"><i class="fa fa-refresh"></i>&nbsp&nbspActualizar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-7">
                                                </div>
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>   
                </div>    
            </div>
        </div>
    </div>


