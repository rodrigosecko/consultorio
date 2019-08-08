
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
                                <h4 class="card-title">Datos Empresa</h4>                                
                            </div>                           
                        </div>                       
                        <p></p>                       

                        <?php echo form_open('personas/update', array('method'=>'POST', 'id'=>'insertar')); ?>

                                      

                                      <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="recipient-name" class="control-label">Nombres:</label>
                                                    <input type="hidden" class="form-control" id="persona_id" name="persona_id" value="<?php echo $row->persona_id; ?>">
                                                    <input type="text" class="form-control" id="nombres" name="nombres" required="" value="<?php echo $row->nombres; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="recipient-name" class="control-label">Apellido Paterno:</label>
                                                    <input type="text" class="form-control" id="paterno" name="paterno" required="" value="<?php echo $row->paterno; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="recipient-name" class="control-label">Apellido Materno:</label>
                                                    <input type="text" class="form-control" id="materno" name="materno" required="" value="<?php echo $row->materno; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="recipient-name" class="control-label">Carnet de identidad:</label>
                                                    <input type="number" class="form-control" id="ci" name="ci" required="" value="<?php echo $row->ci; ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="validationCustom01">Direccion:</label>
                                                    <input type="text" class="form-control" id="direccion" name="direccion" required="" value="<?php echo $row->direccion; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="validationCustom01">Telefono:</label>
                                                    <input type="number" class="form-control" id="telefono" name="telefono" required="" value="<?php echo $row->telefono; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="validationCustom01">Fecha de Nacimiento</label>
                                                    <input type="date" class="form-control" id="fecha_nacimiento" required placeholder="" name="fecha_nacimiento"  value="<?php echo $row->fec_nacimiento; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="validationCustom01">Fecha de incorporacion</label>
                                                    <input type="date" class="form-control" id="fecha_incorporacion" placeholder="" name="fecha_incorporacion" required value="<?php echo $row->fec_incorporacion; ?>">                                            
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="location1">Unidad :<span class="text-danger"> *</span></label>
                                                    <select class="custom-select form-control" id="unidad_id" name="unidad_id">
                                                        <option value="<?php echo $row->unidad_id; ?>" selected><?php echo $row->nombre_unidad; ?></option>                                                       
                                                        <?php foreach ($data_table_unidad as $tp) : ?>
                                                            <?php if (($row->unidad_id) != $tp->unidad_id): ?>
                                                            <option value="<?php echo $tp->unidad_id; ?>"><?php echo $tp->nombre_unidad; ?></option>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="location1">Cargo :<span class="text-danger"> *</span></label>
                                                    <select class="custom-select form-control" id="cargo_id" name="cargo_id">
                                                        <option value="<?php echo $row->cargo_id; ?>" selected><?php echo $row->descripcion; ?></option>                                                 
                                                        <?php foreach ($data_table_cargo as $tp) : ?>
                                                            <?php if (($row->cargo_id) != $tp->cargo_id): ?>
                                                            <option value="<?php echo $tp->cargo_id; ?>"><?php echo $tp->descripcion; ?></option>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="modal-footer">                                            
                                            <a href="<?php echo site_url('personas/nuevo'); ?>"><button type="button" class="btn btn-danger">Cancelar</button></a>                                                          
                                            <button type="submit" class="btn btn-primary">Guardar</button>
                                        </div>
                                    </form>
                    
                    </div>

                   
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== --> 


