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
                    <a class="has-arrow " href="#" aria-expanded="false"><i class="fas fa-barcode"></i><span class="hide-menu">Activos</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?php echo base_url(); ?>activos/nuevo"><i class=" fas fa-book"></i> Altas</a></li>
                        <li><a href="<?php echo base_url(); ?>activos/bajas"><i class="fas fa-clipboard-list"></i> Listado de Bajas</a></li>                        
                        <li><a href="<?php echo base_url(); ?>Grupos/nuevo"><i class="fas fa-pencil-alt"></i> Grupos</a></li>
                        <li><a href="<?php echo base_url(); ?>Auxiliar/nuevo"><i class="fas fa-pencil-alt"></i> Auxiliar</a></li>
                         <li><a href="<?php echo base_url(); ?>activos/anio" target="blank"><i class="fas fa-clipboard-list"></i> Listado por anio</a></li>

                    </ul> 
                </li>
                <li>
                    <a class="has-arrow " href="#" aria-expanded="false"><i class="fas fa-angle-double-right"></i><span class="hide-menu">Asignacion de activos</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?php echo base_url(); ?>Asignacion/nuevo"><i class=" fas fa-book"></i> Asignar</a></li>
          
                    </ul> 
                </li>
                <li>
                    <a class="has-arrow " href="#" aria-expanded="false"><i class="fas fa-angle-double-left"></i><span class="hide-menu">Devolucion de activos</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?php echo base_url(); ?>Devolucion/nuevo"><i class=" fas fa-book"></i>Devolucion</a></li>
                        <li><a href="<?php echo base_url(); ?>Devolucion/lista"><i class="fas fa-clipboard-list"></i> Historial</a></li>
                    </ul> 
                </li>
                <?php 
                $rol=$this->session->userdata("rol");
                if($rol==100): ?>


                <li>
                    <a class="has-arrow " href="#" aria-expanded="false"><i class=" fas fa-donate"></i><span class="hide-menu"> Depreciacion de activos</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?php echo base_url(); ?>Depreciaciones/nuevo"><i class=" fas fa-book"></i> Estado de Activos</a></li>
                  
                    </ul> 
                </li>
                <?php endif ?>
                <li>
                    <a class="has-arrow " href="#" aria-expanded="false"><i class="fas fa-building"></i><span class="hide-menu">Empresa</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?php echo base_url(); ?>Empresa"><i class=" fas fa-book"></i> Datos Empresa</a></li>                 
                        <li><a href="<?php echo base_url(); ?>Unidad/nuevo"><i class="fas fa-pencil-alt"></i> Unidad</a></li>                                                        
                        <li><a href="<?php echo base_url(); ?>Cargos/nuevo"><i class="fas fa-pencil-alt"></i> Cargos</a></li>                 
                        <li><a href="<?php echo base_url(); ?>Personas/nuevo"><i class=" fas fa-user"></i> Empleados</a></li>
                        <li><a href="<?php echo base_url(); ?>bienvenido"><i class=" fas fa-info"></i> Acerca de</a></li> 
                    </ul> 
                </li>
                <?php endif ?>
                <?php 
                $rol=$this->session->userdata("rol");
                if($rol==1): ?>                    
                 <li>
                    <a class="has-arrow " href="#" aria-expanded="false"><i class="fas fa-angle-double-right"></i><span class="hide-menu">Activos asignados</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?php echo base_url(); ?>Asignacion/lista_user"><i class=" fas fa-book"></i> Listado</a></li>
                     
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