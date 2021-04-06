<?php
  session_start();
  include '../../../componentes/conexion/conexion.php';
    //////////////////////////////////////////////////////////////////////////
    //  ____            _     _                    _ _            _        ///
    // |  _ \ ___  __ _(_)___| |_ _ __ ___     ___| (_) ___ _ __ | |_ ___  ///
    // | |_) / _ \/ _` | / __| __| '__/ _ \   / __| | |/ _ \ '_ \| __/ _ \ ///
    // |  _ <  __/ (_| | \__ \ |_| | | (_) | | (__| | |  __/ | | | ||  __/ ///
    // |_| \_\___|\__, |_|___/\__|_|  \___/   \___|_|_|\___|_| |_|\__\___| ///
    //            |___/                                                    ///
    //////////////////////////////////////////////////////////////////////////

    // post recibido
    $Nombre=ucwords(strtolower($_POST['Nombre']));
    $Cédula=$_POST['Cédula'];
    $Teléfono=$_POST['Teléfono'];
    $Email=strtolower($_POST['Email']);
    // GENERADOR DE CONTRASEÑA
    $password='sporou'.substr(str_shuffle('123456789'), 0, 4);
    $Cliente=$_POST['Cliente'];
    $Banco=$_POST['Banco'];
    if (!$_POST['Numero_cuenta']) {
      $Numero_cuenta='No Aplica';
    }else {
      $Numero_cuenta=$_POST['Numero_cuenta'];
    }
    $fecha=$_POST['fecha'];
    $fecha_Pago=$_POST['fecha_Pago'];
    $Inversión=$_POST['Inversión'];
    if (!$_POST['PAgo_por_mes']) {
      $Pago_mensual='No Aplica';
    }else {
      $Pago_mensual=$_POST['PAgo_por_mes'];
    }
    $Inversión_porciento=$_POST['Inversión_porciento'];
    $Corredor_Bolsa=$_POST['Corredor_Bolsa'];
    if (!$_POST['Por_ciento_Corredor']) {
      $Por_ciento_Corredor='No Aplica';
    }else {
      $Por_ciento_Corredor=$_POST['Por_ciento_Corredor'];
    }
    $Cambio_de_tasa=$_POST['Cambio_de_tasa'];
    if (!$_POST['Pagar_Tasa']) {
      $Pagar_Tasa='No Aplica.';
    }else {
      $Pagar_Tasa=$_POST['Pagar_Tasa'];
    }
    $Dirección=ucwords(strtolower($_POST['Dirección']));
    // fin posts

    // informacion session
    $autor=$_SESSION['nombre_empleado_session'];
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
    imagejpeg($lienzo,'../../../assets/images/clientes/'.md5(time()).'.jpeg');
     $img='../../../assets/images/clientes/'.md5(time()).'.jpeg';
   }else {

   };
     $sql="INSERT INTO `Clientes_normales`(`Nombre`, `Cédula`, `Telefono`, `Email`, `Password`, `Tipo_de_cliente`, `Banco`, `Numero_de_cuenta`, `Fecha_De_inicio`, `Fecha_De_Pago`, `Inversión_Inicial`,
     `Pago_mensual`,`Por_ciento_Inversión`, `Corredor_de_Bolsa`, `Por_ciento_Corredor`, `Tasa_pregunta`,
`Tasa_value`, `Dirección`, `Foto`, `Autor`) VALUES ('$Nombre','$Cédula','$Teléfono','$Email',
        '$password','$Cliente','$Banco','$Numero_cuenta','$fecha','$fecha_Pago','$Inversión'
      ,'$Pago_mensual','$Inversión_porciento','$Corredor_Bolsa','$Por_ciento_Corredor','$Cambio_de_tasa',
        '$Pagar_Tasa','$Dirección','$img','$autor')";

        if ($mysli=mysqli_query($conexion,$sql)) {
        // aca no envio nada, ya que se envio bien
        }else {
          ?>
            <script type="text/javascript">
                alertify.error('Sistema: Error el usuario no fue Añadido a la base de datos, comunicate con sistema...');
            </script>
          <?php
        }
 ?>








<!--
  ____   __             _  ___            ____   ___ ____   ___
 |___ \ / /_           / |/ _ \          |___ \ / _ \___ \ / _ \
   __) | '_ \   _____  | | | | |  _____    __) | | | |__) | | | |
  / __/| (_) | |_____| | | |_| | |_____|  / __/| |_| / __/| |_| |
 |_____|\___/          |_|\___/          |_____|\___/_____|\___/


-->
img_Garante=document.getElementById('img_Garante').files[0];
formData.append("img_Garante[]", img_Garante);

img_referidos_count=0;
 while (img_referidos_count<number_img_variable) {
   alert(img_referidos_count+'/'+number_img_variable)
   img_referidos_count=img_referidos_count+1;
     img_Garante=document.getElementById('img_Garante'+img_referidos_count).files[0];
     formData.append("img_Garante[]", img_Garante);
   }

// perfil=document.getElementById('perfil').files[0];
// formData.append("perfil", perfil);
