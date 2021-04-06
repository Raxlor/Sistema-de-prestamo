
// eliminar cateegoria
  function categoria_borrar(id_categoria) {
    alertify.confirm("¿Realmente quieres Eliminar Esta categoria? Preciona 'OK' para Eliminar.",
    function(){
    alertify.success('Categoria Eliminada del sistema...');
    $.ajax({
      type:'POST',
      data:'id='+id_categoria,
      url:'vistas/acciones/mantenimiento/eliminar_Categoria.php',
      success:function() {

        // para crear tiempo para la recarga de la vista
          setTimeout(function () {
              categorias();
          }, 500);
      }
    })
    },
    function(){
    alertify.error('acción abortada');
    });
  };


  // eliminar unidad
    function Unidad_medida_borrar(id_unidad) {
      alertify.confirm("¿Realmente quieres Eliminar Esta Unidad de medida? Preciona 'OK' para Eliminar.",
      function(){
      alertify.success('Unidad Eliminada del sistema...');
      $.ajax({
        type:'POST',
        data:'id='+id_unidad,
        url:'vistas/acciones/mantenimiento/unidades/eliminar_unidades.php',
        success:function() {
          // para crear tiempo para la recarga de la vista
            setTimeout(function () {
                Medidas_unidades();
            }, 500);
        }
      })
      },
      function(){
      alertify.error('acción abortada');
      });
    };
// surtidoras lista surtidora borrar
function eliminar_surtidora(id_surtidora) {
  alertify.confirm("¿Realmente quieres Eliminar Esta Surtidora? Preciona 'OK' para Eliminar.",
  function(){
  alertify.success('Eliminando del sistema...');
  $.ajax({
    type:'POST',
    data:'id='+id_surtidora,
    url:'vistas/acciones/mantenimiento/surtidoras/eliminar_surtidora.php',
    success:function(msg) {
      $('#Alerta_new_surtidora').html(msg);
      // para crear tiempo para la recarga de la vista
        setTimeout(function () {
            Surtidoras_Compras();
        }, 500);
    }
  })
  },
  function(){
  alertify.error('acción abortada');
  });
}
// item mantenimiento categoria_borrar



 // __     __    _ _     _            _                         _____                          _            _
 // \ \   / /_ _| (_) __| | __ _  ___(_) ___  _ __   ___  ___  |  ___|__  _ __ _ __ ___  _   _| | __ _ _ __(_) ___
 //  \ \ / / _` | | |/ _` |/ _` |/ __| |/ _ \| '_ \ / _ \/ __| | |_ / _ \| '__| '_ ` _ \| | | | |/ _` | '__| |/ _ \
 //   \ V / (_| | | | (_| | (_| | (__| | (_) | | | |  __/\__ \ |  _| (_) | |  | | | | | | |_| | | (_| | |  | | (_) |
 //    \_/ \__,_|_|_|\__,_|\__,_|\___|_|\___/|_| |_|\___||___/ |_|  \___/|_|  |_| |_| |_|\__,_|_|\__,_|_|  |_|\___/
 //

$('#Tasa_cambioid').attr('disabled', 'true');
function Tasa_cambio(e) {
  if (e=='no') {
    $('#Tasa_cambioid').val();
    alertify.error('La tasa no se esta aplicando');
    $('#Tasa_cambioid').attr('disabled', 'true');
    $('#Tasa_cambioid').val('No Aplica');
  }else {
    alertify.success('La tasa se esta aplicando, ingrese la tasa de cambio.');
    $('#Tasa_cambioid').val('');
    $('#Tasa_cambioid').removeAttr('disabled');
  }
};
function ReTasa_cambio(e,value) {
  if (e=='no') {
    $('#Tasa_cambioid').val();
    alertify.error('La tasa no se esta aplicando');
    $('#Tasa_cambioid').attr('disabled', 'true');
    $('#Tasa_cambioid').val('No Aplica');
  }else {
    alertify.success('La tasa se esta aplicando, ingrese la tasa de cambio.');
    if (value=='No Aplica.') {
      $('#Tasa_cambioid').val('');
    }else {
      $('#Tasa_cambioid').val(value);
    }
    $('#Tasa_cambioid').removeAttr('disabled');
  }
};

