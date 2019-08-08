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

                        <?php echo form_open('devolucion/delete'); ?>  

                                        <div class="form-group">
                                            <label for="recipient-name" class="control-label">Nombre:</label>
                                            <input type="text" class="form-control" id="" name="" required="" value="<?php echo $row->nombres." ".$row->paterno." ".$row->materno; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="recipient-name" class="control-label">Descripcion:</label>
                                            <input type="text" class="form-control" id="descripcion" name="descripcion" required="" value="<?php echo $row->descripcion; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="recipient-name" class="control-label">Motivo:</label>
                                            <input type="text" class="form-control" id="motivo" name="motivo" required="" >
                                        </div>
                                        <input type="hidden" class="form-control" id="empleado" name="empleado" value="<?php echo $row->persona_id; ?>" >
                                        <input type="hidden" class="form-control" id="asignacion_id" name="asignacion_id" value="<?php echo $row->asignacion_id; ?>" >
                                        <input type="hidden" class="form-control" id="activo_id" name="activo_id" value="<?php echo $row->activo_id; ?>" >
                                        <div class="modal-footer">                                            
                                            <a href="<?php echo site_url('devolucion/nuevo'); ?>"><button type="button" class="btn btn-danger">Cancelar</button></a>                                                          
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
