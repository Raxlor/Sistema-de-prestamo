<?php
session_start();
if (!$_SESSION['nombre_empleado_session']) {
  ?>
    <script type="text/javascript">
      location.href='login.php';
    </script>
  <?php
}
include 'componentes/conexion/conexion.php';
 ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Oficina Virtual | <?php echo $name_pagina ?></title>
    <meta content="Responsive admin theme build on top of Bootstrap 4" name="description" />
    <meta content="Themesdesign" name="author" />
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <!-- Magnific popup -->
    <link href="plugins/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/metismenu.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="assets/css/style.css?v=21w" rel="stylesheet" type="text/css">
    <!-- animated -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.4.0/animate.css" integrity="sha512-VMyF2fc2AX1KdbrqVUbeTWZxHmNThygdqsmZXqvg7hN3M3rgtzSQE+Vo4YtKRDexB0VDap5tiIwGVEmUA4Y1VA==" crossorigin="anonymous" />


</head>

<body>
  <div id="wrapper">
 <div class="topbar">
   <?php
   include 'componentes/header.php';
    ?>
  </div>
 <!-- Top Bar End -->
 <!-- ========== Left Sidebar Start ========== -->
 <div class="left side-menu">
   <?php
   include 'componentes/left-slinder.php';
    ?>
 </div>
<div class="content-page">
    <!-- Start content -->

    <div class="content">
      <div class="progress"style="border-radius: initial;" >
               <div class="progress-bar bg-success" role="progressbar"  style="width: 1%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"> <span class="porciento-bar"></span> </div>
           </div>

        <div class="container-fluid" id="Vistas_control">
        <!-- container-fluid -->

      </div>
    </div>
    <!-- content -->

    <?php
    include 'componentes/conexion/conexion.php';
    include 'componentes/footer.php';
     ?>

</div>
</div>



<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/metismenu.min.js"></script>
<script src="assets/js/jquery.slimscroll.js"></script>
<script src="assets/js/waves.min.js"></script>
<!-- puglin -->
<script src="plugins/alertify/js/alertify.js"></script>
<script src="plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
<script src="plugins/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
<script src="plugins/magnific-popup/jquery.magnific-popup.min.js"></script>

<!-- App js -->
<script src="assets/js/app.js"></script>
<script src="assets/js/acciones.js?v=<?php echo md5(time()) ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-touchspin/4.3.0/jquery.bootstrap-touchspin.js" integrity="sha512-k59zBVzm+v8h8BmbntzgQeJbRVBK6AL1doDblD1pSZ50rwUwQmC/qMLZ92/8PcbHWpWYeFaf9hCICWXaiMYVRg==" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.22/datatables.min.js"></script>
<script src="assets/js/vistas.js?v=<?php echo md5(time()) ?>"></script>

<!-- js puglin add dropify -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw==" crossorigin="anonymous" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous"></script>
<!-- js numeral -->
<script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
</body>

</html>
