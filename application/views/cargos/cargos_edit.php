
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
                        <p></p>                       

                        <?php echo form_open('cargos/update'); ?>                                         
                                        <div class="form-group">
                                            <label for="recipient-name" class="control-label">Nombre:</label>
                                            <input type="hidden" class="form-control" id="cargo_id" name="cargo_id" value="<?php echo $row->cargo_id; ?>">
                                            <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo $row->descripcion; ?>">
                                        </div>                                       
                                        <div class="modal-footer">                                            
                                            <a href="<?php echo site_url('cargos/nuevo'); ?>"><button type="button" class="btn btn-danger">Cancelar</button></a>                                                          
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


