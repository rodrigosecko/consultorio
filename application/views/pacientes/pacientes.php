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
                                <h4 class="card-title">Registro de Pacientes</h4>                                
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
                                                <th>Nombre</th> 
                                                <th>Paterno</th> 
                                                <th>Materno</th>
                                                <th>C.I.</th>
                                                <th>Telefono</th>
                                                <th>Direccion</th>
                                                <th>fecha_nacimiento</th>
                                      
                                               
                                                                                                                          
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1;?>
                                            <?php foreach ($data_table_pacientes as $row) {

                                                $datos = $row->id_paciente."||".
                                               $row->nombre."||".
                                               $row->ap_paterno."||".
                                               $row->ap_materno."||".
                                               $row->ci."||".
                                               $row->telefono."||".
                                               $row->direccion."||".
                                               $row->fecha_nac;
                                                ?>
                                                <tr>
                                                    <td><?php echo $i++; ?></td>
                                                    <td><?php echo $row->nombre; ?></td>
                                                    <td><?php echo $row->ap_paterno; ?></td>                                                      
                                                    <td><?php echo $row->ap_materno; ?></td> 
                                                    <td><?php echo $row->ci; ?></td> 
                                                    <td><?php echo $row->telefono; ?></td> 
                                                    <td><?php echo $row->direccion; ?></td> 
                                                    <td><?php echo $row->fecha_nac; ?></td>          
                                                   
                                                   <td>
                                              

                                                       <button  type="button" class="btn btn-warning footable-edit" data-toggle="modal" data-target="#modalEdicion" onclick="agregarform('<?php echo $datos ?>')">
                                                        <span class="fas fas fa-edit" aria-hidden="true">
                                                        </span>
                                                    </button>
                         
                                                         
                                                        <a href="<?php echo site_url('pacientes/delete'); ?>/<?php echo $row->id_paciente; ?>"><span class="far fa-trash-alt" aria-hidden="true" style="color:#82b94a"></span> </a>
                                                 


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
                                <?php echo form_open('pacientes/create', array('method'=>'POST')); ?>                                       
                                <div class="row">
                                    <div class="col-md-4">
                                      
                                        <div class="form-group">
                                                   <label for="recipient-name" class="control-label">Nombre:</label>
                                                    <input type="text" class="form-control" id="nombre" name="nombre" required="">
                                      
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="form-group">
                                                   <label for="recipient-name" class="control-label">Apellido Paterno:</label>
                                                    <input type="text" class="form-control" id="ap_paterno" name="ap_paterno" required="">
                                        </div>                                                
                                    </div>
                                      <div class="col-md-4">
                                         <div class="form-group">
                                                   <label for="recipient-name" class="control-label">Apellido Materno:</label>
                                                    <input type="text" class="form-control" id="ap_materno" name="ap_materno" required="">
                                      
                                        </div>

                                    </div>
                                </div>    
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                                   <label for="recipient-name" class="control-label">C.I.:</label>
                                                    <input type="text" class="form-control" id="ci" name="ci" required="">
                                      
                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="recipient-name" class="control-label">Telefono:</label>
                                            <input type="text" class="form-control" id="telefono" name="telefono" required="">
                                        </div>                                                
                                    </div>
                                    <div class="col-md-4">
                                         <div class="form-group">
                                                   <label for="recipient-name" class="control-label">Direccion:</label>
                                                    <input type="text" class="form-control" id="direccion" name="direccion" required="">
                                      
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                           <div class="form-group">
                                <label for="recipient-name" class="control-label">Fecha de Nacimiento</label>
                                <input type="date" class="form-control" id="fecha_nac" name="fecha_nac">
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
                                <?php echo form_open('pacientes/update', array('method'=>'POST')); ?>                                       
                                <div class="row">
                                      <input type="hidden" class="form-control" id="id_paciente_e" name="id_paciente_e" required="">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                                   <label for="recipient-name" class="control-label">Nombre:</label>
                                                    <input type="text" class="form-control" id="nombre_e" name="nombre_e" required="">
                                      
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="form-group">
                                                   <label for="recipient-name" class="control-label">Apellido Paterno:</label>
                                                    <input type="text" class="form-control" id="ap_paterno_e" name="ap_paterno_e" required="">
                                        </div>                                                
                                    </div>
                                      <div class="col-md-4">
                                         <div class="form-group">
                                                   <label for="recipient-name" class="control-label">Apellido Materno:</label>
                                                    <input type="text" class="form-control" id="ap_materno_e" name="ap_materno_e" required="">
                                      
                                        </div>

                                    </div>
                                </div>    
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                                   <label for="recipient-name" class="control-label">C.I.:</label>
                                                    <input type="text" class="form-control" id="ci_e" name="ci_e" required="">
                                      
                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="recipient-name" class="control-label">Telefono:</label>
                                            <input type="text" class="form-control" id="telefono_e" name="telefono_e" required="">
                                        </div>                                                
                                    </div>
                                    <div class="col-md-4">
                                         <div class="form-group">
                                                   <label for="recipient-name" class="control-label">Direccion:</label>
                                                    <input type="text" class="form-control" id="direccion_e" name="direccion_e" required="">
                                      
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                           <div class="form-group">
                                <label for="recipient-name" class="control-label">Fecha de Nacimiento</label>
                                <input type="date" class="form-control" id="fec_nac_e" name="fec_nac_e">
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
       $('#id_paciente_e').val(d[0]);
       $('#nombre_e').val(d[1]);
       $('#ap_paterno_e').val(d[2]);
       $('#ap_materno_e').val(d[3]);
       $('#ci_e').val(d[4]);
       $('#telefono_e').val(d[5]);
       $('#direccion_e').val(d[6]);
       $('#fec_nac_e').val(d[7]);

   }
</script>
