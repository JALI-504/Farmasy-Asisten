<!DOCTYPE html>
<html>


  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pharmacy-Assistant</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="css/_all-skins.min.css">
    <link rel="apple-touch-icon" href="img/apple-touch-icon.png">
    <link rel="shortcut icon" href="img/favicon.ico">
    

    <style>
                              {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Roboto', sans-serif;
}



.container-all{
    width: 100%;
    max-width: 800px;
    margin: auto;
    background: white;
    margin-top: 100px;
    border-radius: 10px;
}

.container-all h1{
    text-align: center;
    font-size: 40px;
}

.content-article{
    margin-top: 40px;
}

.content-article img{
    width: 300px;
    float: left;
    margin-right: 20px;
    margin-bottom: 20px;
}

.content-article p{
    font-size: 16px;
    margin-top: 20px;
}


.content-article input{
    margin-top: 20px;
    background: #00b1ff;
    border: none;
    font-size: 16px;
    border-radius: 10px;
    outline: none;
}

.dark-mode-button{
    position: absolute;
    top: 20px;
    left: 20px;
    padding: 20px;
    background: white;
}

html.dark-mode{
    filter: invert(100%);
}

html.dark-mode img{
    filter: invert(100%);
}

.textblack{
    color:hsl(0, 100%, 100%);
}

.colormenu{
  background: #353434;
}

.menusuperior{
  background: #504e4e;
}
                              </style>

  </head>
  <body class="hold-transition sidebar-mini menusuperior" >
    <div  class="wrapper">

      <header class="main-header menusuperior">
        <!-- Logo -->
        <a href="/home" class="logo textblack">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini textblack">PA</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg textblack">Pharmacy Assistant</span>
      
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav   class="navbar navbar-static-top" role="navigation">

          <a href="#" class="sidebar-toggle textblack" data-toggle="offcanvas" role="button" >
            <span  class="sr-only textblack">Navegación</span>
          </a>

           <!-- Navbar Right Menu -->
           <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->

              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu" >
                <a href="#" style="font-size:20px;font-weight: bold;" class="dropdown-toggle textblack" data-toggle="dropdown"> 
                <img src="/img/user.png" width="30px" heigth="30px" class="textblack"/>
                &nbsp
                {{Auth::user()->name}}
                </a>
                <ul class="dropdown-menu textblack" style="width:100%" >
                  <!-- User image -->
                
                  <style>
                    .menu{
                      background-color:hsla(129, 20%, 93%, 0.959);
                      font-size:17px;
                      color: #000;
                      text-shadow: 1px 1px #000;
                      font-weight: bold;
                      
                      border: black 1px solid;
                      
                    }

                    .menuCerrado{
                      background-color:hsl(0, 77%, 58%);
                      font-size:17px;
                      color: #000;
                      text-shadow: 1px 1px #000;
                      font-weight: bold;
                      border: black 1px solid;
                    }
                 
                     #menu ul {
                      list-style-type: none;
                       margin: 0px;
                      padding: 0px;
                     width: 200px;
                     font-family: Arial, sans-serif;
                     width:100%;
                     font-size: 11pt;
                     }

                    #menu ul li {
                      background-color: #666;
                        }

                    #menu ul li a {
                    color: #fff;
                    text-decoration: none;
                    text-transform: uppercase;
                    display: block;
                    padding: 10px 10px 10px 20px;
                    }
                    
                    #menu ul li a:hover {
                    background: #000;
                    border-left: 10px solid #333;
                    color: #fff;
                    }
                      

                  </style>
                  
                  <!-- Menu Footer-->
                  
        <div id="menu">
 <ul>
  <li><a href="{{route('usuarios.ver',['id'=>Auth::user()->id_empleado])}}" class="borde" style="padding: 10px"><i class="fa fa-user" 
                      aria-hidden="true">&nbsp&nbsp&nbspPerfil</i></a></li>

  <li> <a href="#" class="borde" style="padding: 10px">
                      <i class="fa fa-question-circle" aria-hidden="true">&nbsp&nbsp&nbspAcerca de</i></a> </li>

  <li><a href="{{route('usuarios.edit',['id'=>Auth::user()->id])}}" class="borde" style="padding: 10px"><i class="fa fa-key" 
                      aria-hidden="true">&nbsp&nbsp&nbspCambio de contraseña</i></a></li>

  <li> <a href="{{ url('/logout') }}" class="borde" style="padding: 10px"> <i class="fa fa-times-circle" aria-hidden="true">&nbsp&nbsp&nbspCerrar sesion</i></a></li>
 </ul>
