// principal v1

$(document).ready(function() {
  Escritorio();
});

function Escritorio() {
  $.ajax({
    type:"POST",
    url:"vistas/Escritorio.php",
    success:function(resp) {
      $('#Vistas_control').fadeOut(0).html(resp).fadeIn(1000)
    }
  })
};

// articulos v1
function articulos() {
$.ajax({
  type:"POST",
  url:"vistas/articulos.php",
  success:function(resp) {
    $('#Vistas_control').html(resp);
  }
});
};
// mantenimiento{
// creacion de categorias para los articulos en mantenimiento se podra añadir categorias etc
function categorias() {
  $.ajax({
    type:'POST',
    url:'vistas/mantenimiento/categorias.php',
    success:function (resp) {
      $('#Vistas_control').html(resp);
    }
  });
};
function Medidas_unidades() {
  $.ajax({
    type:'POST',
    url:'vistas/mantenimiento/unidad_medida.php',
    success:function (resp) {
      $('#Vistas_control').html(resp);
    }
  });
};
function Añadir_Articulos() {
  $.ajax({
    type:'POST',
    url:'vistas/mantenimiento/crear_articulo.php',
    success:function (resp) {
      $('#Vistas_control').html(resp);
    }
  });
};
function almacen_Articulos() {
  $.ajax({
    type:'POST',
    url:'vistas/mantenimiento/almacen/articulos.php',
    success:function (resp) {
      $('#Vistas_control').html(resp);
    }
  });
};

// surtidoras
function Surtidoras() {
  $.ajax({
    type:'POST',
    url:'vistas/mantenimiento/surtidoras.php',
    success:function (resp) {
      $('#Vistas_control').html(resp);
    }
  });
};


// }
// /mantenimiento
// Compras
function Surtidoras_Compras() {
  $.ajax({
    type:'POST',
    url:'vistas/compras/surtidores.php',
    success:function (resp) {
      $('#Vistas_control').html(resp);
    }
  });
};


//

// sistema de entrada solo envio de los datos de usuarios
  $('#login_form').submit(function(){
    usuario=$('#Usuario').val();
    contraseña=$('#Contraseña').val();
    $.ajax({
      type:"POST",
      data:'u='+usuario+'&c='+contraseña,
      url:'vistas/acciones/loginV1.php',
      success:function (resp) {
        $('#Alertsjs').html(resp);
      }
    });
  });
  // sistema de deslog
  function deslog() {
  alertify.confirm("¿Realmente quieres finalizar la sesion? Preciona 'OK' para Finalizar.",
  function(){
  alertify.success('Sacandote del sistema...');
  $.ajax({
    type:'POST',
    //solo debo abrir el archivo para quemar la sessiones
    url:'vistas/acciones/Delet_Session.php',
    success:function () {
      // le doy un tiempo para asimilar el envio
      setTimeout(function () {
        location.href='login.php';
      }, 500);
    }
  });
  },
  function(){
  alertify.error('acción abortada');
  });
  };


 //
 //       _ _            _
 //   ___| (_) ___ _ __ | |_ ___  ___
 //  / __| | |/ _ \ '_ \| __/ _ \/ __|
 // | (__| | |  __/ | | | ||  __/\__ \
 //  \___|_|_|\___|_| |_|\__\___||___/
 //

  function Crear_cliente() {
    $.ajax({
      type:'POST',
      url:'vistas/cliente/cliente_registro.php',
      success:function (resp) {
        $('#Vistas_control').fadeOut(0).html(resp).fadeIn(1000)
        window.scrollTo(500, 0);
      }
    });
    };

  function Listado_Cliente() {
    $.ajax({
      type:'POST',
      url:'vistas/cliente/listado_clientes.php',
      success:function (resp) {
        $('#Vistas_control').fadeOut(0).html(resp).fadeIn(1000)
        window.scrollTo(500, 0);
      }
    });
    };
  function perfil_cliente_editar(e,m) {
    $.ajax({
      type:'POST',
      data:'id_cliente='+e+'&modalidad='+m,
      url:'vistas/cliente/perfil_cliente.php',
      beforeSend:function() {
        $('#Vistas_control').fadeOut(0).html('<div class="spinner-grow text-primary center-block" role="status" style=" margin-left: 50%;margin-top: 25%;"><span class="sr-only">Cargando...</span>').fadeIn(1000);
      },
      success:function (resp) {
        $('#Vistas_control').html(resp).fadeIn(1000);
        window.scrollTo(500, 0);
      }
    });
  };
  function perfil_cliente_ver(e,m) {
    $.ajax({
      type:'POST',
      data:'id_cliente='+e+'&modalidad='+m,
      url:'vistas/cliente/perfil_cliente.php',
      beforeSend:function() {
        $('#Vistas_control').fadeOut(0).html('<div class="spinner-grow text-primary center-block" role="status" style=" margin-left: 50%;margin-top: 25%;"><span class="sr-only">Cargando...</span>').fadeIn(1000);
      },
      success:function (resp) {
        $('#Vistas_control').html(resp).fadeIn(1000);
        window.scrollTo(500, 0);
      }
    });
  };


 //   ____                        _                           _        _           _
 //  / ___|___  _ __ _ __ ___  __| | ___  _ __ ___  ___    __| | ___  | |__   ___ | |___  __ _
 // | |   / _ \| '__| '__/ _ \/ _` |/ _ \| '__/ _ \/ __|  / _` |/ _ \ | '_ \ / _ \| / __|/ _` |
 // | |__| (_) | |  | | |  __/ (_| | (_) | | |  __/\__ \ | (_| |  __/ | |_) | (_) | \__ \ (_| |
 //  \____\___/|_|  |_|  \___|\__,_|\___/|_|  \___||___/  \__,_|\___| |_.__/ \___/|_|___/\__,_|
 //