$('#Numero_cuenta').val('No Aplica');
$('#Numero_cuenta').attr('disabled','true');
function validad_corredor(e) {
  if (e=='No') {
    alertify.error('El Cliente se no esta sujeto a ningun corredor de bolsa.');
    $('#Numero_cuenta').val('No Aplica');
    $('#Numero_cuenta').attr('disabled','true');
  }else {
    alertify.success('Corredor de bolsa seleccionado correctamente');
    $('#Numero_cuenta').removeAttr('disabled');
    $('#Numero_cuenta').val('');

  }
};
function Revalidad_corredor(e,value) {
  if (e=='No') {
    alertify.error('El Cliente se no esta sujeto a ningun corredor de bolsa.');
    $('#Numero_cuenta').val('No Aplica');
    $('#Numero_cuenta').attr('disabled','true');
  }else {
    alertify.success('Corredor de bolsa seleccionado correctamente');
    $('#Numero_cuenta').removeAttr('disabled');
    if (value=='No Aplica') {
        $('#Numero_cuenta').val('');
      }else {
        $('#Numero_cuenta').val(value);
      }
  }
};

$('#Banco').attr('disabled', 'true');
$('#Banco').val('Escriba Numero de cuenta');

function Validad_Banco(e) {
if (e=='') {
  $('#Banco').val('Escriba Numero de cuenta');
  $('#Banco').attr('disabled', 'true');
  alertify.error('El Cliente No cuenta con un banco, esta información es importante.');
}else {
  alertify.success('Banco Selecionado correctamente.');
  $('#Banco').removeAttr('disabled');
  $('#Banco').val('');
}
};

function ReValidad_Banco(e,value) {
  if (e=='No') {
  $('#Banco').val('No Aplica');
  $('#Banco').attr('disabled', 'true');
  alertify.error('El Cliente No cuenta con un banco, esta información es importante.');
}else {
  alertify.success('Banco Selecionado correctamente.');
  $('#Banco').removeAttr('disabled');
if (value=='No Aplica') {
    $('#Banco').val('');
  }else {
    $('#Banco').val(value);
  }
  };
};

$('#PAgo_por_mes').attr('disabled', 'true');
$('#PAgo_por_mes').val('No Aplica');

function revalidad_PAgo_por_mes(e,value) {
  if (e=='Pago Fijo') {
    $('#PAgo_por_mes').removeAttr('disabled');
    if (value=='No Aplica') {
      $('#PAgo_por_mes').val('');
    }else {
      $('#PAgo_por_mes').val(value);
    }
  }else {
    $('#PAgo_por_mes').attr('disabled', 'true');
    $('#PAgo_por_mes').val('No Aplica');
  };
};



function validad_PAgo_por_mes(e) {
  if (e=='Pago Fijo') {

    $('#PAgo_por_mes').removeAttr('disabled')
    $('#PAgo_por_mes').val('');
  }else {
    $('#PAgo_por_mes').attr('disabled', 'true');
    $('#PAgo_por_mes').val('No Aplica');
  }
}

$('#Cedula').attr('disabled', 'true');
$('#Nombre').attr('disabled', 'true');
$('#Email').attr('disabled', 'true');

function validar_tipo_cliente(e) {
  if (e=='Todos') {
    $('#Cedula').attr('disabled', 'true');
    $('#Cedula').val('');

    $('#Nombre').attr('disabled', 'true');
    $('#Nombre').val('');

    $('#Email').attr('disabled', 'true');
    $('#Email').val('');
  }else {
    $('#Cedula').removeAttr('disabled');
    $('#Nombre').removeAttr('disabled');
    $('#Email').removeAttr('disabled');
  }
};
  $('#Parametro1').attr('disabled', 'true');
  $('#Parametro2').attr('disabled', 'true');
