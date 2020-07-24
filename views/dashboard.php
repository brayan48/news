<?php
// variable login que almacena el login o nombre de usuario de la persona logueada
$login= isset($_SESSION['persona']);
// cookie que almacena el numero de identificacion de la persona logueada
$usuario= $_SESSION['usuario'];
$idUsuario= $_COOKIE["usIdentificacion"];
$clave= $_COOKIE["clave"];

date_default_timezone_set('America/Bogota');

// verifica si no se ha loggeado
if(!isset($_SESSION["persona"]))
{
    session_destroy();
    header("LOCATION:index.php");
}else{
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="public/dist/images/favicon.png" rel="shortcut icon">
    <title>News | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="title" content="morena.com">
    <!-- Chrome, Firefox OS and Opera -->
    <meta name="theme-color" content="#4285f4">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#4285f4">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#4285f4">

    <script type="text/javascript" src="public/dist/cdn/jquery.min.js"></script>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="public/bootstrap/css/bootstrap.css"/>
    <!-- Bootstrap COLOR -->
    <link rel="stylesheet" href="public/bootstrap/css/bootstraprojo.css?<?php echo time(); ?>"/>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="public/dist/font-awesome-4.7.0/css/font-awesome.min.css"/>
    <!-- Theme style -->
    <link rel="stylesheet" href="public/dist/css/AdminLTErojo.css?<?php echo time(); ?>"/>

    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="public/dist/css/skins/_all-skinsrojo.css?<?php echo time(); ?>"/>

    <link rel="stylesheet" type="text/css" href="public/dist/DataTables-1.10.10/media/css/dataTables.bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="public/dist/DataTables-1.10.10/extensions/Select/css/select.dataTables.css"/>
    <link rel="stylesheet" type="text/css" href="public/dist/DataTables-1.10.10/extensions/Responsive/css/responsive.dataTables.css"/>
    <link rel="stylesheet" type="text/css" href="public/dist/DataTables-1.10.10/extensions/ColReorder/css/colReorder.dataTables.min.css"/>
    <link rel="stylesheet" type="text/css" href="public/dist/DataTables-1.10.10/extensions/FixedColumns/css/fixedColumns.dataTables.min.css"/>
    <link rel="stylesheet" type="text/css" href="public/dist/DataTables-1.10.10/extensions/FixedHeader/css/fixedHeader.dataTables.min.css"/>
    <link href="public/dist/DataTables-1.10.10/extensions/rowGroup.dataTables.min.css"/>
    <link rel="stylesheet" type="text/css" href="public/bootstrap/bootstrapselect/dist/css/bootstrap-select.css"/>
    <link rel="stylesheet" href="public/dist/sweetalert/sweetalert2.css"/>

    <link rel="stylesheet" href="public/dropify-master/dist/css/dropify.css"/>

    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="public/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <link href="public/css/tagsinput.css" rel="stylesheet" type="text/css">
</head>
<body class="fixed hold-transition skin-green-light sidebar-mini" ng-app="myApp">
<div class="wrapper">

    <?php include('views/parts/head.php'); ?>
    <?php include('views/parts/menu.php'); ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content" id="view" ui-view="">
            <?php include('views/parts/noticias.php'); ?>
        </section>
    </div>

    <?php include('views/parts/footer.php'); ?>
</div>

<!-- ./wrapper -->

<!-- jQuery 2.1.4 -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.5 -->
<script src="public/bootstrap/js/bootstrap.min.js"></script>
<script src="public/bootstrap/js/bootstrapds.js"></script>
<script src="public/bootstrap/js/bootstrap3-typeahead.min.js"></script>
<script src="public/bootstrap/js/validator.js"></script>
<script src="public/bootstrap/bootstrapselect/dist/js/bootstrap-select.js"></script>
<!-- AdminLTE App -->
<script src="public/dist/js/app.js"></script>

<script  type="text/javascript" src="public/dist/sweetalert/sweetalert2.js"></script>
<script src="public/js/functions.js?<?php echo time(); ?>" type="text/javascript"></script>
<script type="text/javascript" src="public/dist/DataTables-1.10.10/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="public/dist/DataTables-1.10.10/media/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="public/dist/DataTables-1.10.10/media/js/ColReorderWithResize.js"></script>
<script type="text/javascript" src="public/dist/DataTables-1.10.10/extensions/Responsive/js/dataTables.responsive.js"></script>
<script type="text/javascript" src="public/dist/DataTables-1.10.10/extensions/FixedColumns/js/dataTables.fixedColumns.min.js"></script>
<script type="text/javascript" src="public/dist/DataTables-1.10.10/extensions/FixedHeader/js/dataTables.fixedHeader.min.js"></script>
<script src="public/dist/DataTables-1.10.10/extensions/dataTables.rowGroup.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.bundle.min.js"></script>
<script src="public/dropify-master/dist/js/dropify.js?<?php echo time(); ?>"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="public/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>

<script src="public/js/tagsinput.js"></script>

<script type="text/javascript">

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-36251023-1']);
    _gaq.push(['_setDomainName', 'jqueryscript.net']);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();

</script>
</body>
</html>
<?php
}
?>