<link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/plugins/dropify/dist/css/dropify.min.css">
<link href="<?php echo base_url(); ?>public/assets/plugins/Magnific-Popup-master/dist/magnific-popup.css" rel="stylesheet">
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-12">
                <div class="card wizard-content">
                    <div class="card-body">
                        <div class="row page-titles">
                            <div class="col-md-6 col-8 align-self-center">
                                <h4 class="card-title">Inventario de Activos</h4>                                
                            </div>                           
                        </div>                       
                        <p></p>                       
                        <!-- Step 1 -->     
                      <?php echo form_open('activos/reporte_anio'); ?> 
                        <div class="row" >
                           

                             <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="location1">Gestion<span class="text-danger"> *</span></label>
                                            <select class="custom-select form-control" id="gestion" name="gestion" required>
                                                <option value="2015">2015</option>
                                                <option value="2016">2016</option>
                                                <option value="2017">2017</option>
                                                <option value="2018">2018</option>     
                                                <option value="2019">2019</option>     
                                            </select>
                                        </div>
                                    </div>
                            <p>
                        
                         
                        </div>
                        <div class="row">
                        	  <div class="col-md-6">
                                    
                                    <button type="submit" class="btn btn-success">Generar Reporte</button>
                                </div>
                        </div>

                                   

                            </form>
           


                </div>

                <div class="modal fade bs-example-modal-lg" id="modal_insertar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="exampleModalLabel1">Agregar Activos</h4>
                            </div>
                            <div class="modal-body">

                                <!--<?php echo form_open('activos/create'); ?>-->

                                <?php echo form_open_multipart('activos/do_upload'); ?>                                       
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="location1">Grupo :<span class="text-danger"> *</span></label>
                                            <select class="custom-select form-control" id="grupo_id" name="grupo_id">
                                                <option value="">Seleccione Grupo</option>
                                                <?php foreach ($data_table_grupo as $tp) : ?>
                                                    <option value="<?php echo $tp->grupo_id; ?>"><?php echo $tp->nombre; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="location1">Auxiliar :<span class="text-danger"> *</span></label>
                                            <select class="custom-select form-control" id="auxiliar_id" name="auxiliar_id">
                                                <option value="">Seleccione Grupo</option>
                                                <?php foreach ($data_table_auxiliar as $tp) : ?>
                                                    <option value="<?php echo $tp->auxiliar_id; ?>"><?php echo $tp->nombre; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>                                                
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">

                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="recipient-name" class="control-label">Descripcion A.F.:</label>
                                    <input type="text" class="form-control" id="descripcion" name="descripcion" required="">
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="validationCustom01">Fecha de Compra</label>
                                            <input type="date" class="form-control" id="validationCustom01" placeholder="Fecha de Nacimiento" name="fecha" required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="recipient-name" class="control-label">Costo Bs.:</label>
                                            <input type="text" class="form-control" id="costo" name="costo" required="">
                                        </div>                                                
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="location1">Estado del bien :<span class="text-danger"> *</span></label>
                                            <select class="custom-select form-control" id="estado" name="estado" required>
                                                <option value="">Seleccione estado</option>
                                                <?php foreach ($data_table_estado as $d) : ?>
                                                    <option value="<?php echo $d->estado_id; ?>"><?php echo $d->descripcion; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" class="form-control" id="opcion" name="opcion" value="1">



                                <div class="form-group">
                                    <label for="recipient-name" class="control-label">Observaciones:</label>
                                    <input type="text" class="form-control" id="observaciones" name="observaciones" required="">
                                </div>

                                <div class="form-group">
                                    <div class="card">
                                        <label for="recipient-name" class="control-label">Foto</label>
                                        <label for="input-file-now">

                                            <i class="fas fa-exclamation" style="color:red"> </i>                                            
                                            Solo se admite archivos jpg
                                        </label>

                                        <input type="file" id="input-file-now" class="dropify" name="foto_org" data-allowed-file-extensions='["jpg"]' required />
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>

                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<!-- ============================================================== --> 