function validar_tipo_busqueda(e) {
  if (e=='Todos') {
    $('#Parametro1').attr('disabled', 'true');
      $('#Parametro2').attr('disabled', 'true');
      $('#Parametro1').val('');
        $('#Parametro2').val('');
      }else {
        $('#Parametro1').removeAttr('disabled');
        $('#Parametro2').removeAttr('disabled');
      }
};

 /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 //  _____                          _            _              __                  _                           //////
 // |  ___|__  _ __ _ __ ___  _   _| | __ _ _ __(_) ___        / _|_   _ _ __   ___(_) ___  _ __   ___  ___     //////
 // | |_ / _ \| '__| '_ ` _ \| | | | |/ _` | '__| |/ _ \      | |_| | | | '_ \ / __| |/ _ \| '_ \ / _ \/ __|    //////
 // |  _| (_) | |  | | | | | | |_| | | (_| | |  | | (_) |     |  _| |_| | | | | (__| | (_) | | | |  __/\__ \    //////
 // |_|  \___/|_|  |_| |_| |_|\__,_|_|\__,_|_|  |_|\___/      |_|  \__,_|_| |_|\___|_|\___/|_| |_|\___||___/    //////
 /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 $('#Registrar_Empresa_form').submit(function(e){
   var checkBox = document.getElementById("Check_Articulo");
   var formData = new FormData($(this)[0]);
     $.ajax({
         url: "vistas/acciones/empresas/Procesar_empresa.php",
         type: "POST",
         data: formData,
         async: false,
         beforeSend:function() {
           $('#Enviar_formulario').attr('disabled', 'true');
           alertify.success('Sistema: Enviando el formulario...');
         },
         success: function (msg) {
           $('#contenido').fadeOut(100).html(msg).fadeIn(500);
           // si no se quiere que te reenvie al listado
           if (checkBox.checked == true){
             alertify.confirm("Sistema: ¿puedo resetear el formulario? <br><center>Preciona 'OK' para Eliminar. </center>",function(){
             $('#Registrar_Empresa_form')[0].reset();
             window.scrollTo(500, 0);
           });
               } else {
                 alertify.success('Sistema: Enviando la lista de Empresas');
                 setTimeout(function () {
                 window.scrollTo(500, 0);
               }, 1000);
                 listado_empresas();
             }
               setTimeout(function () {
                 alertify.success('Sistema: Formulario Recibido');
                 $('#Enviar_formulario').removeAttr('disabled');
             }, 800);

         }, error:function() {
           setTimeout(function () {
             alertify.error('Sistema: La pagina solicitada esta colgada');
             $('#Enviar_formulario').removeAttr('disabled');
         }, 800);
         },
         cache: false,
         contentType: false,
         processData: false
     });
     e.preventDefault();
 });

// formulario Actualizaciones perfil_cliente
$('#Actualizar_cliente_form').submit(function(e){
  var formData = new FormData($(this)[0]);
    $.ajax({
        url: "vistas/acciones/cliente/Actualizar_cliente_form.php",
        type: "POST",
        data: formData,
        async: false,
        beforeSend:function() {
          $('#Enviar_formulario').attr('disabled', 'true');
          alertify.success('Sistema: Enviando el formulario...');
        },success:function(html) {
          $('#contenido').fadeOut(100).html(html).fadeIn(500);
          $('#Enviar_formulario').removeAttr('disabled');
          window.scrollTo(500, 0);

        }, error:function() {
          setTimeout(function () {
            alertify.error('Sistema: La pagina solicitada esta colgada');
            $('#Enviar_formulario').removeAttr('disabled');
        }, 800);
        },
        cache: false,
        contentType: false,
        processData: false
    });
    e.preventDefault();
});
// formulario crear Corredores
$('#Registrar_Corredor_de_bolsa_form').submit(function(e){
  var checkBox = document.getElementById("Check_Articulo");
  var formData = new FormData($(this)[0]);
    $.ajax({
        url: "vistas/acciones/corredor/Registrar_corredor.php",
        type: "POST",
        data: formData,
        async: false,
        beforeSend:function() {
          $('#Enviar_formulario').attr('disabled', 'true');
          alertify.success('Sistema: Enviando el formulario...');
        },
        success: function (msg) {
          $('#contenido').fadeOut(100).html(msg).fadeIn(500);
          // si no se quiere que te reenvie al listado
          if (checkBox.checked == true){
            alertify.confirm("Sistema: ¿puedo resetear el formulario? <br> <center>Preciona 'OK' para Eliminar. </center>",function(){
            $('#Registrar_Corredor_de_bolsa_form')[0].reset();
            window.scrollTo(500, 0);
          });
              } else {
                // alertify.error('Sistema: Mantenimiento...');
                setTimeout(function () {
                window.scrollTo(500, 0);
              }, 500);
              Listado_corredor_de_bolsa();
                // Registrar_corredor_De_bolsa();
            }
              setTimeout(function () {
                alertify.success('Sistema: Formulario Recibido');
                $('#Enviar_formulario').removeAttr('disabled');
            }, 800);
        }, error:function() {
          setTimeout(function () {
            alertify.error('Sistema: La pagina solicitada esta colgada');
            $('#Enviar_formulario').removeAttr('disabled');
        }, 800);
        },
        cache: false,
        contentType: false,
        processData: false
    });
    e.preventDefault();
});

