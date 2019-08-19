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
                                <h4 class="card-title">Reporte Semanal</h4>                                
                            </div>                           
                        </div>                       
                        <p></p>                       
                        <!-- Step 1 -->                         
                      
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">...</h4>                                        
                                        <div class="row">
                                   
                                    
                                      
                                          


                                    <?php echo form_open('historial/pdf_semana', array('method'=>'POST')); ?>                                       
                                <div class="row">
                                   
                                    
                                      
                                <div class="col-md-4">
                                           <div class="form-group">
                                <label for="recipient-name" class="control-label">Fecha Inicial</label>
                                <input type="date" class="form-control" id="fecha_ini" name="fecha_ini">
                                             </div>
                                    </div>

                                                  <div class="col-md-4">
                                           <div class="form-group">
                                <label for="recipient-name" class="control-label">Fecha Final</label>
                                <input type="date" class="form-control" id="fecha_fin" name="fecha_fin">
                                             </div>
                                    </div>

                                 
                                </div>    
                                
                               
                               
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary">Visualizar</button>
                                </div>

                            </form>

                                 
                                </div>                               
                        </div>
                    </div>
                </div>

                <div class="modal fade bs-example-modal-lg" id="modal_insertar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="exampleModalLabel1">Agregar</h4>
                            </div>
                            <div class="modal-body">
                                <?php echo form_open('historial/create', array('method'=>'POST')); ?>                                       
                                <div class="row">
                                   
                                    
                                      
                                            <div class="col-md-4">
                                           <div class="form-group">
                                <label for="recipient-name" class="control-label">Fecha</label>
                                <input type="date" class="form-control" id="fecha" name="fecha">
                                             </div>
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
            </div><!--aaa-->
                

                <div class="modal fade bs-example-modal-lg" id="modalEdicion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="exampleModalLabel1">Agregar</h4>
                            </div>
                            <div class="modal-body">
                                <?php echo form_open('historial/update', array('method'=>'POST')); ?>  

                                      <input type="hidden" class="form-control" id="id_historial_e" name="id_historial_e" required="">
                                 <div class="row">
                                    <div class="col-md-4">
                                      
                                            <div class="form-group">
                                              <label for="recipient-name" class="control-label">Doctor:</label>
                                <select class="select2" style="width: 100%" name="id_doctor_e" id="id_doctor_e">
                                    <option>Seleccionar Doctor</option>
                                    <?php foreach($doctores as $dlista){ ?>
                                        <option value="<?php echo $dlista->id_doctor; ?>"><?php echo $dlista->nombre.' '. $dlista->ap_paterno.' '. $dlista->ap_materno; ?></option>
                                    <?php } ?>
                                </select>
                                                  
                                      
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                            <div class="form-group">
                                              <label for="recipient-name" class="control-label">Paciente:</label>
                                <select class="select2" style="width: 100%" name="id_paciente_e" id="id_paciente_e">
                                    <option>Seleccionar Paciente</option>
                                    <?php foreach($pacientes as $plista){ ?>
                                        <option value="<?php echo $plista->id_paciente; ?>"><?php echo $plista->nombre.' '. $plista->ap_paterno.' '. $plista->ap_materno; ?></option>
                                    <?php } ?>
                                </select>
                                                  
                                      
                                        </div>                                              
                                    </div>
                                      
                                            <div class="col-md-4">
                                           <div class="form-group">
                                <label for="recipient-name" class="control-label">Fecha</label>
                                <input type="date" class="form-control" id="fecha_e" name="fecha_e">
                                             </div>
                                    </div>

                                 
                                </div>    
                                <div class="row">                                   
                                    <div class="col-md-2">
                                         <div class="form-group">
                                                   <label for="recipient-name" class="control-label">Costo: BS. </label>
                                                    <input type="number" class="form-control" id="costo_e" name="costo_e" required="">
                                      
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                         <div class="form-group">
                                                   <label for="recipient-name" class="control-label">A cuenta: BS. </label>
                                                    <input type="number" class="form-control" id="acuenta_e" name="acuenta_e" required="">
                                      
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                         <div class="form-group">
                                                   <label for="recipient-name" class="control-label">Saldo: BS. </label>
                                                    <input type="number" class="form-control" id="saldo_e" name="saldo_e" required="">
                                      
                                        </div>
                                    </div>
                                     </div>    
                                <div class="row"> 
                                     <div class="col-md-4">
                                         <div class="form-group">
                                                   <label for="recipient-name" class="control-label">Diagnostico:</label>
                                                
                                                    <textarea class="form-control" rows="8" id="diagnostico_e" name="diagnostico_e" required=""></textarea>
                                      
                                        </div>
                                    </div>
                                     <div class="col-md-4">
                                         <div class="form-group">
                                                   <label for="recipient-name" class="control-label">Tratamiento:</label>
                                                    <textarea class="form-control" rows="8" id="tratamiento_e" name="tratamiento_e" required=""></textarea>
                                      
                                        </div>
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
<script src="<?php echo base_url(); ?>public/assets/plugins/jquery/jquery.min.js"></script>
<script>
    function agregarform(datos)
    {
       d=datos.split('||');
       $('#id_historial_e').val(d[0]);
       $('#id_doctor_e').val(d[1]);
       $('#id_paciente_e').val(d[2]);
        $('#fecha_e').val(d[3]);
       $('#costo_e').val(d[4]);
      
       $('#diagnostico_e').val(d[5]);
       $('#tratamiento_e').val(d[6]);
       $('#acuenta_e').val(d[7]);
       $('#saldo_e').val(d[8]);
    

   }
</script>
