<!-- remplace -->
<?php
$host = "localhost";
$dbname ="multiservisrd_System_prestamo";
$user = "multiser_multiservisrd";
$pass = "aurora1/*-";
 $conexion = mysqli_connect($host,$user,$pass,$dbname);
mysqli_set_charset($conexion, 'utf8');

  $url='https://'.$_SERVER['HTTP_HOST'];
  $name_pagina='Nombre_pagina';
  $name_company='Nombre de la compañia';
?>
<!-- <nav class="navbar   navbar-light bg-danger   static-top shadow">
  <h4>linea Roja asi no mas</h4>
</nav> -->