function Registrar_corredor_De_bolsa() {
    $.ajax({
      type:'POST',
      url: 'vistas/corredor/Corredor_de_bolsa_registro.php',
      success:function (resp) {
        $('#Vistas_control').fadeOut(0).html(resp).fadeIn(1000)
        window.scrollTo(500, 0);
      }
    });
};
function Listado_corredor_de_bolsa() {
  $.ajax({
    type:'POST',
    url: 'vistas/corredor/corredor_de_bolsa_listado.php',
    success:function (resp) {
      $('#Vistas_control').fadeOut(0).html(resp).fadeIn(1000)
      window.scrollTo(500, 0);
    }
  });
};
function perfil_corredor_ver(e,m) {
  $.ajax({
    type:'POST',
    data:'id_corredor='+e+'&modalidad='+m,
    url:'vistas/corredor/perfil_corredor.php',
    beforeSend:function() {
      $('#Vistas_control').fadeOut(0).html('<div class="spinner-grow text-primary center-block" role="status" style=" margin-left: 50%;margin-top: 25%;"><span class="sr-only">Cargando...</span>').fadeIn(1000);
    },
    success:function (resp) {
      $('#Vistas_control').html(resp).fadeIn(1000);
      window.scrollTo(500, 0);
    }
  });
};
function perfil_corredor_editar(e,m) {
  $.ajax({
    type:'POST',
    data:'id_corredor='+e+'&modalidad='+m,
    url:'vistas/corredor/perfil_corredor.php',
    beforeSend:function() {
      $('#Vistas_control').fadeOut(0).html('<div class="spinner-grow text-primary center-block" role="status" style=" margin-left: 50%;margin-top: 25%;"><span class="sr-only">Cargando...</span>').fadeIn(1000);
    },
    success:function (resp) {
      $('#Vistas_control').html(resp).fadeIn(1000);
      window.scrollTo(500, 0);
    }
  });
};

 //
 //                        _                    _ _            _
 //  _ __   ___  _ __ ___ (_)_ __   __ _    ___| (_) ___ _ __ | |_ ___
 // | '_ \ / _ \| '_ ` _ \| | '_ \ / _` |  / __| | |/ _ \ '_ \| __/ _ \
 // | | | | (_) | | | | | | | | | | (_| | | (__| | |  __/ | | | ||  __/
 // |_| |_|\___/|_| |_| |_|_|_| |_|\__,_|  \___|_|_|\___|_| |_|\__\___|
 //
 //
 function Registrar_Empresa() {
   $.ajax({
     type:'POST',
     url: 'vistas/empresas/Registrar_Empresa.php',
     success:function (resp) {
       $('#Vistas_control').fadeOut(0).html(resp).fadeIn(1000)
       window.scrollTo(500, 0);
     },error:function () {
        alertify.success('Sistema: la pagina no responde')
     }
   });
 };




// nuevos code

 function listado_empresas() {
   $.ajax({
     type:'POST',
     url:'vistas/empresas/listado_empresas.php',
     success:function (resp) {
       $('#Vistas_control').fadeOut(0).html(resp).fadeIn(1000)
       window.scrollTo(500, 0);
     }
   });
   };
