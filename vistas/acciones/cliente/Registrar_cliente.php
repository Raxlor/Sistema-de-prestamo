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
$Cédula=$_POST['Cédula'];
$id_sucusal=$_SESSION['sucursal'];
  $sentencia_para_no_duplicar_dni="SELECT * FROM `Cliente` WHERE `Cedula`='$Cédula'and `id_a_sucursal`=$id_sucusal";
    $query=mysqli_query($conexion,$sentencia_para_no_duplicar_dni);
if ($array_solo_id=mysqli_fetch_array($query)) {///en caso de que encuentre un cliente con dicha cedula se bloqueara
  ?>
    <script type="text/javascript">
        alertify.alert('<h1>Duplicado!</h1></br> <center>El usuario, se Esta Tratando de registrar con una Cédula y que se encuentra en nuestra base de datos. </center>');
    </script>
  <?php
}else {//no se encontro puede seguir  todo nice
$Nombre=ucwords(strtolower($_POST['Nombre']));
$Apellido=ucwords(strtolower($_POST['Apellido']));
$fecha_nacimiento=$_POST['fecha_nacimiento'];
$Dirección=$_POST['Dirección'];
$Teléfono=$_POST['Teléfono'];
$Cliente_empresa=$_POST['Cliente_empresa'];
$id_sucusal=$_SESSION['sucursal'];
$pago_mensual=$_POST['pago_mensual'];
$Posicion_de_Trabajo_=$_POST['Posicion_de_Trabajo_'];
$Fecha_de_ingreso=$_POST['Fecha_de_ingreso'];
$Email=strtolower($_POST['Email']);
$Código_empleado=$_POST['Código_empleado'];
$Nombre_supervisor=ucwords(strtolower($_POST['Nombre_supervisor']));
$Cedula_Supervisor=$_POST['Cedula_Supervisor'];
$Teléfono_Supervisor=$_POST['Teléfono_Supervisor'];
$autor=$_SESSION['nombre_empleado_session'];
$Banco=$_POST['Banco'];
$Numero_cuenta=$_POST['Numero_cuenta'];
$data=date('Y-m-d');
$entregada=$_POST['tarjeta'];
if ($entregada=='si') {
$entregada=1;
}else {
$entregada=0;
};
$Numero_débito=$_POST['Numero_débito'];
$Numero_Codigo=$_POST['Numero_Codigo'];
//Método con rand()
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
};
  $backup=$password=generateRandomString(1);
   // "</Br>";

   $password=base64_encode(sha1(md5($password)));

// img perfil
   $img_perfil='assets/images/systema/not-found.jpeg';
   //BASADO EN JPEG, PARA USAR EN PNG, GIF ETC CAMBIAR EL NOMBRE DE LAS FUNCIONES
   if (isset($_FILES['img_perfil']) && $_FILES['img_perfil']['tmp_name']!=''){
   //Imagen original
   $rtOriginal=$_FILES['img_perfil']['tmp_name'];
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
   imagejpeg($lienzo,'../../../assets/images/clientes/perfil'.md5(time()).'.jpeg');
    $img_perfil='../../../assets/images/clientes/perfil'.md5(time()).'.jpeg';
  }else {

  };
  // img cedula DELANTE
     $cedula_adelante='assets/images/systema/not-found.jpeg';
     //BASADO EN JPEG, PARA USAR EN PNG, GIF ETC CAMBIAR EL NOMBRE DE LAS FUNCIONES
     if (isset($_FILES['img_cédula_delante']) && $_FILES['img_cédula_delante']['tmp_name']!=''){
     //Imagen original
     $rtOriginal=$_FILES['img_cédula_delante']['tmp_name'];
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
     imagejpeg($lienzo,'../../../assets/images/DNI/dalante'.md5(time()).'.jpeg');
      $cedula_adelante='../../../assets/images/DNI/dalante'.md5(time()).'.jpeg';
    }else {

    };

    // img cedula TRASERA
       $cedula_atras='assets/images/systema/not-found.jpeg';
       //BASADO EN JPEG, PARA USAR EN PNG, GIF ETC CAMBIAR EL NOMBRE DE LAS FUNCIONES
       if (isset($_FILES['img_cédula_atras']) && $_FILES['img_cédula_atras']['tmp_name']!=''){
       //Imagen original
       $rtOriginal=$_FILES['img_cédula_atras']['tmp_name'];
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
       imagejpeg($lienzo,'../../../assets/images/DNI/trasera'.md5(time()).'.jpeg');
        $cedula_atras='../../../assets/images/DNI/trasera'.md5(time()).'.jpeg';
      }else {

      };
      // img debito delante
         $img_delante_tarjeta='assets/images/systema/not-found.jpeg';
         //BASADO EN JPEG, PARA USAR EN PNG, GIF ETC CAMBIAR EL NOMBRE DE LAS FUNCIONES
         if (isset($_FILES['img_Tarjeta_delante']) && $_FILES['img_Tarjeta_delante']['tmp_name']!=''){
         //Imagen original
         $rtOriginal=$_FILES['img_Tarjeta_delante']['tmp_name'];
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
         imagejpeg($lienzo,'../../../assets/images/CARD_DEBIT/debito_delante'.md5(time()).'.jpeg');
          $img_delante_tarjeta='../../../assets/images/CARD_DEBIT/debito_delante'.md5(time()).'.jpeg';
        }else {

        };
        // img debito Atras
           $img_Atras_tarjeta='assets/images/systema/not-found.jpeg';
           //BASADO EN JPEG, PARA USAR EN PNG, GIF ETC CAMBIAR EL NOMBRE DE LAS FUNCIONES
           if (isset($_FILES['img_Tarjeta_Trasera']) && $_FILES['img_Tarjeta_Trasera']['tmp_name']!=''){
           //Imagen original
           $rtOriginal=$_FILES['img_Tarjeta_Trasera']['tmp_name'];
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
           imagejpeg($lienzo,'../../../assets/images/CARD_DEBIT/debito_trasera'.md5(time()).'.jpeg');
            $img_Atras_tarjeta='../../../assets/images/CARD_DEBIT/debito_trasera'.md5(time()).'.jpeg';
          }else {
            
          };

          // img debito Atras
             $img_Tarjeta_clave='assets/images/systema/not-found.jpeg';
             //BASADO EN JPEG, PARA USAR EN PNG, GIF ETC CAMBIAR EL NOMBRE DE LAS FUNCIONES
             if (isset($_FILES['img_Tarjeta_clave']) && $_FILES['img_Tarjeta_clave']['tmp_name']!=''){
             //Imagen original
             $rtOriginal=$_FILES['img_Tarjeta_clave']['tmp_name'];
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
             imagejpeg($lienzo,'../../../assets/images/CARD_DEBIT/img_Tarjeta_clave'.md5(time()).'.jpeg');
              $img_Tarjeta_clave='../../../assets/images/CARD_DEBIT/img_Tarjeta_clave'.md5(time()).'.jpeg';
            }else {

            };


