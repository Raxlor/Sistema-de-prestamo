<?php
session_start();
include '../../componentes/conexion/conexion.php';
$id=$_SESSION['sucursal'];

 ?>

<div class="container-fluid">
    <!-- Page-Title -->
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h4 class="page-title">Registrar Cliente</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="javascript:Escritorio();">Escritorio</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Cliente</a></li>
                    <li class="breadcrumb-item active">Registrar Cliente</li>
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
              <form class="" id="Registrar_cliente_form" action="javascript:void(0)" method="post" enctype="multipart/form-data">

            <h5 class="text-muted">Datos Personales</h5>
                <div class="row show-grid">
                  <!-- nombre -->
                  <div class="col-md-4 ">
                    <div class="m-t-20">
                      <h6 class="text-muted">Nombre </h6>
                        <input type="text"  class="form-control" style="text-transform: capitalize;" name="Nombre" value="" maxlength="40" Esto_Requiere id="Nombre_Articulos_form"/>
                    </div>
                  </div>
                  <div class="col-md-4 ">
                    <div class="m-t-20">
                      <h6 class="text-muted">Apellido </h6>
                        <input type="text"  class="form-control" style="text-transform: capitalize;" name="Apellido" value="" maxlength="40" Esto_Requiere id="Nombre_Articulos_form"/>
                    </div>
                  </div>
                  <span id="Auxiliar_code" >  </span>
                  <div class="col-md-4 ">
                    <div class="m-t-20">
                      <h6 class="text-muted">Cédula </h6>
                      <span class="" id="Duplicada"  data-toggle="tooltip" title="Esta Cédula fue encontrada en nuestro banco de datos, por favor verifique, no puedes introducir duplicacion de datos. Almenos en esta sucursal"></span>
                        <input type="text"  class="form-control" name="Cédula"   data-mask="999-9999999-9" value=""  onkeyup="validar_cedula(this.value)"  Esto_Requiere/>
                    </div>
                  </div>
                  <div class="col-md-4 ">
                    <div class="m-t-20">
                      <h6 class="text-muted">Teléfono </h6>
                        <input type="text"  class="form-control" name="Teléfono" data-mask="(999) 999-9999" value="" maxlength="15" Esto_Requiere />
                    </div>
                  </div>
                  <!-- fin -->

                  <div class="col-md-4 ">
                    <div class="m-t-20">
                      <h6 class="text-muted">Correo Eletronico </h6>
                      <span class="" id="element"  data-toggle="tooltip" title="Por favor poner @, el correo debe quedar así: Nombre@dominio.com "></span>
                        <input type="Email"  style="text-transform: lowercase;" class="form-control email_validad" name="Email" value="" maxlength="80" Esto_Requiere id="email"/>

                    </div>
                  </div>
                  <div class="col-md-4 ">
                    <div class="m-t-20">
                      <h6 class="text-muted">Fecha De Nacimiento </h6>
                      <?php
                        $date_time_Y=date('Y');
                        $date_time_Y=$date_time_Y-18;//esto es para que el minimo de edad sea 18 años
                        $date_time_m_d=date('m-d');
                        //para sacar la fecha maxima porque obvio una persona no sacara un prestamo a los  100 año
                        $data_time_min_Y=date('Y');
                        $data_time_min_Y=$data_time_min_Y-99;//evito que se introdusca dato con mas de 99 años
                        $date_time_m_d=date('m-d');
                       ?>
                      <input type="date" name="fecha_nacimiento" class="form-control" min="<?php echo $data_time_min_Y.'-'.$date_time_m_d ?>" max="<?php echo $date_time_Y.'-'.$date_time_m_d ?>" value="" Esto_Requiere/>
                    </div>
                  </div>
                  <div class="col-md-4 ">
                    <div class="m-t-20">
                      <h6 class="text-muted">Empresa </h6>
                        <select class="form-control" name="Cliente_empresa" onchange="Lista_Puesto_option(this.value)" Esto_Requiere >
                            <option value="">Seleciona Empresar</option>
                              <?php
                                  $sql_cliente_sqli="SELECT * FROM `Empresas` WHERE `Id_a_sucursal`='$id' order by `Nombre_empresa` asc";
                                    $mysqli=mysqli_query($conexion,$sql_cliente_sqli);
                                    while ($empresa_option=mysqli_fetch_array($mysqli)) {
                                    ?>
                                      <option value="<?php echo $empresa_option['id_empresa'] ?>"><?php echo $empresa_option['Nombre_empresa'] ?></option>
                                    <?php
                                    }
                               ?>
                        </select>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="m-t-20">
                      <h6 class="text-muted">Puesto en la Empresa </h6>
                      <div class="form-group has-feedback">
                        <i class="fas fa-building form-control-feedback"></i>
                        <select class="form-control form-control-padding"   id="inicio_puesto" name="Posicion_de_Trabajo " Esto_Requiere>
                            <option value="" id="">Selecione Puesto</option>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="m-t-20">
                      <h6 class="text-muted">Sueldo mensual </h6>
                      <input type="text"  class="form-control" name="pago_mensual"  id="sueldo_mensual" value="" maxlength="18" onchange="validad_sueldo(this.value)" Esto_Requiere />
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="m-t-20">
                      <h6 class="text-muted">Fecha De ingreso a la Empresa </h6>
                      <?php
                        $data_time_min_Y=date('Y');
                        $data_time_min_Y=$data_time_min_Y-80;//evito que se introdusca dato con mas de 80 años
                        $date_time_m_d=date('m-d');
                        $data_time_max_Y=date('Y');
                        $data_time_max_Y=$data_time_max_Y;
                       ?>

                      <input type="date"  class="form-control" name="Fecha_de_ingreso" max="<?php echo $data_time_max_Y.'-'.$date_time_m_d ?>" min="<?php echo $data_time_min_Y.'-'.$date_time_m_d ?>" id="" value="" Esto_Requiere />
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="m-t-20">
                      <h6 class="text-muted">Código De Empleado/a</h6>
                      <input type="text"  class="form-control"  style="text-transform: capitalize;"  name="Código_empleado"  id="Nombre_Articulos_form" value="" maxlength="30" Esto_Requiere />
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="m-t-20">
                      <h6 class="text-muted">Nombre Supervisor/a </h6>
                      <input type="text"  class="form-control"  style="text-transform: capitalize;"  name="Nombre_supervisor"  id="Nombre_Articulos_form" value="" maxlength="80" Esto_Requiere />
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="m-t-20">
                      <h6 class="text-muted">Cédula Supervisor/a </h6>
                      <input type="text"  class="form-control" name="Cedula_Supervisor"   data-mask="999-9999999-9" id="" value="" maxlength="80" Esto_Requiere />
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="m-t-20">
                      <h6 class="text-muted">Teléfono Supervisor/a </h6>
                      <input type="text"  class="form-control" name="Teléfono_Supervisor"   data-mask="(999) 999-9999" id="" value="" maxlength="80" Esto_Requiere />
                    </div>
                  </div>




                <div class="col-md-6">
                    <div class="m-t-20">
                      <h6 class="text-muted">Dirección  </h6>
                      <textarea name="Dirección"  class="form-control" rows="10"   maxlength="320" id="Descipcion_Articulos_form"></textarea>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="m-t-20">
                    <h6 class="text-muted">Foto de perfil</h6>
                          <input  name="img_perfil" class="form-control m-3 dropify-cliente" data-allowed-file-extensions="jpeg"  type="file" accept="image/jpeg" Esto_Requiere>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="m-t-20">
                    <h6 class="text-muted">Foto de cédula  delantera</h6>
                          <input  name="img_cédula_delante" class="form-control m-3 dropify-Cedula-delante" data-allowed-file-extensions="jpeg"  type="file" accept="image/jpeg" Esto_Requiere>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="m-t-20">
                    <h6 class="text-muted">Foto de cédula trasera</h6>
                          <input  name="img_cédula_atras" class="form-control m-3 dropify-Cedula-atras" data-allowed-file-extensions="jpeg"  type="file" accept="image/jpeg" Esto_Requiere>
                    </div>
                  </div>

                </div>
                  <hr>
                  <h5 class="text-muted">Referido</h5>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="m-t-80">
                        <h6 class="text-muted">Nombre completo del garante </h6>
                        <input type="text"  class="form-control" style="text-transform: capitalize;" name="Nombre_referido[]" value="" maxlength="80" Esto_Requiere id="Nombre_Articulos_form"/>
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="m-t-80">
                        <h6 class="text-muted">Cédula del garante </h6>
                        <input type="text"  class="form-control" name="Cédula_referido[]"   data-mask="999-9999999-9" value=""  Esto_Requiere/>
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="m-t-80">
                        <h6 class="text-muted">Teléfono del garante </h6>
                        <input type="text"  class="form-control" name="Teléfono_referido[]"   data-mask="(999) 999-9999" value=""  Esto_Requiere/>
                      </div>
                    </div>
                    <div class="col-md-4">
                        <div class="m-t-20">
                          <h6 class="text-muted">Dirección  </h6>
                          <textarea name="Dirección_referido[]"  class="form-control" rows="10"   maxlength="320" id="Descipcion_Articulos_form"></textarea>
                        </div>
                      </div>
                      <div class="col-md-4">
                          <div class="m-t-20">
                            <h6 class="text-muted">Foto  Garante</h6>
                            <input  name="img_Garante[]"  id="img_Garante" class="form-control m-3 dropify-gatante" data-allowed-file-extensions="jpeg"  type="file" accept="image/jpeg" Esto_Requiere>
                          </div>
                        </div>
                    <div class="col-md-4">
                      <div class="m-t-20">
                      <h6 class="text-muted">&nbsp;</h6>
                      <i class="fas fa-plus fa-3x text-success" style="cursor:pointer" onclick="Agregar_referido()"></i>
                    </div>
                    </div>
                  </div>
                  <div class="" id="inicio_row_referido"></div> <!--esto es para auxilar la generacion de div -->
                  <hr>
                  <h5 class="text-muted">Datos de Tarjeta</h5>
                  <div class="row">
                    <!-- fin 3x4=12 -->
                    <div class="col-md-2">
                      <div class="m-t-20">
                        <h6 class="text-muted">Banco </h6>
                          <select class="form-control" name="Banco"  Esto_Requiere onchange="Validad_Banco(this.value)">
                            <option value="">Selecionar Banco.</option>
                            <?php
                            $sqli_lista_banco="SELECT * FROM `Bancos_lista` ORDER BY `Bancos_lista`.`Nombre` ASC";
                              $mysli=mysqli_query($conexion,$sqli_lista_banco);
                              while ($array_Banco=mysqli_fetch_array($mysli)) {
                                ?>
                                <option value="<?php echo $array_Banco['id'] ?>"><?php echo $array_Banco['Nombre'] ?></option>
                                <?php
                              };
                             ?>
                          </select>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="m-t-20">
                        <h6 class="text-muted">Numero de cuenta </h6>
                        <!-- <div class="form-group has-feedback"> -->
                          <!-- <img class="form-control-feedback" src="" alt="" hidden style="margin-top: -3px;" width="40" height="39"> -->
                          <input type="text"  class="form-control" name="Numero_cuenta" value="" maxlength="20" Esto_Requiere id="Banco"/>
                        <!-- </div> -->
                      </div>
                    </div>
                  <div class="col-md-3">
                      <div class="m-t-20">
                        <h6 class="text-muted">Usuario </h6>
                        <input type="text"  class="form-control" name="Usuario_banco" value="" maxlength="80" Esto_Requiere id=""/>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="m-t-20">
                        <h6 class="text-muted">Contraseña </h6>
                        <input type="text"  class="form-control" name="Contraseña_Banco" value="" maxlength="80" Esto_Requiere id=""/>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="m-t-20">
                        <h6 class="text-muted">¿Cuenta con la Tarjeta física? </h6>
                        <select  class="form-control" onchange="verificar_tarjeta_entregada(this.value)" name="tarjeta">
                          <option value="si">Si</option>
                            <option value="No">No</option>
                        </select>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="m-t-20">
                        <h6 class="text-muted">débito o crédito numeración</h6>
                        <div class="form-group has-feedback">
                          <i class="fas fa-credit-card form-control-feedback"></i>
                          <img class="form-control-feedback" src="" alt="" hidden style="margin-top: -3px;" width="40" height="39" id="logo_debito">
                          <input type="text"  class="form-control form-control-padding" name="Numero_débito" data-mask="9999 9999 9999 99?999" onfocus="validar_debito_o_credito(this.value)" onkeyup="validar_debito_o_credito(this.value)" value="" maxlength="20" Esto_Requiere id="Banco_tarjeta"/>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="m-t-20">
                        <h6 class="text-muted">Tarjeta De Código numeración</h6>
                        <div class="form-group has-feedback">
                          <i class="fas fa-credit-card form-control-feedback"></i>
                          <input type="text"  class="form-control form-control-padding" name="Numero_Codigo" data-mask="999999999999?99999" onfocus="validar_debito_o_credito(this.value)" onkeyup="validar_debito_o_credito(this.value)" value="" maxlength="20" Esto_Requiere id="Banco_tarjeta"/>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-4 tarjeta_foto_div">
                      <div class="m-t-20">
                      <h6 class="text-muted">Foto de Tarjeta Adelante</h6>
                            <input  name="img_Tarjeta_delante" class="form-control m-3 dropify-Tarjeta-delante tarjeta_foto" data-allowed-file-extensions="jpeg"  type="file" accept="image/jpeg" Esto_Requiere>
                      </div>
                    </div>

                    <div class="col-md-4 tarjeta_foto_div">
                      <div class="m-t-20">
                      <h6 class="text-muted">Foto de Tarjeta Trasera</h6>
                            <input  name="img_Tarjeta_Trasera" class="form-control m-3 dropify-tarjeta-atras tarjeta_foto" data-allowed-file-extensions="jpeg"  type="file" accept="image/jpeg" Esto_Requiere>
                      </div>
                    </div>

                    <div class="col-md-4 tarjeta_foto_div">
                      <div class="m-t-20">
                      <h6 class="text-muted">Foto de Tarjeta de clave</h6>
                            <input  name="img_Tarjeta_clave" class="form-control m-3 dropify-clave tarjeta_foto" data-allowed-file-extensions="jpeg"  type="file" accept="image/jpeg" Esto_Requiere>
                      </div>
                    </div>
                  </div>
                  <hr>
                  <h5 class="text-muted">Documentación opcional</h5>
                  <cite>Puedes agregar fotos de la residencia del cliente, entre otras informaciones documentaciones de relevancia</cite>
                  <div class="row">
                    <div class="col-md-10">
                      <div class="m-t-20">
                        <h6 class="text-muted">Foto Variada del Cliente</h6>
                              <input  name="img_variada[]" class="form-control m-3 dropify" data-allowed-file-extensions="jpeg"  type="file" accept="image/jpeg" Esto_Requiere>
                      </div>
                    </div>
                    <div class="col-md-1">
                      <div class="m-t-20">
                      <h6 class="text-muted">&nbsp;</h6>
                      <i class="fas fa-plus fa-3x text-success" style="cursor:pointer" onclick="Agregar_img_variable()"></i>
                    </div>
                    </div>
                  </div>
                  <div class="" id="inicio_row_fotos_variada"></div> <!--esto es para auxilar la generacion de div -->

                  <hr>
                  <div class="row" hidden>
                    <div class="col-md-4">
                      <div class="m-t-20">
                        <input type="checkbox" class="form-check-input" id="Check_Articulo"  >
                         <label class="form-check-label" for="Check_Articulo">Seguir Registrando Cliente. </label>
                      </div>
                    </div>
                  </div>
                  <input type="submit" id="Enviar_formulario"class="btn btn-primary btn-block btn-lg waves-effect waves-light" name="" value="Registrar Cliente">
              </form>
            </div>
          </div>
        </div>
        </div>
        <!-- alerta -->
        <div class="" id="contenido">
        </div>

<!-- table -->
<script src="assets/js/Tables.js"></script>

<script src="assets/js/acciones.js?v=<?php echo md5(time()) ?>"></script>
<!-- limites_form -->
<script src="assets/js/limites_form.js"></script>
<!-- script importante -->

<div id="copiar_elemento" hidden>

</div>
