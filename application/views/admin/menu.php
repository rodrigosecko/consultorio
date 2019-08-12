<!-- ============================================================== -->
<!-- End Topbar header -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- User profile -->
        <div class="user-profile">
            <!-- User profile image -->
            <div class="profile-img"> <img src="<?php echo base_url(); ?>public/assets/images/users/test.png" alt="user" /> </div>
            <!-- User profile text-->


            
            <div class="profile-text"> <a href="#" class="dropdown-toggle link u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"><?php echo $this->session->userdata("usuario");?><span class="caret"></span></a>
                <div class="dropdown-menu animated flipInY">

                    <div class="dropdown-divider"></div> <a href="<?php echo base_url(); ?>login/logout" class="dropdown-item"><i class="fa fa-power-off"></i> Cerrar Sesi&oacute;n</a>
                </div>
            </div>
        </div>
        <!-- End User profile text-->
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">

                <?php 
                $rol=$this->session->userdata("rol");
                if($rol==6): ?>
                        <li><a href="<?php echo base_url(); ?>dashboard"><i class="fas fa-home"></i>Inicio</a></li>
               

                <li>
                    <a class="has-arrow " href="#" aria-expanded="false"><i class="fas fa-barcode"></i><span class="hide-menu">Pacientes</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?php echo base_url(); ?>pacientes/nuevo"><i class=" fas fa-book"></i> Registro</a></li>                

                    </ul> 
                </li>
             
                <li>
                    <a class="has-arrow " href="#" aria-expanded="false"><i class="fas fa-angle-double-left"></i><span class="hide-menu">Doctores</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?php echo base_url(); ?>doctor/nuevo"><i class=" fas fa-book"></i>Registro</a></li>
                        
                    </ul> 
                </li>

               
           


                <li>
                    <a class="has-arrow " href="#" aria-expanded="false"><i class=" fas fa-donate"></i><span class="hide-menu">Historial Clinico</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?php echo base_url(); ?>Historial/nuevo"><i class=" fas fa-book"></i>Registro de consulta</a></li>
                  
                    </ul> 
                </li>
              
            
                <?php endif ?>
          



            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
    <!-- Bottom points-->
    <div class="sidebar-footer">
        <!-- item-->
        <a href="" class="link" data-toggle="tooltip" title="Settings"><i class="ti-settings"></i></a>
        <!-- item-->
        <a href="" class="link" data-toggle="tooltip" title="Email"><i class="mdi mdi-gmail"></i></a>
        <!-- item-->
        <a href="" class="link" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a>
    </div>
    <!-- End Bottom points-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->