
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
                                <h4 class="card-title">Registro de empleados</h4>                                
                            </div>                           
                        </div>                       
                        <p></p>                       
                        <!-- Step 1 -->                         
                        <div class="row" >
                            <div class="col-md-12">                                        
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal_insertar"><i class="mdi mdi-plus"></i> Nuevo</button>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Empresas</h4>                                        
                                <div class="table-responsive m-t-40">
                                    <table id="empresa_table" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>nro</th>
                                                <th>Nombre</th>
                                                <th>CI</th>
                                                <th>Fecha de nacimiento</th>
                                                <th>incorporacion</th>                                              
                                                <th>cargo</th>                                              
                                                <th>unidad</th>                                              
                                                <th>Estado</th>          
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1;?>
                                            <?php foreach ($data_table_personas as $row) { ?>
                                                <tr>
                                                    <td><?php echo $i++; ?></td>
                                                    <td><?php echo $row->nombres." ".$row->paterno." ".$row->materno; ?></td>   
                                                    <td><?php echo $row->ci; ?></td> 
                                                    <td><?php echo $row->fec_nacimiento; ?></td>                                                        
                                                    <td><?php echo $row->fec_incorporacion; ?></td>   
                                                    <td><?php echo $row->descripcion; ?></td>   
                                                    <td><?php echo $row->nombre_unidad; ?></td>  
                                                    <td>                                           
                                                        <?php if (($row->activo)==1):?>
                                                            <button type="button" class="btn btn-success">Activo</button>
                                                        <?php endif ?>
                                                        <?php if (($row->activo)==0):?>
                                                            <button type="button" class="btn btn-danger">Inactivo</button>
                                                        <?php endif ?>
                                                    </td>                                                                                                          
                                                    <td>


                                                        <a href="<?php echo site_url('personas/edit'); ?>/<?php echo $row->persona_id; ?>"><button type="button" class="btn btn-warning"><span class="fas fa-edit" aria-hidden="true"></span></button></a>                                                          

                                                        <?php if (($row->activo)==1):?>
                                                            <a href="<?php echo site_url('personas/delete'); ?>/<?php echo $row->persona_id; ?>"><button type="button" class="btn btn-danger"><span class="fas fa-arrow-alt-circle-down" aria-hidden="true"></span> Dar de Baja</button></a>                                                          
                                                        <?php endif ?>
                                                        <?php if (($row->activo)==0):?>
                                                            <a href="<?php echo site_url('personas/delete'); ?>/<?php echo $row->persona_id; ?>"><button type="button" class="btn btn-success"><span class="fas fa-arrow-alt-circle-up" aria-hidden="true"></span> Dar de Alta</button></a>                                                          
                                                        <?php endif ?>
                                                        
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
                                    <h4 class="modal-title" id="exampleModalLabel1">Agregar Empleado</h4>
                                </div>
                                <div class="modal-body">
                                    <!--<form action="<?php echo base_url();?>zona_urbana/insertar" method="POST">-->
                                        <?php echo form_open('personas/create', array('method'=>'POST', 'id'=>'insertar')); ?>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="recipient-name" class="control-label">Nombres:</label>
                                                    <input type="text" class="form-control" id="nombres" name="nombres" required="">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="recipient-name" class="control-label">Apellido Paterno:</label>
                                                    <input type="text" class="form-control" id="paterno" name="paterno" required="">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="recipient-name" class="control-label">Apellido Materno:</label>
                                                    <input type="text" class="form-control" id="materno" name="materno" required="">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="recipient-name" class="control-label">Carnet de identidad:</label>
                                                    <input type="number" class="form-control" id="ci" name="ci" required="">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="validationCustom01">Direccion:</label>
                                                    <input type="text" class="form-control" id="direccion" name="direccion" required="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="validationCustom01">Telefono:</label>
                                                    <input type="number" class="form-control" id="telefono" name="telefono" required="">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="validationCustom01">Fecha de Nacimiento</label>
                                                    <input type="date" class="form-control" id="fecha_nacimiento" placeholder="" name="fecha_nacimiento" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="validationCustom01">Fecha de incorporacion</label>
                                                    <input type="date" class="form-control" id="fecha_incorporacion" placeholder="" name="fecha_incorporacion" required>                                            
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="location1">Unidad :<span class="text-danger"> *</span></label>
                                                    <select class="custom-select form-control" id="unidad_id" name="unidad_id">
                                                        <option value="">Seleccione Unidad</option>
                                                        <?php foreach ($data_table_unidad as $tp) : ?>
                                                            <option value="<?php echo $tp->unidad_id; ?>"><?php echo $tp->nombre_unidad; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="location1">Cargo :<span class="text-danger"> *</span></label>
                                                    <select class="custom-select form-control" id="cargo_id" name="cargo_id">
                                                        <option value="">Seleccione Cargo</option>
                                                        <?php foreach ($data_table_cargo as $tp) : ?>
                                                            <option value="<?php echo $tp->cargo_id; ?>"><?php echo $tp->descripcion; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
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


