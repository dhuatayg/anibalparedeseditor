<h3 class="page-header" style="color:#086788";><b>Nivel de Productividad</b></h3>
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
                                                    <label class="control-label col-md-5">Fecha Inicio</label>
                                                    <div class="col-md-7">
                                                        <input type="date" class="form-control" id="inicio_busqueda" name="inicio_busqueda" value="<?php echo date("Y-m-d");?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <div class="form-horizontal">
                                                <div class="form-group">
                                                    <label class="control-label col-md-5">Fecha Fin</label>
                                                    <div class="col-md-7">
                                                        <input type="date" class="form-control" id="fin_busqueda" name="fin_busqueda" value="<?php echo date("Y-m-d");?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-1">
                                        </div>
                                        <div class="form-group col-md-5">
                                            <div class="btn-group" role="group" aria-label="First group">                                          
                                                <button type="button" id="busqueda_productividad" class="btn btn-primary btn-sm"><strong>BUSQUEDA&nbsp;&nbsp;&nbsp;</strong><span class="fa fa-search"></span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                        <hr>
                        <div class="box-body">
                            <div class="row">
                                <!-- Div Gráfico -->
                                <div class="col-md-12">              
                                    <div id="dproductividad" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                                </div>
                                <!-- Div Indicador -->
                                <div class="row" id="div_resultado_productividad">
                                    <div align="center" class="col-md-12">
                                        <div class="form-group">
                                            <h4>En el grafico durante la fecha <strong id="f_ini"></strong> al <strong id="f_fin"></strong> el Nivel de Productividad obtenido es <strong id="n_pro"></strong> %</h4>
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