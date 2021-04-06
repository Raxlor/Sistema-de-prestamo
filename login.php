<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Sporous - Login</title>
        <meta content="Responsive admin theme build on top of Bootstrap 4" name="description" />
        <meta content="Themesdesign" name="author" />
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/metismenu.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="assets/css/style.css" rel="stylesheet" type="text/css">

    </head>

    <body>
        <!-- Begin page -->


            <!-- espacio para alert-->
            <div class="" id="Alertsjs">

            </div>

            <!-- menu2 -->
            <div class="accountbg"></div>
                    <!-- <div class="home-btn d-none d-sm-block">

                            <a href="index.html" class="text-white"><i class="fas fa-home h2"></i></a>
                        </div> -->
                    <div class="wrapper-page">
                            <div class="card card-pages shadow-none">

                                <div class="card-body">
                                    <div class="text-center m-t-0 m-b-15">
                                            <a href="index.html" class="logo logo-admin"><img src="assets/images/logo-dark.png" alt="" height="24"></a>
                                    </div>
                                    <h5 class="font-18 text-center">Inicie sesión</h5>
                                    <form class="form-horizontal m-t-30" action="javascript:void(0)" id="login_form">
                                        <div class="form-group">
                                            <div class="col-12">
                                              <label>Usuario</label>
                                          <input class="form-control" type="text" required placeholder="Usuario" id="Usuario">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-12">
                                              <label>Contraseña</label>
                                          <input class="form-control" type="password" required placeholder="Contraseña" id="Contraseña">
                                            </div>
                                        </div>

                                        <div class="form-group"hidden>
                                            <div class="col-12" >
                                                <div class="checkbox checkbox-primary">
                                                        <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                          <label class="custom-control-label" for="customCheck1"> Remember me</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group text-center m-t-20">
                                            <div class="col-12">
                                              <input type="submit" class="btn btn-primary btn-block btn-lg waves-effect waves-light" name="" value="Entrar">
                                            </div>
                                        </div>
                                        <div class="form-group row m-t-30 m-b-0">
                                            <div class="col-sm-7"hidden>
                                                <a href="pages-recoverpw.html" class="text-muted"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a>
                                            </div>
                                            <div class="col-sm-5 text-right" hidden>
                                                <a href="pages-register.html" class="text-muted disabled">Create an account</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- jQuery  -->
                        <script src="assets/js/jquery.min.js"></script>
                        <script src="assets/js/bootstrap.bundle.min.js"></script>
                        <script src="assets/js/metismenu.min.js"></script>
                        <script src="assets/js/jquery.slimscroll.js"></script>
                        <script src="assets/js/waves.min.js"></script>
                        <script src="assets/js/vistas.js?v=<?php echo md5(time()) ?>"></script>
                        <script src="plugins/alertify/js/alertify.js"></script>
                        <!-- App js -->
                        <script src="assets/js/app.js"></script>
    </body>

</html>
