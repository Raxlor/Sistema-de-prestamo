<?php
session_start();
include '../../componentes/conexion/conexion.php';
  $login=$_POST['u'];
    $login=base64_encode($login);
  $password=$_POST['c'];
    $password=md5($password);

   $sql="SELECT *,COUNT(*) as cuenta FROM `Usuarios` WHERE `Email`='$login' and  `Contraseña`='$password'";
  $mysli=mysqli_query($conexion,$sql);
  $user=mysqli_fetch_array($mysli);

  if ($user['cuenta']==0) {
?>
<script type="text/javascript">
// alert("<?php echo $sql ?>");
</script>
<?php
}else {
  $_SESSION['id_empleado_session']=$user['id'];
  $_SESSION['nombre_empleado_session']=$user['Nombre'];
  $_SESSION['empleado_session']=$login;
  $_SESSION['Nivel_permiso']=$user['Nivel_permiso'];
?>
<script type="text/javascript">
  alertify.success("datos localizado");
  setTimeout(function () {
    location.href='home.php';
  }, 500);
</script>
<?php
}
 ?>
