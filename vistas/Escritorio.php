<!-- coenxion -->
<?php
  include '../componentes/conexion/conexion.php';

  $sql='SELECT COUNT(*) as totalcliente FROM `Clientes_normales` WHERE 1';
  $mysli=mysqli_query($conexion,$sql);
  $Iten=mysqli_fetch_array($mysli);
  setlocale(LC_MONETARY, 'es_DO');
 ?>

 <!-- code -->
    <!-- Page-Title -->
<div class="page-title-box">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <h4 class="page-title">Escritorio </h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item active">Escritorio</li>
            </ol>
        </div>
    </div>
    <!-- end row -->
</div>

<div class="row">

    <div class="col-sm-6 col-xl-6">
        <div class="card">
            <div class="card-heading p-4">
                <div class="mini-stat-icon float-right">
                    <i class="mdi mdi-account bg-primary  text-white"></i>
                </div>
                <div>
                    <h5 class="font-16">Clientes</h5>
                </div>
                <h3 class="mt-4"><?php
                 $if=strlen($Iten['totalcliente']);
                  if ($if==' ') {
                echo "0";
              }else {
                echo  $Iten['totalcliente'];
              } ?></h3>
                <div class="progress mt-4 visibility-hidden" style="height: 0px;">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 0%" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
  </div>
  <div class="row">
    <div class="col-xl-8">
        <div class="card m-b-30">
            <div class="card-body">

                <h4 class="mt-0 header-title mb-4">Actualizaciones</h4>
                <ol class="activity-feed mb-0">

                  <li class="feed-item pb-1">
                      <p class="text-muted mb-1">26/10/2020</p>
                      <p class="font-15 mt-0 mb-2">Seguridad <b class="text-primary">Cifrado de 2 tipo para acceder</b></p>
                  </li>
                    <li class="feed-item pb-1">
                        <p class="text-muted mb-1">26/10/2020</p>
                        <p class="font-15 mt-0 mb-2">Nacimiento <b class="text-primary">Hello world</b></p>
                    </li>
                </ol>
            </div>
        </div>
    </div>

  </div>
