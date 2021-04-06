<?php
include '../../componentes/conexion/conexion.php';
  $sql_categoria='SELECT * FROM `categorias`';// enlaces de categoria
  $mysli_categoria=mysqli_query($conexion,$sql_categoria);

  $sql_unidades='SELECT * FROM `unidades`';
  $mysli_unidad=mysqli_query($conexion,$sql_unidades);

   $sqli_lista_banco="SELECT * FROM `Bancos_lista` ORDER BY `Bancos_lista`.`Banco` ASC";
   $mysli=mysqli_query($conexion,$sqli_lista_banco);

   $sqli_lista_corredores="SELECT * FROM `Corredore_bolsa` ORDER by `Nombre` ASC";
   $mysli2=mysqli_query($conexion,$sqli_lista_corredores);
 ?>
<div class="container-fluid">
    <!-- Page-Title -->
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h4 class="page-title">Registrar Empresa</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="javascript:Escritorio();">Escritorio</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Empresa</a></li>
                    <li class="breadcrumb-item active">Registrar Empresa</li>
                </ol>
            </div>
        </div>
        <!-- end row -->
      </div>
      <!-- formulario articulos -->
      <div class="card shadow-none">
        <div class="card-body">
          <div class="form-group">

            <div class="col-12">
              <form class="" id="Registrar_Empresa_form" action="javascript:void(0)" method="post" enctype="multipart/form-data">

                <div class="row show-grid">
                  <!-- nombre -->
                  <div class="col-md-4 ">
                    <div class="m-t-20">
                      <h6 class="text-muted">Nombre </h6>
                        <input type="text"  class="form-control" style="text-transform: capitalize;" name="Nombre" value="" maxlength="80" required id="Nombre_Articulos_form"/>
                    </div>
                  </div>
                  <div class="col-md-4 ">
                    <div class="m-t-20">
                      <h6 class="text-muted">Teléfono </h6>
                        <input type="text"  class="form-control" name="Teléfono" data-mask="(999) 999-9999" value="" maxlength="10" required />
                    </div>
                  </div>

                <div class="col-md-4">
                    <div class="m-t-20">
                      <h6 class="text-muted">Dirección  </h6>
                      <textarea name="Dirección"  class="form-control" rows="1"   maxlength="1500" id="Descipcion_Articulos_form"></textarea>
                    </div>
                  </div>
                  <div class="col-md-6">
                      <div class="m-t-20">
                        <h6 class="text-muted">Destalles  </h6>
                        <textarea name="Detalles"  class="form-control " rows="10"   maxlength="1500" id="Descipcion_Articulos_form"></textarea>
                      </div>
                    </div>
                  <div class="col-md-6">
                    <div class="m-t-20">
                    <h6 class="text-muted">Foto</h6>
                          <input  name="img" class="form-control dropify"  type="file"  data-allowed-file-extensions="jpeg"  accept="image/jpeg">
                    </div>
                  </div>
                  <div class="col-md-4 m-3">
                    <div class="m-t-20">
                      <input type="checkbox" class="form-check-input" id="Check_Articulo"  >
                       <label class="form-check-label" for="Check_Articulo">Seguir Registrando Empresas. </label>
                    </div>
                  </div>
                  <hr>
                  <input type="submit" id="Enviar_formulario"class="btn btn-primary btn-block btn-lg waves-effect waves-light" name="" value="Registrar Empresa">
              </form>
            </div>
          </div>
        </div>
        </div>
        <!-- alerta -->
        <div class="" id="contenido">
        </div>

</div>

<!-- table -->
<script src="assets/js/Tables.js"></script>

<script src="assets/js/acciones.js?v=1"></script>
<!-- limites_form -->
<script src="assets/js/limites_form.js"></script>

<!-- script nesesarios -->
<script type="text/javascript">
  $('.dropify').dropify({
    messages: {
        'default': 'Selecione el logo de la empresa',
        'replace': 'Drag and drop or click to replace',
        'remove':  'Eliminar',
        'error':   'Ooops, something wrong happended.'
    }
});
</script>