</div>
          



        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar colormenu" style="font-size: 18px;">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar" >
          <!-- Sidebar user panel -->
                    
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu" >
            
            @can('empleados','empleado_create')
            <li class="treeview">
              <a href="#">
                <i class="fa fa-user textblack"></i>
                <span class="textblack">Empleados</span>
                <i class="fa fa-angle-left pull-right textblack"></i>
              </a>
              <ul class="treeview-menu colormenu ">
                @can('empleados')
                <li><a href="empleados" class="textblack"><i class="fa fa-list textblack"></i>Listado de empleados</a></li>
                @endcan
                @can('empleado_create')
                <li><a href="empleadosnuevo" class="textblack"><i class="fa fa-pencil textblack"></i>Añadir de empleados</a></li>
                @endcan
              </ul>
            </li>
            @endcan
            @can('usuarios')
            <li class="treeview">
              <a href="#">
                <i class="fa fa-child textblack"></i>
                <span class="textblack">Usuario</span>
                <i class="fa fa-angle-left pull-right textblack"></i>
              </a>
              <ul class="treeview-menu colormenu" >
                <li><a href="usuario" class="textblack"><i class="fa fa-list"></i>Listado de usuario</a></li>
                <li><a href="usuarios" class="textblack"><i class="fa fa-pencil"></i>Crear usuario</a></li>
              </ul>
            </li>
            @endcan
            @can('clientes')
            <li class="treeview">
              <a href="#">
                <i class="fa fa-users textblack"></i>
                <span class="textblack">Clientes</span>
                 <i class="fa fa-angle-left pull-right textblack"></i>
              </a>
              <ul class="treeview-menu colormenu" >
                <li><a href="clientes" class="textblack"><i class="fa fa-list"></i>Listado de clientes</a></li>
                <li><a href="clientesnuevo" class="textblack"><i class="fa fa-pencil"></i>Añadir de clientes</a></li>
              </ul>
            </li>
            @endcan
            @can('inventarios')
            <li class="treeview">
              <a href="#">
                <i class="fa fa-archive textblack"></i>
                <span class="textblack">Inventario</span>
                 <i class="fa fa-angle-left pull-right textblack"></i>
              </a>
              <ul class="treeview-menu colormenu">
                <li><a href="inventarios" class="textblack"><i class="fa fa-list"></i>Listado de inventario</a></li>
                <li><a href="inventariosnuevo" class="textblack"><i class="fa fa-pencil"></i>Añadir a inventario</a></li>
              </ul>
            </li>
            @endcan
            @can('productos')
            <li class="treeview">
              <a href="#">
                <i class="fa fa-cubes textblack"></i>
                <span class="textblack">Producto</span>
                 <i class="fa fa-angle-left pull-right textblack"></i>
              </a>
              <ul class="treeview-menu colormenu" >
                <li><a href="productos" class="textblack"><i class="fa fa-list"></i>Listado de productos</a></li>
                <li><a href="productosnuevo" class="textblack"><i class="fa fa-pencil"></i>Añadir producto</a></li>
              </ul>
            </li>
            @endcan
            @can('proveedores')
            <li class="treeview">
              <a href="#">
                <i class="fa fa-truck textblack"></i>
                <span class="textblack">Proveedores</span>
                 <i class="fa fa-angle-left pull-right textblack"></i>
              </a>
              <ul class="treeview-menu colormenu">
                <li><a href="proveedores" class="textblack"><i class="fa fa-list"></i>Listado de proveedores</a></li>
                <li><a href="proveedoresnuevo" class="textblack"><i class="fa fa-pencil"></i>Añadir proveedor</a></li>
              </ul>
            </li>
            @endcan
            @can('ventas')
            <li class="treeview">
              <a href="#">
                <i class="fa fa-shopping-cart textblack"></i>
                <span class="textblack">Venta</span>
                 <i class="fa fa-angle-left pull-right textblack"></i>
              </a>
              <ul class="treeview-menu colormenu" >
                <li><a href="ventas" class="textblack"><i class="fa fa-list"></i>Listado de Ventas</a></li>
                <li><a href="ventasnuevo" class="textblack"><i class="fa fa-pencil"></i>Registrar Venta</a></li>
              </ul>
            </li>
            @endcan
            @can('compras')
            <li class="treeview">
              <a href="#">
                <i class="fa fa-truck textblack"></i>
                <span class="textblack">Compras</span>
                 <i class="fa fa-angle-left pull-right textblack"></i>
              </a>
              <ul class="treeview-menu colormenu">
                <li><a href="compras" class="textblack"><i class="fa fa-list"></i>Listado de compras</a></li>
                <li><a href="comprasnuevo" class="textblack"><i class="fa fa-pencil"></i>Añadir compras</a></li>
              </ul>
            </li>
            @endcan
            @can('role_index')
            <li class="treeview">
              <a href="#">
                <i class="fa fa-file-text textblack"></i>
                <span class="textblack">Roles</span>
                 <i class="fa fa-angle-left pull-right textblack"></i>
              </a>
              <ul class="treeview-menu colormenu">
                <li><a href="roles" class="textblack"><i class="fa fa-list"></i>Listado de Roles</a></li>
              </ul>
            </li>
            @endcan
            @can('permission_index')
            <li class="treeview">
              <a href="#">
                <i class="fa fa-refresh textblack"></i>
                <span class="textblack">Permisos</span>
                 <i class="fa fa-angle-left pull-right textblack"></i>
              </a>
              <ul class="treeview-menu colormenu">
                <li><a href="permissions" class="textblack"><i class="fa fa-list"></i>Listado de permisos</a></li>
              </ul>
            </li>
            @endcan       
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      



       <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" style=" height:100px; overflow: scroll;">
        
        <!-- Main content -->
        <section class="content">
          
          <div class="row">
            <div class="col-md-12" >
              <div class="box"  style="width: 100%; height:100%; overflow-x: scroll;">
                <div class="box-header with-border" >
                  <h3 class="box-title">@yield("titulo")</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">

	                  	<div class="col-md-12">
		                          <!--Contenido-->
                                  @yield("contenido")
		                          <!--Fin Contenido-->                                  
                           </div>
                        </div>
		                    

                  	</div><!-- /.row -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <!--Fin-Contenido-->

      
    <!-- jQuery 2.1.4 -->
    <script src="js/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="js/app.min.js"></script>

    <script src="https://kit.fontawesome.com/f09689b89n.js" crossorigin="anonymous"></script> <!--FontAwesome 5-->
    
  </body>
</html>