// formulario Actualizaciones perfil_corredor
$('#Actualizar_corredor_form').submit(function(e){
  var formData = new FormData($(this)[0]);
  var inpusts=$('.form-control').val();
    $.ajax({
        url: "vistas/acciones/corredor/Actualizar_corredor_form.php",
        type: "POST",
        data: formData,
        async: false,
        beforeSend:function() {
          $('#Enviar_formulario').attr('disabled', 'true');
          alertify.success('Sistema: Enviando el formulario...');
        },success:function(html) {
          $('#contenido').fadeOut(100).html(html).fadeIn(500);
          $('#Enviar_formulario').removeAttr('disabled');
          window.scrollTo(500, 0);

        }, error:function() {
          setTimeout(function () {
            alertify.error('Sistema: La pagina solicitada esta colgada');
            $('#Enviar_formulario').removeAttr('disabled');
        }, 800);
        },
        cache: false,
        contentType: false,
        processData: false
    });
    e.preventDefault();
});



 /////////////////////////////////////////////////////////////////////////
 //  _     _     _            _          ____ _ _            _         ///
 // | |   (_)___| |_ __ _  __| | ___    / ___| (_) ___ _ __ | |_ ___   ///
 // | |   | / __| __/ _` |/ _` |/ _ \  | |   | | |/ _ \ '_ \| __/ _ \  ///
 // | |___| \__ \ || (_| | (_| | (_) | | |___| | |  __/ | | | ||  __/  ///
 // |_____|_|___/\__\__,_|\__,_|\___/   \____|_|_|\___|_| |_|\__\___|  ///
 //                                                                    ///
 /////////////////////////////////////////////////////////////////////////

 $('#search_cliente_jquery_form').submit(function(e){
   var checkBox = document.getElementById("Check_Articulo");
   var formData = new FormData($(this)[0]);
     $.ajax({
         url: "vistas/acciones/cliente/search_cliente.php",
         type: "POST",
         data: formData,
         async: false,beforeSend:function() {
           $('#search_cliente_jquery_buttom').attr('disabled', 'true');
         },
          success:function(e) {
            $('#search_cliente_jquery').fadeOut(0).html(e).fadeIn(1000);
            // tiempo para evitar que spamen este botom y evitar error con data table
            setTimeout(function () {
            $('#search_cliente_jquery_buttom').removeAttr('disabled');
          }, 800);
          },error:function() {
           setTimeout(function () {
             alertify.error('Sistema: La pagina solicitada esta colgada');
             $('#search_cliente_jquery_buttom').removeAttr('disabled');
         }, 800);
         },
         cache: false,
         contentType: false,
         processData: false
     });
     e.preventDefault();
 });



 //  _ _     _            _                                     _
 // | (_)___| |_ __ _  __| | ___     ___ ___  _ __ _ __ ___  __| | ___  _ __
 // | | / __| __/ _` |/ _` |/ _ \   / __/ _ \| '__| '__/ _ \/ _` |/ _ \| '__|
 // | | \__ \ || (_| | (_| | (_) | | (_| (_) | |  | | |  __/ (_| | (_) | |
 // |_|_|___/\__\__,_|\__,_|\___/   \___\___/|_|  |_|  \___|\__,_|\___/|_|
 //



 $('#search_Corredor_de_bolsa_jquery_form').submit(function(e){
   var checkBox = document.getElementById("Check_Articulo");
   var formData = new FormData($(this)[0]);
     $.ajax({
         url: "vistas/acciones/corredor/search_corredor.php",
         type: "POST",
         data: formData,
         async: false,beforeSend:function() {
           $('#search_cliente_jquery_buttom').attr('disabled', 'true');
         },
          success:function(e) {
            $('#search_Corredor_de_bolsa_jquery').fadeOut(0).html(e).fadeIn(1000);
            // tiempo para evitar que spamen este botom y evitar error con data table
            setTimeout(function () {
            $('#search_Corredor_de_bolsa_jquery_buttom').removeAttr('disabled');
          }, 800);
          },error:function() {
           setTimeout(function () {
             alertify.error('Sistema: La pagina solicitada esta colgada');
             $('#search_Corredor_de_bolsa_jquery_buttom').removeAttr('disabled');
         }, 800);
         },
         cache: false,
         contentType: false,
         processData: false
     });
     e.preventDefault();
 });



 //  _     _     _            _             _                              _                 ____ _ _            _
 // | |   (_)___| |_ __ _  __| | ___     __| | ___   _ __   ___  _ __ ___ (_)_ __   __ _    / ___| (_) ___ _ __ | |_ ___
 // | |   | / __| __/ _` |/ _` |/ _ \   / _` |/ _ \ | '_ \ / _ \| '_ ` _ \| | '_ \ / _` |  | |   | | |/ _ \ '_ \| __/ _ \
 // | |___| \__ \ || (_| | (_| | (_) | | (_| |  __/ | | | | (_) | | | | | | | | | | (_| |  | |___| | |  __/ | | | ||  __/
 // |_____|_|___/\__\__,_|\__,_|\___/   \__,_|\___| |_| |_|\___/|_| |_| |_|_|_| |_|\__,_|___\____|_|_|\___|_| |_|\__\___|
 //                                                                                    |_____|
 //
 $('#search_nomina_jquery_form').submit(function(e){
   var checkBox = document.getElementById("Check_Articulo");
   var formData = new FormData($(this)[0]);
     $.ajax({
         url: "vistas/acciones/nominas/nomina_clientes_listado.php",
         type: "POST",
         data: formData,
         async: false,beforeSend:function() {
           $('#search_nomina_jquery_buttom').attr('disabled', 'true');
         },
          success:function(e) {
            $('#search_nomina_jquery').fadeOut(0).html(e).fadeIn(1000);
            // tiempo para evitar que spamen este botom y evitar error con data table
            setTimeout(function () {
            $('#search_nomina_jquery_buttom').removeAttr('disabled');
          }, 800);
          },error:function() {
           setTimeout(function () {
             alertify.error('Sistema: La pagina solicitada esta colgada');
             $('#search_nomina_jquery_buttom').removeAttr('disabled');
         }, 800);
         },
         cache: false,
         contentType: false,
         processData: false
     });
     e.preventDefault();
 });

 //  _                                      _ _            _
 // | |__   ___  _ __ _ __ __ _ _ __    ___| (_) ___ _ __ | |_ ___
 // | '_ \ / _ \| '__| '__/ _` | '__|  / __| | |/ _ \ '_ \| __/ _ \
 // | |_) | (_) | |  | | | (_| | |    | (__| | |  __/ | | | ||  __/
 // |_.__/ \___/|_|  |_|  \__,_|_|     \___|_|_|\___|_| |_|\__\___|
 //
 //

 function Eliminar_cliente(id_cliente) {
   alertify.confirm("Sistema: ¿Realmente quieres Eliminar Este Cliente? <br> <center>Preciona 'OK' para Eliminar. </center>",
   function(){
   alertify.success('Sistema:Eliminando del sistema...');
   $.ajax({
     type:'POST',
     data:'id='+id_cliente,
     url:'vistas/acciones/cliente/Eliminar_cliente.php',
     success:function(msg) {
       $('#Alerta_new_surtidora').html(msg);
       // para crear tiempo para la recarga de la vista
         setTimeout(function () {
             // Listado_Cliente();
         }, 500);
     }
   })
   },
   function(){
   alertify.error('Sistema: Cancelado');
   });
 };


 //  ____                               ____                        _
 // | __ )  ___  _ __ _ __ __ _ _ __   / ___|___  _ __ _ __ ___  __| | ___  _ __
 // |  _ \ / _ \| '__| '__/ _` | '__| | |   / _ \| '__| '__/ _ \/ _` |/ _ \| '__|
 // | |_) | (_) | |  | | | (_| | |    | |__| (_) | |  | | |  __/ (_| | (_) | |
 // |____/ \___/|_|  |_|  \__,_|_|     \____\___/|_|  |_|  \___|\__,_|\___/|_|
 //