?>
<?php
   $sentencia_insert_cliente="INSERT INTO `Cliente`(
                                          `Nombre_cliente`,
                                          `Apellido_apellido`,
                                          `Nacimiento_Date`,
                                          `Cedula`,
                                          `Dirección`,
                                          `Teléfono`,
                                          `password`,
                                          `id_a_sucursal`,
                                          `id_a_empresa`,
                                          `Sueldo_mensual`,
                                          `id_puesto_cliente`,
                                          `Ingreso_A_empresa`,
                                          `Código_empleado`,
                                          `Nombre_jefe`,
                                          `Telefono_jefe`,
                                          `Cedula_jefe`,
                                          `img_perfil`,
                                          `Autor`,
                                          `img_cedula_delante`,
                                          `img_cedula_Trasera`,
                                          `Banco`,
                                          `Numero_De_cuenta`,
                                          `tarjeta_debito_entregada`,
                                          `img_debito_delante`,
                                          `img_debito_atras`,
                                          `img_Tarjeta_clave`,
                                          `Fecha_introducion`,
                                          `numeración_Debito`,
                                          `numeración_Clave`
                                      )
                                      VALUES(
                                        '$Nombre',
                                        '$Apellido',
                                        '$fecha_nacimiento',
                                        '$Cédula',
                                        '$Dirección',
                                        '$Teléfono',
                                        '$password',
                                        '$id_sucusal',
                                        '$Cliente_empresa',
                                        '$pago_mensual',
                                        '$Posicion_de_Trabajo_',
                                        '$Fecha_de_ingreso',
                                        '$Código_empleado',
                                        '$Nombre_supervisor',
                                        '$Teléfono_Supervisor',
                                        '$Cedula_Supervisor',
                                        '$img_perfil',
                                        '$autor',
                                        '$cedula_adelante',
                                        '$cedula_atras',
                                        '$Banco',
                                        '$Numero_cuenta',
                                        '$entregada',
                                        '$img_delante_tarjeta',
                                        '$img_Atras_tarjeta',
                                        '$img_Tarjeta_clave',
                                        '$data',
                                        '$Numero_débito',
                                        '$Numero_Codigo'
                                      )";


                    if (mysqli_query($conexion,$sentencia_insert_cliente)) {// aca insertaremos los datos del cliente tales como referido ETC

                    }else {
                      ?>
                        <script type="text/javascript">-
                          alertify.alert('<h1>Perdida De datos!</h1></br> <center>No hemos podido guardar los datos, del cliente intentelo nuevamente, recuerde no usar caracteres tales como (&#39;), si el problema continua, comuniquese con los desarrolladores</center>')
                        </script>
                      <?php
                    }



};///fin if

 ?>
