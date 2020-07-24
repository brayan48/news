<header class="main-header">
    <!-- Logo -->
    <a ui-sref="" ui-sref-opts="{reload: true}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>N</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>noticias.com</b> </span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <form class="navbar-form navbar-left hide" role="search" id="divfiltropedido">
                <div class="input-group">
            <span class="input-group-btn hide">
              <button  class="btn btn-flat" type="button" data-toggle="modal" data-target="#modalleft"><i class="fa fa-filter"></i></button>
            </span>
                    <input type="text" class="form-control typehead" name="bustxtproducto" id="bustxtproducto" placeholder="Busqueda" data-provide="typeahead" autocomplete="off" >
                    <span class="input-group-btn btn-info">
              <button type="button" name="search" id="search-btn" class="btn btn-flat"  data-toggle="tooltip" data-placement="bottom" title="Buscar productos"  style="background-color: transparent;"> <i class="fa fa-search"></i></button>
            </span>
                </div>
            </form>
            <ul class="nav navbar-nav icons-3d-shadow">

                <li class="messages-menu text-center"> <a data-target="#modalpedido" class="dropdown-toggle" data-toggle="modal" style="padding: 0px 10px 4px 2px;height: 50px">
                        <img  class="img-cart-2" src="dist/img/carrito.png" style="cursor:pointer;display: none" />

                        <span class="label label-warning" style="font-size:14px; font-weight:normal; border-radius: 25px; right: 0 !important" id="numpedido"></span>
                    </a></li>
                <!-- Notifications: style can be found in dropdown.less -->
                <li class="dropdown notifications-menu" style="display: none;">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning">10</span>
                    </a>

                </li>
                <!-- Tasks: style can be found in dropdown.less -->

                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="height: 50px"><?php echo substr("Reemplazar",0,23); ?>
                        <img src="public/dist/images/user.png" class="user-image" alt="User Image"/>
                        <span class="hidden-xs">

              </span>
                    </a>

                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="public/dist/images/user.png" class="img-circle" alt="User Image"/>

                            <p>
                                <small></small>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <li class="user-body">
                            <div class="row">
                                <a href="index.php?operation=logout" class="text-red">
                                    <div class="col-xs-12 text-center text-red" style="cursor: pointer">
                                        Cerrar sesion
                                    </div>
                                </a>
                            </div>
                            <!-- /.row -->
                        </li>

                        <!-- Menu Footer-->

                    </ul>
                </li>

                <!-- Control Sidebar Toggle Button -->
                <!--<li>
                  <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>-->
            </ul>

        </div>
    </nav>
</header>