function Eliminar_corredor(e) {
  alertify.confirm("Sistema: ¿Realmente quieres Eliminar Este corredor? <br>  <center>Preciona 'OK' para Eliminar. <br><br> <center><i class='fas fa-exclamation-triangle fa-3x m-2 text-warning animated bounce infinite'></i></center></center> <cite>Nota: Al eliminar el corredor no afectara los cliente que previamente tengan el nombre de dicho corredor en su registro, pero no aparecera en la lista para selecionarlo para futuros cliente o modificaciones. </cite><br>",
    function () {
      alertify.success('Sistema:Eliminando del sistema...');

      $.ajax({
        type:'POST',
        data:'id='+e,
        url:'vistas/acciones/corredor/eliminar_corredor.php',
        success:function(msg) {
          $('#Alerta_new_surtidora').html(msg);
          // para crear tiempo para la recarga de la vista
            setTimeout(function () {
                // Listado_Cliente();
            }, 500);
        }
      })
    },function () {
       alertify.error('Sistema: Cancelado');
    });
};





 //
 //                                      _ _            _
 //  _ __   __ _  __ _  __ _ _ __    ___| (_) ___ _ __ | |_ ___
 // | '_ \ / _` |/ _` |/ _` | '__|  / __| | |/ _ \ '_ \| __/ _ \
 // | |_) | (_| | (_| | (_| | |    | (__| | |  __/ | | | ||  __/
 // | .__/ \__,_|\__, |\__,_|_|     \___|_|_|\___|_| |_|\__\___|
 // |_|          |___/
 ///


 function Nomina_cliente_pagar(e) {
   $('.progress-bar').css('width', 0+'%');


   alertify.confirm("<center><i class='fas fa-exclamation fa-4x text-warning animated shake '></i><br><br> Sistema: Esta apunto de aplicar un pago. ¿Esta seguro? <br> El cliente recibira un correo notificandole que se le aplico el pago.<br><br><br> Sistema: Selecione foto de la factura de esta transacción (peso maximo 3MB) <br><input type='file' id='file' value=''><Br><Br>Sistema: Por favor llene esta casilla..<BR><input type='text' id='Numero_tiker' class='form-control'> ",
     function () {
       $('#carga_progreso').modal('show');
       img=document.getElementById('file').files[0];
       numero_tran=$('#Numero_tiker').val();
       formData = new FormData();
       formData.append("photo", img);
       formData.append("Numero_factura", numero_tran);
       formData.append("id", e);
       $.ajax({
         type:'POST',
          dataType: "html",
         data:formData,
         url:' vistas/acciones/nominas/pay_clienteV1_cliente.php',
         cache: false,
         contentType: false,
         processData: false,
         xhr: function () {
        var xhr = $.ajaxSettings.xhr();
         xhr.upload.onprogress = function (e) {
            // For uploads
            if (e.lengthComputable) {
                var percentComplete =(e.loaded / e.total);
                console.log($por=Math.round(percentComplete * 100));
                $('.progress-bar').attr('data-progress',$por );
                $('.progress-bar').css('width', $por+'%');
            }
        };
        return xhr;
    },
         beforeSend:function (e) {
           alertify.success('Sistema: Procesando datos....');
         },
         success:function(msg) {
           $('#Alerta_new_surtidora').html(msg);
           // para crear tiempo para la recarga de la vista
           alertify.success('Sistema: Todo los datos Recibido');
           $('#carga_progreso').modal('toggle');

             setTimeout(function () {
             }, 500);
         }
       })
     },function () {
        alertify.error('Sistema: Pago Cancelado');
     });
 };


 //
 //
 //  _____     _     _          ____ _ _            _             _   _                       _
 // |_   _|_ _| |__ | | __ _   / ___| (_) ___ _ __ | |_ ___      | \ | | ___  _ __ ___  _ __ (_)_ __   __ _
 //   | |/ _` | '_ \| |/ _` | | |   | | |/ _ \ '_ \| __/ _ \     |  \| |/ _ \| '_ ` _ \| '_ \| | '_ \ / _` |
 //   | | (_| | |_) | | (_| | | |___| | |  __/ | | | ||  __/     | |\  | (_) | | | | | | | | | | | | | (_| |
 //   |_|\__,_|_.__/|_|\__,_|  \____|_|_|\___|_| |_|\__\___|     |_| \_|\___/|_| |_| |_|_| |_|_|_| |_|\__,_|
 //
 //


 // new function
 function Validad_busqueda_empresa(e) {
   if (e=='Todas') {
     $('#Nombre').attr('disabled', 'true');
     $('#Nombre').val('');
   }else {
     $('#Nombre').removeAttr('disabled');
   }
 };

 $('#search_empresa_jquery_form').submit(function(e){
   var checkBox = document.getElementById("Check_Articulo");
   var formData = new FormData($(this)[0]);
     $.ajax({
         url: "vistas/acciones/empresas/listado_empresas.php",
         type: "POST",
         data: formData,
         async: false,beforeSend:function() {
           $('#search_cliente_jquery_buttom').attr('disabled', 'true');
         },
          success:function(e) {
            $('#search_cliente_jquery').fadeOut(0).html(e).fadeIn(1000);
            // tiempo para evitar que spamen este botom y evitar error con data table
            setTimeout(function () {
            $('#search_cliente_jquery_buttom').removeAttr('disabled');
          }, 800);
          },error:function() {
           setTimeout(function () {
             alertify.error('Sistema: La pagina solicitada esta colgada');
             $('#search_cliente_jquery_buttom').removeAttr('disabled');
         }, 800);
         },
         cache: false,
         contentType: false,
         processData: false
     });
     e.preventDefault();
 });





 function validad_sueldo(valor) {
var string = numeral(valor).format('0,0');
   $('#sueldo_mensual').val(string);
 };
 number=0;
 function Agregar_referido() {
   number=number+1;
   var x ='<div id="referido'+number+'"><hr><div class="row" ><div class="col-md-4"><div class="m-t-80"><h6 class="text-muted">Nombre completo del garante </h6><input type="text"  class="form-control" style="text-transform: capitalize;" name="Nombre_referido[]" value="" maxlength="80" required id="Nombre_Articulos_form"/></div></div><div class="col-md-3"> <div class="m-t-80"><h6 class="text-muted">Cédula del garante </h6><input type="text"  class="form-control" name="Cédula_referido[]"   data-mask="999-9999999-9" value=""  required/></div></div><div class="col-md-3"><div class="m-t-80"><h6 class="text-muted">Teléfono del garante </h6><input type="text"  class="form-control" name="Teléfono_referido[]"   data-mask="(999) 999-9999" value=""  required/></div></div><div class="col-md-2"><span class="m-t-20"><h6 class="text-muted">&nbsp;</h6> <i class="fas fa-trash fa-2x text-danger" onclick="removeInput('+number+')" style="cursor:pointer" ></i></span></div><div class="col-md-4"> <div class="m-t-20"><h6 class="text-muted">Dirección  </h6><textarea name="Dirección_referido[]"  class="form-control" rows="10" maxlength="320" id="Descipcion_Articulos_form"></textarea></div></div> <div class="col-md-4"><div class="m-t-20"><h6 class="text-muted">Foto  Garante</h6><input  name="img_Garante[]" id="img_Garante'+number+'" class="form-control m-3 dropify-gatante" data-allowed-file-extensions="jpeg"  type="file" accept="image/jpeg" required></div></div><div class="col-md-4"><div class="m-t-20"><h6 class="text-muted">&nbsp;</h6><i class="fas fa-plus fa-3x text-success" style="cursor:pointer" onclick="Agregar_referido()"></i></div></div></div></div>';
  $('#inicio_row_referido').append(x);
  alertify.success('Sistema: Casilla para mas Garante añadida, Puedes introducir el otro garante');
  foto_garante();//dropify function
  limitantes();
};
number_img_variable=0;
function Agregar_img_variable() {
  number_img_variable=number_img_variable+1;
  var y ='<div id="img_variada'+number_img_variable+'"<div class="row"><div class="col-md-10"><div class="m-t-20"><h6 class="text-muted">Foto Variada del Cliente</h6><input  name="img_variada[]" class="form-control m-3 dropify " data-allowed-file-extensions="jpeg"  type="file" accept="image/jpeg" required></div></div><div class="col-md-1"><div class="m-t-20"><h6 class="text-muted">&nbsp;</h6><i class="fas fa-plus fa-3x text-success" style="cursor:pointer" onclick="Agregar_img_variable()"></i></div></div><div class="col-md-1"><span class="m-t-20"><h6 class="text-muted">&nbsp;</h6><i class="fas fa-trash fa-2x text-danger" onclick="img_variable_removeInput('+number_img_variable+')" style="cursor:pointer" ></i></span></div></div></div>';

  alertify.success('Sistema: Casilla para mas Fotos añadida, Puedes introducir el otra fotografía Variada');
  $('#inicio_row_fotos_variada').append(y);
  foto_variada();//dropify function
  return  number_img_variable;
}
function img_variable_removeInput(number_img_variable) {
$("#img_variada"+number_img_variable).last().remove();
}
function removeInput(number) {
  $("#referido"+number).last().remove();
};



