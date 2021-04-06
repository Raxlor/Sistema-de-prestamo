<?php
session_start();
  include '../../../componentes/conexion/conexion.php';
    $id_sucusal=$_SESSION['sucursal'];
      $cedula=$_POST['cedula'];
        $consulta="SELECT * FROM `Cliente` WHERE `Cedula`='$cedula' and `id_a_sucursal`=$id_sucusal";
          $query=mysqli_query($conexion,$consulta);
            if ($datos_no_usables_=mysqli_fetch_array($query)) {
              ?>
                <script type="text/javascript">
                $('#Duplicada').tooltip('show');
                </script>
              <?php
            }else {
              ?>
                <script type="text/javascript">
                $('#Duplicada').tooltip('hide');
                </script>
              <?php
            };
 ?>
