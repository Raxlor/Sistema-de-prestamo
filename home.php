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
    $id=$_SESSION['id_empleado_session'];
    $nivel_administrativo=$_SESSION['Nivel_permiso'];
       $sql="SELECT * FROM `Usuarios` where `id`='$id'";
      $mysli=mysqli_query($conexion,$sql);
      $user=mysqli_fetch_array($mysli);
      $date=date('Y/m/d h:i');
      $update="UPDATE `Usuarios` SET `ultima_conexion` = '$date' WHERE `Usuarios`.`id` = '$id'";
      $mysli=mysqli_query($conexion,$update);
      $fecha1 = new DateTime($user['ultima_conexion']);
      $fecha2 = new DateTime($date);
      $resultado = $fecha1->diff($fecha2);
 ?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title><?php echo $name_pagina ?> </title>
        <meta content="Responsive admin theme build on top of Bootstrap 4" name="description" />
        <meta content="Themesdesign" name="author" />
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/metismenu.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="assets/css/style.css" rel="stylesheet" type="text/css">
    </head>
    <body class="my-5">
        <!-- Begin page -->
        <div class="accountbg"></div>
        <div class="home-btn d-none d-sm-block">
                <a href="javascript:deslog()" class="text-white"><i class="fas fa-power-off h2"></i></a>
            </div>
        <!--  -->
        <div class="container m-t-30">
                <div class="row">
                  <div class="col-md-5">
                    <div class="card shadow-none">
                      <p><?php
                       ?></p>
                        <div class="card-body">
                            <div class="text-center m-t-0 m-b-15">
                                    <a href="index.html" class="logo logo-admin"><img src="assets/images/logo-dark.png" alt="" height="24"></a>
                            </div>
                                    <div class="user-thumb text-center m-b-30">
                                            <img src="<?php echo $user['Img_perfil'] ?>" class="rounded-circle thumb-lg img-thumbnail mx-auto d-block img-fluid" alt="thumbnail">
                                        </div>
                                        <center><h3>Nombre: <?php echo $_SESSION['nombre_empleado_session'] ?></h3></center>
                                        <center><h5>Usuario: <?php echo base64_decode($_SESSION['empleado_session'] )?></h5></center>
                                        <center><h5>Cargo: <?php echo $user['Rol_name'] ?></h5></center>
                                        <center><h6>Ultima Conexion Hace: <?php   echo $resultado->format('%m meses %d Dias %H hora %i minutos'); ?> </h6></center>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-7">
                    <div class="card shadow-none">
                        <div class="card-body">
                            <div class="text-center m-t-0 m-b-15">
                                    <a href="index.php" class="logo logo-admin"><img src="assets/images/logo-dark.png" alt="" height="24"></a>
                            </div>
                            <center><h5>Escritorio</h5></center>
                                <div class="form-group">
                                  <div class="table-Responsive">
                                  <table class="table ">
                                    <thead>
                                      <th>Nombre</th>
                                      <th>Clientes</th>
                                      <th>Empresas</th>
                                      <th>
                                        Opción
                                      </th>
                                    </thead>
                                    <tbody>
                                      <?php
                                      if ($nivel_administrativo>=10) {
                                         $suculsar_sentencia="SELECT * FROM `Sucursales` WHERE `Estado` not like 0 ORDER BY `Sucursales`.`Nombre_sucursal` ASC";
                                      }else {
                                         $suculsar_sentencia_asignada="SELECT * FROM `Permisos_sucursales` WHERE `id_a_cliente`='$id'";
                                         $query_sucusales_Asiganadas=mysqli_query($conexion,$suculsar_sentencia_asignada);
                                        $y=0;
                                         while ($asiganadas=mysqli_fetch_array($query_sucusales_Asiganadas)) {
                                             $asiganadas['id_a_sucursal'];// sucursal asiganada esta es la id
                                                 if ($y==0) {
                                                   $id_sucusal.=$asiganadas['id_a_sucursal'];
                                                 }else {
                                                   $id_sucusal.=','.$asiganadas['id_a_sucursal'];
                                                 }
                                                $y++;
                                         }
                                         ///fin del while
                                          $suculsar_sentencia="SELECT * FROM `Sucursales` WHERE `Estado` not like 0 and   `id_sucursal` in ($id_sucusal)  ORDER BY `Sucursales`.`Nombre_sucursal` ASC";
                                      };
                                      $sentencia_query=mysqli_query($conexion,$suculsar_sentencia);
                                        $sentencia_query2=mysqli_query($conexion,$suculsar_sentencia);//para comprobar la existencia de dicha cadena de permiso si no lo tiene se mostrara la opcion de else

                                    if ($data_sucurusal= mysqli_fetch_array($sentencia_query2)) {
                                      while ($data_sucurusal= mysqli_fetch_array($sentencia_query)) {
                                          ?>
                                          <tr>
                                            <td><?php echo $data_sucurusal['Nombre_sucursal'] ?></td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>
                                                <input type="button" class="btn btn-sm btn-success" name="" onclick="location.href='/?s=<?php echo $data_sucurusal['id_sucursal'] ?>'" value="Entrar">
                                              <?php if ($nivel_administrativo>=10): ?>
                                                <input type="button" class="btn btn-sm btn-warning" name="" value="Modificar">
                                              <?php endif; ?>
                                            </td>
                                          </tr>
                                          <?php
                                        };
                                      }else {
                                      ?>
                                      <tr>
                                        <td>
                                          <h6>No tienes</h6>
                                        </td>
                                        <td>
                                          <h6> sucursal </h6>
                                        </td>
                                        <td>
                                            <h6>asiganada</h6>
                                        </td>
                                        <td>
                                            <h6>Hasta el momento</h6>
                                        </td>
                                      </tr>
                                      <?php
                                      }
                                       ?>
                                    </tbody>
                                  </table>
                                </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        <!-- END wrapper -->
        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/metismenu.min.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/waves.min.js"></script>
        <!-- puglin -->
        <!-- App js -->
        <script src="assets/js/app.js"></script>
        <script src="assets/js/vistas.js"></script>
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
        <script src="assets/js/acciones.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-touchspin/4.3.0/jquery.bootstrap-touchspin.js" integrity="sha512-k59zBVzm+v8h8BmbntzgQeJbRVBK6AL1doDblD1pSZ50rwUwQmC/qMLZ92/8PcbHWpWYeFaf9hCICWXaiMYVRg==" crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.22/datatables.min.js"></script>
        <script src="assets/js/vistas.js"></script>
    </body>

</html>
