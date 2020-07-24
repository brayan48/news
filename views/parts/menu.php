<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left">
                <a ui-sref="" ui-sref-opts="{reload: true}" >
                    <img src="public/dist/images/news.png" id="imglogo" class="logoweb" width="100%" height="100%"  alt="User Image"/></a>
            </div>
        </div>
        <!-- search form -->
        <div  class="sidebar-form hide" id="divbusquedageneral">
            <input type="text" name="busquedageneral" id="busquedageneral" class="form-control typehead" placeholder="Buscar..." data-provide="typeahead" autocomplete="off">
        </div>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MENU PRINCIPAL</li>

            <li class="active treeview itemmenu dos">
                <a style="cursor: pointer" id="dashboard">
                    <i class="fa fa-newspaper-o"></i><span>Noticias</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>