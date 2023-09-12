<?php include "Views/Templates/header.php"; ?>

<div class="container">

    <div class="align-items-center justify-content-center">
        <div class="row" id="lavado0">
            <div class="col-2">
            </div>

            <div class="col-8 p-3 text-dark rounded text-center " style="border: 5px solid #0BB1C9;">

                <h1 class="display-6">Estado de las rampas</h1>
                <hr>
                <div class="container ">
                    <div class="row">
                        <div class="col-4">
                            <h1 class="display-6">N° 1</h1>
                            <i id="icono1" class="fas display-1 mt-4 mb-4"></i>
                            <p class="text-muted" id="texto1">Estado: </p>
                            <div class="d-flex">
                                <button class="btn btn-success mt-2 w-100" type="button" id="btni1"
                                    onclick="iniciarLavado(event,1);">Inicia
                                    lavado</button>
                            </div>
                            <div class="d-flex">
                                <button class="btn btn-danger mt-2 w-100" type="button" id="btnf1"
                                    onclick="finalizarLavado(event,1);">Finaliza
                                    lavado</button>
                            </div>
                        </div>

                        <div class="col-4">
                            <h1 class="display-6">N° 2</h1>
                            <i id="icono2" class="fas display-1 mt-4 mb-4"></i>
                            <p class="text-muted" id="texto2">Estado: </p>
                            <div class="d-flex">
                                <button class="btn btn-success mt-2 w-100" type="button" id="btni2"
                                    onclick="iniciarLavado(event,2);">Inicia
                                    lavado</button>
                            </div>
                            <div class="d-flex">
                                <button class="btn btn-danger mt-2 w-100" type="button" id="btnf2"
                                    onclick="finalizarLavado(event,2);">Finaliza
                                    lavado</button>
                            </div>
                        </div>

                        <div class="col-4">
                            <h1 class="display-6">N° 3</h1>
                            <i id="icono3" class="fas display-1 mt-4 mb-4"></i>
                            <p class="text-muted" id="texto3">Estado: </p>
                            <div class="d-flex">
                                <button class="btn btn-success mt-2 w-100" type="button" id="btni3"
                                    onclick="iniciarLavado(event,3);">Inicia
                                    lavado</button>
                            </div>
                            <div class="d-flex">
                                <button class="btn btn-danger mt-2 w-100" type="button" id="btnf3"
                                    onclick="finalizarLavado(event,3);">Finaliza
                                    lavado</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-2">
            </div>
        </div>


        <div class="row" id="lavado1" hidden="true">
            <div class="col-2">
            </div>
            <div class="col-8 p-3 text-dark rounded" style="border: 5px solid #0BB1C9;">
                <h1 class="display-6 text-center">Tipo de lavado</h1>
                <hr>
                <div class="container ">
                    <div class="row">
                        <div class="col-5">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                    id="flexRadioDefault1" onchange="tipoLavado(event,1)" checked>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Servicio Simple
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                    id="flexRadioDefault2" onchange="tipoLavado(event,2)">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Servicio Especial
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                    id="flexRadioDefault3" onchange="tipoLavado(event,3)">
                                <label class="form-check-label" for="flexRadioDefault3">
                                    Servicio Completo
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                    id="flexRadioDefault4" onchange="tipoLavado(event,4)">
                                <label class="form-check-label" for="flexRadioDefault4">
                                    Servicio EXTRA Especial
                                </label>
                            </div>
                            <Hr>
                            </Hr>
                            <div>
                                <label for="costo_lavado2" class="form-label">Costo del servicio</label>
                                <div class="row">
                                    <div class="col-4">
                                        <input id="costo_lavado2" class="form-control" type="text" name="costo_lavado2">
                                    </div>
                                    <div class="col-5 mt-2">
                                        <p>Bs.</p>
                                    </div>
                                    <div class="col-3">
                                        <input id="lavado" class="form-control" type="text" name="lavado">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-7">
                            <img class="rounded mx-auto mb-3" id="imagen_lavado"
                                src="<?php echo base_url ?>Assets/img/lavado1.jpg" alt="Generic placeholder image"
                                width="100%" height="180">
                            <p id="descripcion">Lavado simple y secado</p>
                        </div>
                    </div>
                    <div class="row">
                        <form class="row " method="post" id="frmViaje">
                            <div class="col-md-6">
                                <label for="encargado" class="form-label">Tecnico de lavado a cargo</label>
                                <select id="encargado" class="form-control" name="cod_encargado">
                                    <?php foreach ($data['encargados'] as $row) { ?>
                                        <option value="<?php echo $row['cod_emp'] ?>"><?php echo $row['nom_emp'] . ' ' . $row['app_emp'] . ' ' . $row['apm_emp']; ?>
                                        </option>

                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-6 ">
                                <label for="ayudante" class="form-label">Ayudante participante</label>
                                <select id="ayudante" class="form-control" name="cod_ayudante">
                                    <?php foreach ($data['ayudantes'] as $row) { ?>
                                        <option value="<?php echo $row['cod_emp'] ?>"><?php echo $row['nom_emp'] . ' ' . $row['app_emp'] . ' ' . $row['apm_emp']; ?>
                                        </option>

                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="button" class="btn btn-danger mt-2" onclick="location.reload();"
                                            id="btnRegistrar">Cancelar operacion</button>
                                    </div>
                                    <div class="col-md-4 mt-2">
                                        <input id="rampa" class="form-control" type="text" name="rampa">
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-primary mt-2"
                                            onclick="continuarLavado(event);" id="btnRegistrar">Siguiente</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-2">
            </div>
        </div>
        <div class="row" id="lavado2" hidden="true"><!-- -->
            <div class="col-1">
            </div>
            <div class="col-8 p-3 text-dark rounded" style="border: 5px solid #0BB1C9;">
                <h1 class="display-6 text-center">Registro de datos</h1>
                <hr>
                <div class="container ">
                    <div class="row">
                        <div class="col-5">
                            <form class="row" method="post" id="frmCliente">
                                <div class="col-12">
                                    <label for="ci_cliente" class="form-label">Cedula de Identidad</label>
                                    <input id="ci_cliente" class="form-control" type="text" name="ci_cliente">
                                </div>
                                <div class="text-center">
                                    <button class="btn btn-warning mt-2 col-5 btn-sm" type="button" id="buscar"
                                        onclick="buscarCliente();">Buscar cliente</button>
                                </div>

                                <div class="col-12 mt-2">
                                    <label for="nom_cliente" class="form-label">Nombre/s</label>
                                    <input id="nom_cliente" class="form-control" type="text" name="nom_cliente">
                                </div>

                                <div class="col-12 mt-2">
                                    <label for="app_cliente" class="form-label">Apellido Paterno</label>
                                    <input id="app_cliente" class="form-control" type="text" name="app_cliente">
                                </div>

                                <div class="col-12 mt-2">
                                    <label for="apm_cliente" class="form-label">Apellido Materno</label>
                                    <input id="apm_cliente" class="form-control" type="text" name="apm_cliente">
                                </div>
                            </form>
                        </div>
                        <div class="col-1"></div>
                        <div class="col-6">
                            <form class="row" method="post" id="frmVehiculo2">
                                <div class="col-12">
                                    <input type="hidden" id="cod_v2" name="cod_v2">
                                    <label for="placa2" class="form-label">Placa</label>
                                    <input id="placa2" class="form-control" type="text" name="placa2">
                                </div>
                                <div class="row ">
                                    <div class="col-12 text-center">
                                        <button class="btn btn-warning mt-2 btn-sm" type="button" id="buscar"
                                            onclick="buscarVehiculo();">Buscar vehiculo</button>
                                    </div>
                                </div>
                                <div class="col-12 mt-2">
                                    <label for="marca2" class="form-label">Marca</label>
                                    <input id="marca2" class="form-control" type="text" name="marca2">
                                </div>

                                <div class="col-12 mt-2">
                                    <label for="modelo2" class="form-label">Modelo</label>
                                    <input id="modelo2" class="form-control" type="text" name="modelo2">
                                </div>
                                <div class="row mt-2">
                                    <label for="color2" class="form-label">Color</label>
                                    <div class="col-11">
                                        <select id="color2" class="form-control" name="color2">
                                            <option>Azul</option>
                                            <option>Rojo</option>
                                            <option>Verde</option>
                                            <option>Blanco</option>
                                            <option>Negro</option>
                                            <option>Gris</option>
                                            <option>Otro</option>
                                        </select>
                                    </div>
                                    <div class="col-1">
                                        <input id="ci_cliente2" class="form-control" type="text" name="ci_cliente2">
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-5 mt-2">
                            <button type="button" class="btn btn-danger mt-2" onclick="location.reload();"
                                id="btnRegistrar">Cancelar operacion</button>
                        </div>
                        <div class="col-md-4">

                        </div>
                        <div class="col-md-3 mt-2">
                            <button type="button" class="btn btn-primary mt-2" onclick="registrarLavado(event);"
                                id="btnRegistrar">Siguiente paso</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3 p-3 text-dark rounded" style="border: 5px solid #0BA1C1;">
                <form class="row" method="post" id="frmLavado">
                    <div class="col-12 mt-2">
                        <input type="hidden" id="cod_lavado" name="cod_lavado">
                        <label for="nom_lavado" class="form-label">Tipo de lavado</label>
                        <input id="nom_lavado" class="form-control" type="text" name="nom_lavado">
                    </div>

                    <div class="col-12 mt-2">
                        <label for="cost_lavado" class="form-label">Costo de lavado</label>
                        <div class="row">
                            <div class="col-7">
                                <input id="costo_lavado" class="form-control" type="text" name="costo_lavado">
                            </div>
                            <div class="col-5 mt-2">
                                <p>Bs.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mt-2">
                        <label for="hora_lavado" class="form-label">Hora actual</label>
                        <input id="hora_lavado" class="form-control" type="time" step="1" name="hora_lavado">
                    </div>

                    <div class="col-12 mt-2">
                        <label for="cod_encargado" class="form-label">Codigo del encargado</label>
                        <input id="cod_encargado" class="form-control" type="text" name="cod_encargado">
                    </div>

                    <div class="col-12 mt-2">
                        <label for="cod_ayudante" class="form-label">Codigo del ayudante</label>
                        <input id="cod_ayudante" class="form-control" type="text" name="cod_ayudante">
                    </div>

                    <div class="col-4 mt-2">
                        <input id="tipo_lavado" class="form-control" type="text" name="tipo_lavado">
                        <input id="cod_v3" class="form-control" type="text" name="cod_v3">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include "Views/Templates/footer.php"; ?>