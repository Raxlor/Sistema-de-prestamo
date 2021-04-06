<?php
session_start();
include '../../../componentes/conexion/conexion.php';
  $nombre_sucursal=$_POST['Nombre'];
    $Teléfono=$_POST['Teléfono'];
      $Dirección=$_POST['Dirección'];
        $Detalles=$_POST['Detalles'];
        $autor=$_SESSION['nombre_empleado_session'];
        $id=$_SESSION['sucursal'];
        // subir y guardar img
        $img='assets/images/systema/not-found.jpeg';
        //BASADO EN JPEG, PARA USAR EN PNG, GIF ETC CAMBIAR EL NOMBRE DE LAS FUNCIONES
        if (isset($_FILES['img']) && $_FILES['img']['tmp_name']!=''){
        //Imagen original
        $rtOriginal=$_FILES['img']['tmp_name'];
        //Crear variable
        $original = imagecreatefromjpeg($rtOriginal);
        //Ancho y alto máximo
        $max_ancho = 600; $max_alto = 400;
        //Medir la imagen
        list($ancho,$alto)=getimagesize($rtOriginal);
        //Ratio
        $x_ratio = $max_ancho / $ancho;
        $y_ratio = $max_alto / $alto;
        //Proporciones
        if(($ancho <= $max_ancho) && ($alto <= $max_alto) ){
            $ancho_final = $ancho;
            $alto_final = $alto;
        }
        else if(($x_ratio * $alto) < $max_alto){
            $alto_final = ceil($x_ratio * $alto);
            $ancho_final = $max_ancho;
        }
        else {
            $ancho_final = ceil($y_ratio * $ancho);
            $alto_final = $max_alto;
        }
        //Crear un lienzo
        $lienzo=imagecreatetruecolor($ancho_final,$alto_final);
        //Copiar original en lienzo
        imagecopyresampled($lienzo,$original,0,0,0,0,$ancho_final, $alto_final,$ancho,$alto);
        //Destruir la original
        imagedestroy($original);
        //Crear la imagen y guardar en directorio upload/
        imagejpeg($lienzo,'../../../assets/images/sucursal/'.md5(time()).'.jpeg');
         $img='../../../assets/images/sucursal/'.md5(time()).'.jpeg';
       }else {

       };

     $sentencia="INSERT INTO `Empresas`(
        `Id_a_sucursal`,
        `Nombre_empresa`,
        `Detalle`,
        `Dirección`,
        `Telefono`,
        `img`,
        `Autor`

    		)
    VALUES(
      '$id',
      '$nombre_sucursal',
      '$Detalles',
      '$Dirección',
      '$Teléfono',
      '$img',
      '$autor'
    )";
      if (mysqli_query($conexion,$sentencia)) {
          ?>
          <script type="text/javascript">
            alertify.success('Sistema: Todo se subio con éxito!');
          </script>
          <?php
      }else {
       ?>
        <script type="text/javascript">
          alertify.error('Sistema: No se inserto la nueva sucursal en la base de datos');
        </script>
       <?php
      }
 ?>
