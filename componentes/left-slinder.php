
    <div class="slimscroll-menu" id="remove-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu" id="side-menu">
                <li class="menu-title">Menu</li>
                <li>
                    <a href="javascript:Escritorio()" class="waves-effect">
                        <i class="icon-accelerator"></i><span> Escritorio </span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);" class="waves-effect"><i class="icon-paper-sheet"></i><span> Administracion <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                    <ul class="submenu">
                        <li><a href="javascript:alertify.error('Sistema:Estamos Mantenimiento...')">Crear usuario</a></li>
                    </ul>
                </li>
                <li >
                    <a href="javascript:void(0);" class="waves-effect"><i class="icon-paper-sheet"></i><span> Empresas <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                    <ul class="submenu">
                      <li><a href="javascript:Registrar_Empresa()">Registrar Empresa</a></li>
                      <li><a href="javascript:listado_empresas()">Listado de Empresas</a></li>
                    </ul>
                </li>
                <li >
                    <a href="javascript:void(0);" class="waves-effect"><i class="icon-paper-sheet"></i><span> Clientes <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                    <ul class="submenu">
                      <li><a href="javascript:Crear_cliente()">Registrar Cliente</a></li>
                      <li><a href="javascript:Listado_Cliente()">Listado Cliente</a></li>
                    </ul>
                </li>
                <li hidden>
                    <a href="javascript:void(0);" class="waves-effect"><i class="icon-paper-sheet"></i><span> Corredores de Bolsa <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                    <ul class="submenu">
                      <li><a href="javascript:Registrar_corredor_De_bolsa()">Añadir Corredor de bolsa</a></li>
                      <li><a href="javascript:Listado_corredor_de_bolsa()">Listado Corredor de bolsa</a></li>
                    </ul>
                </li>
                <li hidden>
                    <a href="javascript:void(0);" class="waves-effect"><i class="icon-paper-sheet"></i><span> Nomina <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                    <ul class="submenu">
                      <li><a href="javascript:Nomina_cliente()">Nomina Cliente</a></li>
                    </ul>
                </li>
                <li class="menu-title">Configuracion</li>
                <li>
                    <a href="javascript:void(0);" class="waves-effect"><i class="fas fa-info-circle"></i><span> info <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                    <ul class="submenu">
                        <li><a href="javascript:alertify.error('Mantenimiento...')">Actualizaciones </a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>
    </div>