var debito_americanExpress = "https://upload.wikimedia.org/wikipedia/commons/thumb/f/fa/American_Express_logo_%282018%29.svg/1200px-American_Express_logo_%282018%29.svg.png";
var debito_visa = "https://upload.wikimedia.org/wikipedia/commons/1/16/Former_Visa_%28company%29_logo.svg";
var debito_masterCard ="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b7/MasterCard_Logo.svg/1200px-MasterCard_Logo.svg.png";

function validar_debito_o_credito(numeración) {
    if (numeración.substr(0,1)=='5') {//si da como 5 es master Card
        $('#logo_debito').removeAttr('hidden')
        $('#logo_debito').attr('src',debito_masterCard)
    }else if (numeración.substr(0,1)=='4') {
      $('#logo_debito').removeAttr('hidden')
      $('#logo_debito').attr('src',debito_visa)
    }else if (numeración.substr(0,1)=='3') {
      $('#logo_debito').removeAttr('hidden')
      $('#logo_debito').attr('src',debito_americanExpress)
    }else {
      $('#logo_debito').attr('hidden',true)
      $('#logo_debito').attr('src','')
    }
}
function verificar_tarjeta_entregada(valor) {
  if (valor=='No') {
    $('.tarjeta_foto_div').attr('hidden',true);
    $('.tarjeta_foto').attr('disabled',true);
  }else {
    $('.tarjeta_foto_div').removeAttr('hidden');
    $('.tarjeta_foto').removeAttr('disabled');
  }
};

