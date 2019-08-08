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
                
                <li>
                    <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-home fa-lg"></i><span class="hide-menu"> Inicio </span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?php echo base_url(); ?>bienvenido"><i class=" hide-menu"></i>Acerca de</a></li>
                    </ul>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?php echo base_url(); ?>dashboard"><i class=" hide-menu"></i>Dashboard</a></li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow " href="#" aria-expanded="false"><i class="fas fa-barcode"></i><span class="hide-menu">Activos</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?php echo base_url(); ?>activos/nuevo"><i class=" fas fa-book"></i> Altas</a></li>
                        <li><a href="<?php echo base_url(); ?>activos/bajas"><i class="fas fa-clipboard-list"></i> Bajas</a></li>
                    </ul> 
                </li>
                <li>
                    <a class="has-arrow " href="#" aria-expanded="false"><i class="fas fa-hand-point-right"></i><span class="hide-menu">Asignacion de activos</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?php echo base_url(); ?>Asignacion/nuevo"><i class=" fas fa-book"></i> Asignar</a></li>
                        <li><a href="<?php echo base_url(); ?>prueba/index3"><i class="fas fa-clipboard-list"></i> Listado</a></li>
                    </ul> 
                </li>
                 <li>
                    <a class="has-arrow " href="#" aria-expanded="false"><i class="fas fa-hand-point-left"></i><span class="hide-menu">Devolucion de activos</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?php echo base_url(); ?>Devolucion/nuevo"><i class=" fas fa-book"></i>Devolucion</a></li>
                        <li><a href="<?php echo base_url(); ?>Devolucion/lista"><i class="fas fa-clipboard-list"></i> Historial</a></li>
                    </ul> 
                </li>
                <li>
                    <a class="has-arrow " href="#" aria-expanded="false"><i class="fas fa-file-pdf"></i><span class="hide-menu">Reportes</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?php echo base_url(); ?>prueba/index2"><i class=" fas fa-book"></i> Registro</a></li>
                        <li><a href="<?php echo base_url(); ?>prueba/index3"><i class="fas fa-clipboard-list"></i> Listado</a></li>
                    </ul> 
                </li>

                <li>
                    <a class="has-arrow" href="#" aria-expanded="false"><i class="fas fa-pencil-alt"></i><span class="hide-menu">Empresa</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?php echo base_url(); ?>Empresa"><i class=" fas fa-book"></i> Registro</a></li>
                        <li><a href="<?php echo base_url(); ?>predios/index"><i class="fas fa-clipboard-list"></i>  Listado</a></li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow" href="#" aria-expanded="false"><i class="fas fa-pencil-alt"></i><span class="hide-menu">Grupos</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?php echo base_url(); ?>Grupos/nuevo"><i class=" fas fa-book"></i> Registro</a></li>
                        <li><a href="<?php echo base_url(); ?>predios/index"><i class="fas fa-clipboard-list"></i>  Listado</a></li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow " href="#" aria-expanded="false"><i class="fas fa-pencil-alt"></i><span class="hide-menu">Auxiliar</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?php echo base_url(); ?>Auxiliar/nuevo"><i class=" fas fa-book"></i> Registro</a></li>
                        <li><a href="<?php echo base_url(); ?>prueba/index1"><i class="fas fa-clipboard-list"></i> Listado</a></li>
                    </ul>
                </li>
                 <li>
                    <a class="has-arrow " href="#" aria-expanded="false"><i class="fas fa-pencil-alt"></i><span class="hide-menu">Unidad</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?php echo base_url(); ?>Unidad/nuevo"><i class=" fas fa-book"></i> Registro</a></li>
                        <li><a href="<?php echo base_url(); ?>prueba/index1"><i class="fas fa-clipboard-list"></i> Listado</a></li>
                    </ul>
                </li>  
                  <li>
                    <a class="has-arrow " href="#" aria-expanded="false"><i class="fas fa-pencil-alt"></i><span class="hide-menu">Cargos</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?php echo base_url(); ?>Cargos/nuevo"><i class=" fas fa-book"></i> Registro</a></li>
                        <li><a href="<?php echo base_url(); ?>prueba/index1"><i class="fas fa-clipboard-list"></i> Listado</a></li>
                    </ul>
                </li>               
                  <li>
                    <a class="has-arrow " href="#" aria-expanded="false"><i class=" fas fa-archive"></i><span class="hide-menu">Almacen</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?php echo base_url(); ?>prueba/index2"><i class=" fas fa-book"></i> Registro</a></li>
                        <li><a href="<?php echo base_url(); ?>prueba/index3"><i class="fas fa-clipboard-list"></i> Listado</a></li>
                    </ul> 
                </li>
                <li>
                    <a class="has-arrow " href="#" aria-expanded="false"><i class=" fas fa-user"></i><span class="hide-menu">Empleados</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?php echo base_url(); ?>Personas/nuevo"><i class=" fas fa-book"></i>Registro</a></li>
                        <li><a href="<?php echo base_url(); ?>prueba/index3"><i class="fas fa-clipboard-list"></i> Listado</a></li>
                    </ul> 
                </li>
                <li>
                    <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-cog"></i><span class="hide-menu">Mantenimiento</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?php echo base_url(); ?>prueba/index4"><i class="fas fa-user"></i> Personas</a></li>
                        <li><a href="<?php echo base_url(); ?>Usuario"><i class="fas fa-address-card"></i> Perfil</a></li>
                        <li><a href="<?php echo base_url(); ?>prueba/index5"><i class="fas fa-users"></i> Roles</a></li>
                        <li><a href="<?php echo base_url(); ?>prueba/index6"><i class="fas fa-th-list"></i> Men&uacute;</a></li>

                        <li>
                            <a class="has-arrow " href="#" aria-expanded="false"><i class=" fas fa-thumbtack"></i><span class="hide-menu"> PARAM&Eacute;TRICAS CATASTRO</span></a>
                            <ul aria-expanded="false" class="collapse">

                                <li><a href="<?php echo base_url(); ?>Bloque_grupo_mat">Bloque Grupo Material</a></li>
                                <li><a href="<?php echo base_url(); ?>Bloque_mat_item">Bloque Material item</a></li>
                                <li><a href="<?php echo base_url(); ?>Clase_predio">Clase Predio</a></li>
                                <li><a href="<?php echo base_url(); ?>Destino_bloque">Destino Bloque</a></li>
                                <li><a href="<?php echo base_url(); ?>Edificio">Edificio</a></li>
                                <li><a href="<?php echo base_url(); ?>Forma">Forma</a></li>
                                <li><a href="<?php echo base_url(); ?>Matvia">Matvia</a></li>
                                <li><a href="<?php echo base_url(); ?>Nivel">Nivel</a></li>
                                <li><a href="<?php echo base_url(); ?>Pendiente">Pendiente</a></li>
                                <li><a href="<?php echo base_url(); ?>Predio_via">Predio Via</a></li>
                                <li><a href="<?php echo base_url(); ?>Rol">Rol</a></li>
                                <li><a href="<?php echo base_url(); ?>Servicio">Servicio</a></li>
                                <li><a href="<?php echo base_url(); ?>Tipopredio">Tipo de Predio</a></li>
                                <li><a href="<?php echo base_url(); ?>Tipo_planta">Tipo Planta</a></li>
                                <li><a href="<?php echo base_url(); ?>Ubicacion">Ubicaci&oacute;n</a></li>
                                <li><a href="<?php echo base_url(); ?>Uso_bloque">Uso Bloque</a></li>
                                <li><a href="<?php echo base_url(); ?>Uso_suelo">Uso Suelo</a></li>
                                <li><a href="<?php echo base_url(); ?>Zona_urbana">Zona Urbana</a></li>
                                <li><a href="<?php echo base_url(); ?>Tipo_documento">Tipo Documento</a></li>
                                <li><a href="<?php echo base_url(); ?>Tipo_correspondencia">Tipo Correspondecia</a></li>
                                <li><a href="<?php echo base_url(); ?>Zona_urbana">Orgranigrama</a></li>
                                
                            </ul>
                        </li>
                    </ul>
                </li>
               
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