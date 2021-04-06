<?php
include '../../../componentes/conexion/conexion.php';
  echo $id_empresa=$_POST['id_empresa'];
    $sentencia_puesto="SELECT * FROM `puesto` WHERE `id_a_empresa`='$id_empresa'";
    $query=mysqli_query($conexion,$sentencia_puesto);
    $query2=mysqli_query($conexion,$sentencia_puesto);
    if ($puesto_options=mysqli_fetch_array($query2)) {///verifico si encontro datos si encontro me procedera con el ciclo
    while ($puesto_options=mysqli_fetch_array($query)) {
      ?>
      <option value="<?php echo $puesto_options['id_puesto'] ?>"><?php echo $puesto_options['Nombre_puesto'] ?></option>
      <?php
    };
  }else {
    ?>
      <option value="">No Hay Datos para Selecionar,Cree un Puesto</option>
    <?php
  }
 ?>