function limitantes(){
  $('textarea#Descipcion_Articulos_form').maxlength({
    alwaysShow: true,
    warningClass: "badge badge-success",
    limitReachedClass: "badge badge-danger"
  });
  $('input#Nombre_Articulos_form').maxlength({
    alwaysShow: true,
    warningClass: "badge badge-success",
    limitReachedClass: "badge badge-danger"
  });
};
$('.dropify-cliente').dropify({
  messages: {
      'default': 'Selecione Foto de perfil',
      'replace': 'Drag and drop or click to replace',
      'remove':  'Eliminar',
      'error':   'Ooops, something wrong happended.'
  }
});
$('.dropify-Cedula-atras').dropify({
  messages: {
      'default': 'Selecione Foto de la cedula Atras',
      'replace': 'Drag and drop or click to replace',
      'remove':  'Eliminar',
      'error':   'Ooops, something wrong happended.'
  }
});
$('.dropify-Cedula-delante').dropify({
  messages: {
      'default': 'Selecione Foto de la cedula dalantera',
      'replace': 'Drag and drop or click to replace',
      'remove':  'Eliminar',
      'error':   'Ooops, something wrong happended.'
  }
});

$('.dropify-Tarjeta-delante').dropify({
  messages: {
      'default': 'Selecione Foto de la Tarjeta dalantera',
      'replace': 'Drag and drop or click to replace',
      'remove':  'Eliminar',
      'error':   'Ooops, something wrong happended.'
  }
});

