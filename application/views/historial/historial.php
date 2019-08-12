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
                                <h4 class="card-title">Registro de Consultar</h4>                                
                            </div>                           
                        </div>                       
                        <p></p>                       
                        <!-- Step 1 -->                         
                        <div class="row" >
                            <div class="col-md-2"> 

                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal_insertar"><i class="mdi mdi-plus"></i> Agregar</button>
                            </div>
                       
                         
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Activos</h4>                                        
                                <div class="table-responsive m-t-40">
                                    <table id="auxiliar_table" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Nro</th>
                                                <th>Doctor</th> 
                                                <th>Paciente</th> 
                                                <th>fecha</th> 
                                                <th>costo</th>                                        
                                                <th>Diagnostico</th>
                                                <th>Tratamiento</th>                                               
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1;?>
                                            <?php foreach ($data_table_consultas as $row) {

                                                $datos = $row->id_historial."||".
                                               $row->id_doctor."||".
                                               $row->id_paciente."||".
                                                $row->fecha."||".
                                               $row->costo."||".                                              
                                               $row->diagnostico."||".
                                               $row->tratamiento;
                                                ?>
                                                <tr>
                                                    <td><?php echo $i++; ?></td>                                                   
                                                    <td><?php echo $row->doctor; ?></td>                                              
                                                    <td><?php echo $row->paciente; ?></td> 
                                                     <td><?php echo $row->fecha; ?></td> 
                                                    <td><?php echo $row->costo; ?></td>                
                                                    <td><?php echo $row->diagnostico; ?></td> 
                                                    <td><?php echo $row->tratamiento; ?></td> 
                                                         
                                                   
                                                   <td>
                                              

                                                       <button  type="button" class="btn btn-warning footable-edit" data-toggle="modal" data-target="#modalEdicion" onclick="agregarform('<?php echo $datos ?>')">
                                                        <span class="fas fas fa-edit" aria-hidden="true">
                                                        </span>
                                                    </button>
                         
                                                         
                                                        <a href="<?php echo site_url('historial/delete'); ?>/<?php echo $row->id_historial; ?>"><span class="far fa-trash-alt" aria-hidden="true" style="color:#82b94a"></span> </a>
                                                         <a href="<?php echo site_url('historial/pdf_recibo'); ?>/<?php echo $row->id_historial  ?>" target="_blank"><span class=" fas fa-file-pdf " aria-hidden="true" style="color:red"></span></a> 
                                                 


                                                </td>
                                            </tr>
                                            <?php 
                                        } ?>
                                    </tbody>
                                </table>
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
                                              <label for="recipient-name" class="control-label">Doctor:</label>
                                <select class="select2" style="width: 100%" name="id_doctor" id="id_doctor">
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
                                <select class="select2" style="width: 100%" name="id_paciente" id="id_paciente">
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
                                <input type="date" class="form-control" id="fecha" name="fecha">
                                             </div>
                                    </div>

                                 
                                </div>    
                                <div class="row">                                   
                                    <div class="col-md-2">
                                         <div class="form-group">
                                                   <label for="recipient-name" class="control-label">Costo: BS. </label>
                                                    <input type="number" class="form-control" id="costo" name="costo" required="">
                                      
                                        </div>
                                    </div>
                                     <div class="col-md-4">
                                         <div class="form-group">
                                                   <label for="recipient-name" class="control-label">Diagnostico:</label>
                                                
                                                    <textarea class="form-control" rows="8" id="diagnostico" name="diagnostico" required=""></textarea>
                                      
                                        </div>
                                    </div>
                                     <div class="col-md-4">
                                         <div class="form-group">
                                                   <label for="recipient-name" class="control-label">Tratamiento:</label>
                                                    <textarea class="form-control" rows="8" id="tratamiento" name="tratamiento" required=""></textarea>
                                      
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                                                 
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
    

   }
</script>
