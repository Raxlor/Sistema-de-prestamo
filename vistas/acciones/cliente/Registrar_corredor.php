 <?php
   session_start();
   include '../../../componentes/conexion/conexion.php';


 //  ____            _     _                ____                        _
 // |  _ \ ___  __ _(_)___| |_ _ __ ___    / ___|___  _ __ _ __ ___  __| | ___  _ __
 // | |_) / _ \/ _` | / __| __| '__/ _ \  | |   / _ \| '__| '__/ _ \/ _` |/ _ \| '__|
 // |  _ <  __/ (_| | \__ \ |_| | | (_) | | |__| (_) | |  | | |  __/ (_| | (_) | |
 // |_| \_\___|\__, |_|___/\__|_|  \___/   \____\___/|_|  |_|  \___|\__,_|\___/|_|
 //            |___/
     // post recibido
     $Nombre=ucwords(strtolower($_POST['Nombre']));
     $Cédula=$_POST['Cédula'];
     $Teléfono=$_POST['Teléfono'];
     $Email=strtolower($_POST['Email']);
     // GENERADOR DE CONTRASEÑA
     $password='sporou'.substr(str_shuffle('123456789'), 0, 4);
     $Banco=$_POST['Banco'];
     if (!$_POST['Numero_cuenta']) {
       $Numero_cuenta='No Aplica';
     }else {
       $Numero_cuenta=$_POST['Numero_cuenta'];
     }
     $fecha=$_POST['fecha'];
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
     imagejpeg($lienzo,'../../../assets/images/corredores/'.md5(time()).'.jpeg');
      $img='../../../assets/images/corredores/'.md5(time()).'.jpeg';
    }else {

    };
      $sql="INSERT INTO `Corredore_bolsa`( `Nombre`, `Cédula`, `Telefono`, `Email`, `Password`, `Banco`, `Numero_cuenta`, `Fecha_inicio`, `Dirección`, `Foto`, `Autor`) VALUES ('$Nombre','$Cédula','$Teléfono','$Email','$password','$Banco','$Numero_cuenta','$fecha','$Dirección','$img','$autor')";



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
  ____ _____           _  ___            ____   ___ ____   ___
 |___ \___  |         / |/ _ \          |___ \ / _ \___ \ / _ \
   __) | / /   _____  | | | | |  _____    __) | | | |__) | | | |
  / __/ / /   |_____| | | |_| | |_____|  / __/| |_| / __/| |_| |
 |_____/_/            |_|\___/          |_____|\___/_____|\___/

 -->
