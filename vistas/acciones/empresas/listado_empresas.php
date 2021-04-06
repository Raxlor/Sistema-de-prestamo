<?php
session_start();
 ?>

<!--
  ____                              ____ _ _            _
 | __ ) _   _ ___  ___ __ _ _ __   / ___| (_) ___ _ __ | |_ ___
 |  _ \| | | / __|/ __/ _` | '__| | |   | | |/ _ \ '_ \| __/ _ \
 | |_) | |_| \__ \ (_| (_| | |    | |___| | |  __/ | | | ||  __/
 |____/ \__,_|___/\___\__,_|_|     \____|_|_|\___|_| |_|\__\___|

-->
<table class="table table-striped  table-bordered table-sm" id="MytableSuplidores">
    <thead>
      <tr style="cursor:pointer">
        <th>#</th>
        <th>Nombre</th>
        <th>Telefono</th>
        <th>Estado</th>
        <th>Empleado</th>
        <th>Foto</th>
        <th>Opciones</th>
      </tr>
    </thead>
    <tbody id="search_cliente_jquery">
      <?php
include '../../../componentes/conexion/conexion.php';
// post
$Nombre=ucwords(strtolower($_POST['Nombre']));
if (strlen($Nombre)>=1 ) {
  $Nombre='%'.$Nombre.'%';
};
$Estado_empresa=$_POST['Estado_empresa'];
// fin posts
$id=$_SESSION['sucursal'];

//  selecionar consulta
if ($_POST['Estado_empresa']=='Todas') {
   $sql_cliente="SELECT * FROM `Empresas` WHERE `Id_a_sucursal`='$id' order by `Nombre_empresa` asc";// suplantar
}else {
  $sql_cliente="SELECT * FROM `Empresas` WHERE `Id_a_sucursal`='$id' and `Estado`='$Estado_empresa' and `Nombre_empresa` like '$Nombre' ORDER BY `Nombre_empresa` asc";
  }
  // fin selecionar consulta
$mysli=mysqli_query($conexion,$sql_cliente);
$mysli_contador=mysqli_query($conexion,$sql_contador);
$a;
$contador=mysqli_fetch_array($mysli_contador);
while ($cliente=mysqli_fetch_array($mysli)) {
  $a++
 ?>
<tr class="text-capitalize " style="font-size: 10.5px;
    cursor: pointer;">
 <th scope="row"><?php echo $a ?></th>
  <td ><?php echo $cliente['Nombre_empresa'] ?></td>
  <td class=""><?php echo $cliente['Telefono'] ?></td>
  <td class=""><?php echo $cliente['Estado'] ?></td>
  <td class=""><?php echo $cliente[''] ?></td>
  <td>
    <a class="image-popup-no-margins" href="<?php echo $cliente['img'] ?>">
        <img class="img-fluid d-block" src="<?php echo $cliente['img'] ?>" alt="" width="75">
    </a>
  </td>
  <td hidden>
    <a class="btn btn-outline-danger waves-effect waves-light" href="javascript:Eliminar_cliente(<?php echo $cliente['id_cliente'] ?>)" role="button"><i class="fas fa-trash-alt"></i></a>
    <a class="btn btn-outline-warning waves-effect waves-light" href="javascript:perfil_cliente_editar(<?php echo $cliente['id_cliente'] ?>,0)" role="button"><i class="fas fa-pencil-alt"></i></a>
    <a class="btn btn-outline-success waves-effect waves-light" href="javascript:perfil_cliente_ver(<?php echo $cliente['id_cliente'] ?>,1)" role="button"><i class="fas fa-search"></i></a>
  </td>

</tr>
<?php
    }
     ?>
   </tbody>
 </table>
 <script src="../../assets/pages/lightbox.js"></script>
 <script src="../../assets/js/Tables.js"></script>
