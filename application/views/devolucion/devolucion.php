
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
                                <h4 class="card-title">Devolucion de Activos</h4>                                
                            </div>                           
                        </div>                       
                        <p></p>                       
                        <!-- Step 1 -->                         
                        
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Activos</h4>                                        
                                <div class="table-responsive m-t-40">
                                    <table id="auxiliar_table" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Nro</th>
                                                <th>Fecha</th> 
                                                <th>Activo</th> 
                                                <th>Empleado</th>
                                                <th>Imagen</th> 
                                                <th>Asignado</th>                                                     
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1;?>
                                            <?php foreach ($data_table_asign as $row) { ?>
                                                <tr>
                                                    <td><?php echo $i++; ?></td>
                                                    <td><?php echo $row->fecha_asign; ?></td>
                                                    <td><?php echo $row->descripcion; ?></td>                       
                                                    <td><?php echo $row->nombres." ".$row->paterno." ".$row->materno; ?></td>
                                                      <td>
                                                        <div class="row el-element-overlay" >
                                                             
                                                                <div class="col-lg-5 col-md-6" >
                                                                    
                                                                        <div class="el-card-item">
                                                                            <div class="el-card-avatar el-overlay-1"> <img src="<?php echo base_url(); ?><?php echo $row->url; ?>/<?php echo $row->imagen; ?>" alt="user" height="100px" width="100px"/>
                                                                                <div class="el-overlay">
                                                                                    <ul class="el-info">
                                                                                        <li><a class="btn default btn-outline image-popup-vertical-fit" href="<?php echo base_url(); ?><?php echo $row->url; ?>/<?php echo $row->imagen; ?>"><i class="icon-magnifier"></i></a></li>
                                                                                        
                                                                                    </ul>
                                                                                </div>
                                                                            </div>                                                                          
                                                                        </div>
                                                                    </div>
                                                         </div> 
                                                        </td>                                                            
                                                    <td>                                           
                                                        <?php if (($row->activo)==1):?>
                                                            <button type="button" class="btn btn-success">SI</button>
                                                        <?php endif ?>
                                                        <?php if (($row->activo)==0):?>
                                                            <button type="button" class="btn btn-danger">NO</button>
                                                        <?php endif ?>
                                                    </td>                                                                                                          
                                                    <td>            
                                                            <a href="<?php echo site_url('Devolucion/edit'); ?>/<?php echo $row->asignacion_id; ?>"><button type="button" class="btn btn-danger"><span class="fas fa-arrow-alt-circle-down" aria-hidden="true"></span> Desvincular</button></a>
                                                      
                                                       
                                                        
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
                                    <h4 class="modal-title" id="exampleModalLabel1">Asignar Activo</h4>
                                </div>
                                <div class="modal-body">
                                    <!--<form action="<?php echo base_url();?>zona_urbana/insertar" method="POST">-->
                                        <?php echo form_open('asignacion/create'); ?>                                       
                                        <div class="form-group">
                                            <label for="location1">Empleado :<span class="text-danger"> *</span></label>
                                            <select class="custom-select form-control" id="empleado" name="empleado">
                                                <option value="">Seleccione Grupo</option>
                                                <?php foreach ($data_table_persona as $tp) : ?>
                                                    <option value="<?php echo $tp->persona_id; ?>"><?php echo $tp->nombres." ".$tp->paterno." ".$tp->materno; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="location1">Activo :<span class="text-danger"> *</span></label>
                                            <select class="custom-select form-control" id="activo_id" name="activo_id">
                                                <option value="">Seleccione Grupo</option>
                                                <?php foreach ($data_table_activo as $tp) : ?>
                                                    <option value="<?php echo $tp->activo_id; ?>"><?php echo $tp->descripcion; ?></option>
                                                <?php endforeach; ?>
                                            </select>
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


