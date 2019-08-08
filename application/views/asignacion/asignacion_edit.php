<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="<?php echo base_url(); ?>public/js/barcode/jquery-barcode.js"></script>

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
                                <h4 class="card-title">Editar</h4>                                
                            </div>                                                      
                        </div>                       

                        <?php echo form_open('asignacion/update'); ?>    

                                        <div class="form-group">
                                            <label for="location1">Empleado :<span class="text-danger"> *</span></label>
                                            <select class="custom-select form-control" id="empleado" name="empleado">
                                                <option value="<?php echo $row->persona_id; ?>" selected=""><?php echo $row->nombres." ".$row->paterno." ".$row->materno; ?></option>
                                                <?php foreach ($data_table_persona as $tp) : ?>
                                                     <?php if (($row->persona_id) != $tp->persona_id): ?>
                                                      <option value="<?php echo $tp->persona_id; ?>"><?php echo $tp->nombres." ".$tp->paterno." ".$tp->materno; ?></option>
                                                    <?php endif; ?>                                                    
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="location1">Activo :<span class="text-danger"> *</span></label>
                                            <select class="custom-select form-control" id="activo_id" name="activo_id">
                                                <option value="<?php echo $row->activo_id; ?>" selected=""><?php echo $row->descripcion; ?></option>
                                                <?php foreach ($data_table_activo as $tp) : ?>
                                                    <?php if (($row->activo_id) != $tp->activo_id): ?>
                                                    <option value="<?php echo $tp->activo_id; ?>"><?php echo $tp->descripcion; ?></option>
                                                     <?php endif; ?>  
                                                <?php endforeach; ?>
                                            </select>
                                        </div>                                         
                                        
                                        <input type="hidden" class="form-control" id="asignacion_id" name="asignacion_id" value="<?php echo $row->asignacion_id; ?>" >
                                        <div class="modal-footer">                                            
                                            <a href="<?php echo site_url('asignacion/nuevo'); ?>"><button type="button" class="btn btn-danger">Cancelar</button></a>                                                          
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

<script>
    $("#barcode").barcode(
"<?php echo $row->codigo; ?>",
//"ASDAD1234567890128", // Value barcode (dependent on the type of barcode)
"code39" // type (string)
);
</script>
