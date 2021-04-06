<?php
  include '../componentes/conexion/conexion.php';
  $sql='SELECT * FROM `Items` WHERE 1';
  $mysli=mysqli_query($conexion,$sql);

setlocale(LC_MONETARY, 'es_DO');
 ?>

    <!-- Page-Title -->
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h4 class="page-title">Articulos</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-right">
                      <li class="breadcrumb-item"><a href="javascript:Escritorio();">Escritorio</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Inventario</a></li>
                    <li class="breadcrumb-item active">Articulos</li>
                </ol>
            </div>
        </div>
        <!-- end row -->
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <table id="MytableArticulos" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Articulo</th>
                            <th>disponibles</th>
                            <th>Precio C/U</th>
                            <th>Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                          <?php
                            while ($Iten=mysqli_fetch_array($mysli)) {
                              ?>
                              <tr>
                                  <td><?php echo $Iten['id'] ?></td>
                                  <td><?php echo $Iten['Nombre'] ?></td>
                                  <td><?php echo $Iten['Cantidad'] ?></td>
                                  <td><?php echo money_format('%.2n',$Iten['Precio']) ?></td>
                                  <td>
                                    <button type="button" class="btn btn-outline-primary waves-effect waves-light" onclick="BuyModV1(<?php echo $Iten['id'] ?>)"><i class="fas fa-shopping-cart"></i></button>
                                  </td>
                              </tr>
                              <?php
                            }
                           ?>

                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
    <script src="assets/js/Tables.js"></script>

    <div class="" id="Modal_control">

    </div>
