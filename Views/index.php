<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Iniciar Sesion</title>
    <link href="<?php echo base_url; ?>Assets/css/styles.css" rel="stylesheet" />
    <script src="<?php echo base_url; ?>Assets/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="bg-dark">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header" >
                                    <img src="<?php echo base_url ?>Assets/img/logo2.jpg" alt="ss" width="200"
                                        height="200" style="width:100%">
                                </div>
                                <div class="card-body">
                                    <form id="frmLogin">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="usuario" name="usuario" type="text"
                                                placeholder="Ingrese usuario" />
                                            <label for="usuario"><i class="fa fa-user icon"></i> Usuario</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="clave" name="clave" type="password"
                                                placeholder="Password" />
                                            <label for="clave"><i class="fa fa-key icon"></i> Password</label>
                                        </div>
                                        <div class="alert alert-danger text-center d-none" id="alerta" role="alert">
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <button class="btn btn-primary" type="Submit"
                                                onclick="frmLogin(event);">Ingresar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>

        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Taller de Desarrollo de SW</div>
                        <div>
                            <a href="#">Acerca del sistema</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="<?php echo base_url; ?>Assets/js/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
    <script src="<?php echo base_url; ?>Assets/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="<?php echo base_url; ?>Assets/js/scripts.js"></script>
    <!--         <script src="<?php echo base_url; ?>Assets/js/Chart.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url; ?>Assets/demo/chart-area-demo.js"></script>
        <script src="<?php echo base_url; ?>Assets/demo/chart-bar-demo.js"></script> -->
    <script src="<?php echo base_url; ?>Assets/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="<?php echo base_url; ?>Assets/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script> const base_url = "<?php echo base_url; ?>" </script>
    <script src="<?php echo base_url; ?>Assets/js/funciones.js"></script>
</body>

</html>