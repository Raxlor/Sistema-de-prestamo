<?php
session_start();
if (!$_SESSION['nombre_empleado_session']) {
  ?>
    <script type="text/javascript">
        alertify.alert('Sistema:Su session caduco.');
      location.href='login.php';
    </script>
  <?php
}else {

?>
<!--
  _ __   __ _  __ _  __ _ _ __    ___| (_) ___ _ __ | |_ ___    __   _/ |
 | '_ \ / _` |/ _` |/ _` | '__|  / __| | |/ _ \ '_ \| __/ _ \   \ \ / / |
 | |_) | (_| | (_| | (_| | |    | (__| | |  __/ | | | ||  __/    \ V /| |
 | .__/ \__,_|\__, |\__,_|_|     \___|_|_|\___|_| |_|\__\___|     \_/ |_|
 |_|          |___/
-->
<?php
  include '../../../componentes/conexion/conexion.php';
  // post enviado
  $id=$_POST['id'];
  $Numero_factura=$_POST['Numero_factura'];
  if (strlen($Numero_factura)>1) {
    // code...
  }else {
    $Numero_factura='No Valido';
  };
  // /fin/
  $query="SELECT * FROM `Clientes_normales` WHERE `id_cliente`='$id'";
  $mysli=mysqli_query($conexion,$query);
  $cliente_datos=mysqli_fetch_array($mysli);
      // información personal
      $Nombre=$cliente_datos['Nombre'];
      $Cédula=$cliente_datos['Cédula'];
      // informacion de que hace la consulta
      $Autor=$_SESSION['nombre_empleado_session'];
      // parametros para operaciones
      $inversion=$cliente_datos['Inversión_Inicial'];
      $porcentaje=$cliente_datos['Por_ciento_Inversión'];
       $pago_mensual=$cliente_datos['Pago_mensual'];
      if ($pago_mensual=='No Aplica') {
        // $pago_mensual='';
      };
      // contacto
      $Email=$cliente_datos['Email'];
      // banco
      $Banco=$cliente_datos['Banco'];
      $cuenta_banco=$cliente_datos['Numero_de_cuenta'];
      // corredor
      $Corredor_de_Bolsa=$cliente_datos['Corredor_de_Bolsa'];
      // para hacer codiciones
      $Tipo_de_cliente=$cliente_datos['Tipo_de_cliente'];
      // variables comunes para operaciones
      $comision_deposito_fijo='10'; //los 10 usd por la traferencia de banco
      $comision_deposito_isr_local ='10';//este es un valor que se toma el 10%
      $Retencion_de_ley;//este es un valor que se toma si pasa de 2000usd el sub total
      $ganacia_neta;
      $Retencion_de_ley_local='0.015';//aca lo uso si se pasa la ganacia de 200
      $total_pago;
      $inversion_resultante=$inversion;
      // variables auxiliares
      $valor_generado;
      $Comision_deposito_isr;
      $Retencion_de_ley;
      $total_pago;
      // operaciones
      if ($Tipo_de_cliente=='Pago Total') {
          // pago total pagara todo a la cuenta no aumenta el capital

          // sacar porciento
          $valor_generado=$ganacia_neta=$inversion*$porcentaje/100;
          // comienzo a descontarle
          $comision_deposito_fijo=$ganacia_neta-$comision_deposito_fijo;
          // inversion_resultante
          $inversion_resultante=$valor_generado+$inversion_resultante;
          $Comision_deposito_isr=$Comision_deposito_isr=$comision_deposito_fijo*$comision_deposito_isr_local/100;
        // aca pregunto si paasa de 2000 para cobrarle el 0.015%
        if ($Comision_deposito_isr>=2000) {
            $Retencion_de_ley=$Retencion_de_ley_local=$comision_deposito_fijo*$Retencion_de_ley_local/100;
        }else {
        $Retencion_de_ley= $Retencion_de_ley_local=0;
        }
        $total_pago=$comision_deposito_fijo-$Comision_deposito_isr-$Retencion_de_ley;
        // actualizo el cliente pero es pago total asi que no pasa eso
        // $query="UPDATE `Clientes_normales` SET `Inversión_Inicial`='' WHERE `id_cliente`=$id";

      }elseif ($Tipo_de_cliente=='Pago Fijo') {
        // pago fijo su aumento sera proporcicional al retiro

        // sacar porciento
        $valor_generado=$ganacia_neta=$inversion*$porcentaje/100;
        // comienzo a descontarle
         $comision_deposito_fijo=$ganacia_neta-$pago_mensual;
          // comienzo a descontarle 10 usd
         $comision_deposito_fijo_traferir=$pago_mensual-'10';
         // inversion_resultante
         $inversion_resultante=$valor_generado+$inversion_resultante-$pago_mensual;
         $Comision_deposito_isr=$Comision_deposito_isr=$pago_mensual*$comision_deposito_isr_local/100;
         // aca pregunto si paasa de 2000 para cobrarle el 0.015%
         if ($Comision_deposito_isr>=2000) {
             $Retencion_de_ley=$Retencion_de_ley_local=$pago_mensual*$Retencion_de_ley_local/100;
         }else {
         $Retencion_de_ley= $Retencion_de_ley_local=0;
         }
         $total_pago=$comision_deposito_fijo_traferir-$Retencion_de_ley_local-$Comision_deposito_isr;

         // actualizo el cliente pero es pago total asi que no pasa eso
         $comision_deposito_fijoUpdate=$inversion_resultante;
         $querySemn="UPDATE `Clientes_normales` SET `Inversión_Inicial`='$comision_deposito_fijoUpdate' WHERE `id_cliente`=$id";
         $sentence=mysqli_query($conexion,$querySemn);
      }else {
        // sacar porciento
           $valor_generado=$ganacia_neta=$inversion*$porcentaje/100;
          // estableco el descuento en  0 ya que no se hace tranferencia
         $comision_deposito_fijo_traferir=0;
         $comision_deposito_fijo=0;
         $Retencion_de_ley=$Retencion_de_ley_local=0;
         // inversion_resultante
         $Comision_deposito_isr=0;
         $inversion_resultante=$valor_generado+$inversion_resultante;
         $comision_deposito_fijoUpdate=$inversion_resultante;
         $total_pago=$valor_generado;
         $querySemn="UPDATE `Clientes_normales` SET `Inversión_Inicial`='$comision_deposito_fijoUpdate' WHERE `id_cliente`=$id";
         $sentence=mysqli_query($conexion,$querySemn);
      }
 //                  _       _         _
 //  _   _ _ __   __| | __ _| |_ ___  (_)_ __ ___   __ _
 // | | | | '_ \ / _` |/ _` | __/ _ \ | | '_ ` _ \ / _` |
 // | |_| | |_) | (_| | (_| | ||  __/ | | | | | | | (_| |
 //  \__,_| .__/ \__,_|\__,_|\__\___| |_|_| |_| |_|\__, |
 //       |_|                                      |___/
 //
 $img='assets/images/systema/not-found.jpeg';
 //BASADO EN JPEG, PARA USAR EN PNG, GIF ETC CAMBIAR EL NOMBRE DE LAS FUNCIONES
 if (isset($_FILES['photo']) && $_FILES['photo']['tmp_name']!=''){
 //Imagen original
 $rtOriginal=$_FILES['photo']['tmp_name'];
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
 imagejpeg($lienzo,'../../../assets/images/comprobantes/'.md5(time()).'.jpeg');
  $img='../../../assets/images/comprobantes/'.md5(time()).'.jpeg';
 }else {
 };
 // creo el historial
   $query="INSERT INTO `nomina_Historial`(`id_cliente`, `Nombre_cliente`,`cedula`,`Banco`, `Numero_Cuenta`,
    `corredor_de_bolsa`, `inversion_anterior`, `por_ciento`, `valor_generado`, `Tipo_de_cliente`,
     `inversion_resultante`, `Comisión_deposito_fijo`,
    `Comision_deposito_isr`, `Retencion_de_ley`, `total_pago`, `Numero_factura`, `autor`, `img`) VALUES ('$id','$Nombre',
    '$Cédula','$Banco','$cuenta_banco','$Corredor_de_Bolsa','$inversion','$porcentaje','$valor_generado','$Tipo_de_cliente',
  '$inversion_resultante','$comision_deposito_fijo','$Comision_deposito_isr','$Retencion_de_ley','$total_pago',
    '$Numero_factura','$Autor','$img')";
    if ($mysli=mysqli_query($conexion,$query)) {
      // void
    }else {
      ?>
        <script type="text/javascript">
            alertify.console.error('Sistema: Error al momento de guardar el historial');
          </script>
       <?php
    }

  }
?>