$('.dropify-tarjeta-atras').dropify({
  messages: {
      'default': 'Selecione Foto de la Tarjeta trasera',
      'replace': 'Drag and drop or click to replace',
      'remove':  'Eliminar',
      'error':   'Ooops, something wrong happended.'
  }
});
$('.dropify-clave').dropify({
  messages: {
      'default': 'Selecione Foto de la Tarjeta de Clave',
      'replace': 'Drag and drop or click to replace',
      'remove':  'Eliminar',
      'error':   'Ooops, something wrong happended.'
  }
});
foto_garante();
function foto_garante() {
$('.dropify-gatante').dropify({
  messages: {
      'default': 'Selecione Foto del Garante',
      'replace': 'Drag and drop or click to replace',
      'remove':  'Eliminar',
      'error':   'Ooops, something wrong happended.'
  }
});
};
foto_variada();
function foto_variada() {
  $('.dropify').dropify();
};


$('#Registrar_cliente_form').submit(function(e){
     window.scroll({
         top: 0,
         left: 100,
         behavior: 'smooth'
       });
     $('.progress-bar').css('width', 0+'%');
     $('.progress').removeAttr('hidden');
     $('.progress').show();
     var formData = new FormData($(this)[0]);
     $.ajax({
       url: 'vistas/acciones/cliente/Registrar_cliente.php',
       dataType: "html",
       type: 'POST',
       data: formData,
       cache: false,
       contentType: false,
       processData: false,
       xhr: function () {
       var xhr = $.ajaxSettings.xhr();
       xhr.upload.onprogress = function (e) {
          if (e.lengthComputable) {
              var percentComplete =(e.loaded / e.total);
              $por=Math.round(percentComplete * 100);
              $('.progress-bar').attr('data-progress',$por );
              $('.progress-bar').css('width', $por+'%');
              $('.porciento-bar').html($por+'%');
          }
       };
       return xhr;
       },success:function(msg) {
       $('.progress').hide(0);
         setTimeout(function () {
         }, 1);
         window.scroll({
               top: 0,
               left: 100,
               behavior: 'smooth'
               });
         $('#contenido').html(msg);

     },error:function() {
     }
   });
});



 function Lista_Puesto_option(id) {
   $.ajax({
     type:'POST',
     data:"id_empresa="+id,
     url:'vistas/acciones/empresas/puesto_empresa_list_option.php',
     success:function (resp) {
       $('#inicio_puesto').fadeOut(0).html(resp).fadeIn(1000)
       // window.scrollTo(500, 0);
     }
   });
   };



   // funcion ajena

   document.getElementById('email').addEventListener('input', function() {
    campo = event.target;

    emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
    //Se muestra un texto a modo de ejemplo, luego va a ser un icono
    if (emailRegex.test(campo.value)) {
      $('#email').removeClass('bg-warning');
      $('#element').tooltip('hide');
    } else {
      $('#email').removeClass('bg-success');
      $('#email').addClass('bg-warning');
      $('#element').tooltip('show')
    }
});
function validar_cedula(cedula) {
  $.ajax({
    type:'POST',
    data:"cedula="+cedula,
    url:'vistas/acciones/cliente/disponibilidad_cedula.php',
    success:function (resp) {
      $('#Auxiliar_code').html(resp);
      // window.scrollTo(500, 0);
    }
  });
};
