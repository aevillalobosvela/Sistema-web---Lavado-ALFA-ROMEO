<?php include "Views/Templates/header.php"; ?>

<div class="container">

    <div class="align-items-center justify-content-center">
        <div class="row" id="mante0">
            <div class="col-2">
            </div>
            <div class="col-8 p-3 text-dark rounded" style="border: 5px solid #0BB1C9;">
                <h1 class="display-6 text-center">Tipo de mantenimiento</h1>
                <hr>
                <div class="container ">
                    <div class="row">
                        <div class="col-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="check1"
                                    onchange="verificarServicios(event)">
                                <label class="form-check-label" for="check1">
                                    Cambio de aceite
                                </label>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="check2"
                                    onchange="verificarServicios(event)">
                                <label class="form-check-label" for="check2">
                                    Revision del filtro
                                </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" value="" id="check3"
                                    onchange="verificarServicios(event)">
                                <label class="form-check-label" for="check3">
                                    Revision de frenos
                                </label>
                            </div>
                        </div>

                        <hr>

                        <div class="row mb-3 text-center" id="sel1" hidden="true">
                            <div class="col-5">
                                <label for="ele1" class="form-label">Producto</label>
                                <select id="ele1" class="form-control text-center" onchange="obtenerPrecio(1)" name="ele1">
                                    <?php foreach ($data['aceites'] as $row) { ?>
                                        <option value="<?php echo $row['cod_producto'] ?>"><?php echo $row['descripcion']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-3">
                                <label for="precio1" class="form-label">Precio</label>
                                <input id="precio1" class="form-control text-center" type="text" name="precio1">
                            </div>
                            <div class="col-2">
                                <label for="stock1" class="form-label">Stock</label>
                                <input id="stock1" class="form-control text-center" type="text" name="stock1">
                            </div>
                            <div class="col-2">
                                <label class="mb-2" for="unidad1">Unidades</label>
                                <input id="unidad1" class="form-control text-center" type="text" name="unidad1">
                            </div>
                        </div>
                        <div class="row mb-3 text-center" id="sel2" hidden="true">
                            <div class="col-5">
                                <label for="ele2" class="form-label">Producto</label>
                                <select id="ele2" class="form-control text-center" onchange="obtenerPrecio(2)" name="ele2">
                                    <?php foreach ($data['filtros'] as $row) { ?>
                                        <option value="<?php echo $row['cod_producto'] ?>"><?php echo $row['descripcion']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-3">
                                <label for="precio2" class="form-label">Precio</label>
                                <input id="precio2" class="form-control text-center" type="text" name="precio2">
                            </div>
                            <div class="col-2">
                                <label for="stock2" class="form-label">Stock</label>
                                <input id="stock2" class="form-control text-center" type="text" name="stock2">
                            </div>
                            <div class="col-2">
                                <label class="mb-2" for="unidad2">Unidades</label>
                                <input id="unidad2" class="form-control text-center" type="text" name="unidad2">
                            </div>
                        </div>
                        <div class="row mb-3 text-center" id="sel3" hidden="true">
                            <div class="col-5">
                                <label for="ele3" class="form-label">Producto</label>
                                <select id="ele3" class="form-control text-center" onchange="obtenerPrecio(3)" name="ele3">
                                    <?php foreach ($data['balatass'] as $row) { ?>
                                        <option value="<?php echo $row['cod_producto'] ?>"><?php echo $row['descripcion']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-3">
                                <label for="precio3" class="form-label">Precio</label>
                                <input id="precio3" class="form-control text-center" type="text" name="precio3">
                            </div>
                            <div class="col-2">
                                <label for="stock3" class="form-label">Stock</label>
                                <input id="stock3" class="form-control text-center" type="text" name="stock3">
                            </div>
                            <div class="col-2">
                                <label class="mb-2" for="unidad3">Unidades</label>
                                <input id="unidad3" class="form-control text-center" type="text" name="unidad3">
                            </div>
                        </div>

                        <hr>

                        <div>
                            <label for="costo_mantenimiento2" class="form-label">Costo del servicio</label>
                            <div class="row">
                                <div class="col-4">
                                    <input id="costo_mantenimiento2" value="0" class="form-control" type="text"
                                        name="costo_mantenimiento2">
                                </div>
                                <div class="col-5 mt-2">
                                    <p>Bs.</p>
                                </div>
                                <div class="col-3 mt-2">
                                        <input id="canti" class="form-control" type="text" name="canti">
                                    </div>
                            </div>
                        </div>



                    </div>
                    <div class="row">
                        <form class="row " method="post" id="frmViaje">
                            <div class="col-md-6">
                                <label for="encargado2" class="form-label">Tecnico de mantenimiento a cargo</label>
                                <select id="encargado2" class="form-control" name="encargado2">
                                    <?php foreach ($data['encargados2'] as $row) { ?>
                                        <option value="<?php echo $row['cod_emp'] ?>"><?php echo $row['nom_emp'] . ' ' . $row['app_emp'] . ' ' . $row['apm_emp']; ?>
                                        </option>

                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-6 ">
                                <label for="ayudante2" class="form-label">Ayudante participante</label>
                                <select id="ayudante2" class="form-control" name="ayudante2">
                                    <?php foreach ($data['ayudantes2'] as $row) { ?>
                                        <option value="<?php echo $row['cod_emp'] ?>"><?php echo $row['nom_emp'] . ' ' . $row['app_emp'] . ' ' . $row['apm_emp']; ?>
                                        </option>

                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-12 mt-2">
                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="button" class="btn btn-danger mt-2" onclick="location.reload();"
                                            id="btnRegistrar">Cancelar operacion</button>
                                    </div>
                                    <div class="col-md-4 mt-2">
                                        
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-primary mt-2"
                                            onclick="continuarMant(event);" id="btnRegistrar2">Siguiente</button>
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

        <div class="row" id="mante1" hidden="true">
            <div class="col-1">
            </div>
            <div class="col-7 p-3 text-dark rounded" style="border: 5px solid #0BB1C9;">
                <h1 class="display-6 text-center">Registro de datos</h1>
                <hr>
                <div class="container ">
                    <div class="row">
                        <div class="col-5">
                            <form class="row" method="post" id="frmCliente2">
                                <div class="col-12">
                                    <label for="ci_cliente3" class="form-label">Cedula de Identidad</label>
                                    <input id="ci_cliente3" class="form-control" type="text" name="ci_cliente3">
                                </div>
                                <div class="text-center">
                                    <button class="btn btn-warning mt-2 col-7 btn-sm" type="button" id="buscar"
                                        onclick="buscarCliente2();">Buscar cliente</button>
                                </div>

                                <div class="col-12 mt-2">
                                    <label for="nom_cliente3" class="form-label">Nombre/s</label>
                                    <input id="nom_cliente3" class="form-control" type="text" name="nom_cliente3">
                                </div>

                                <div class="col-12 mt-2">
                                    <label for="app_cliente3" class="form-label">Apellido Paterno</label>
                                    <input id="app_cliente3" class="form-control" type="text" name="app_cliente3">
                                </div>

                                <div class="col-12 mt-2">
                                    <label for="apm_cliente3" class="form-label">Apellido Materno</label>
                                    <input id="apm_cliente3" class="form-control" type="text" name="apm_cliente3">
                                </div>

                            </form>
                        </div>
                        <div class="col-1"></div>
                        <div class="col-6">
                            <form class="row" method="post" id="frmVehiculo3">
                                <div class="col-12">
                                    <input type="hidden" id="cod_v4" name="cod_v4">
                                    <label for="placa3" class="form-label">Placa</label>
                                    <input id="placa3" class="form-control" type="text" name="placa3">
                                </div>
                                <div class="row ">
                                    <div class="col-12 text-center">
                                        <button class="btn btn-warning mt-2 btn-sm" type="button" id="buscar"
                                            onclick="buscarVehiculo2();">Buscar vehiculo</button>
                                    </div>
                                </div>
                                <div class="col-12 mt-2">
                                    <label for="marca3" class="form-label">Marca</label>
                                    <input id="marca3" class="form-control" type="text" name="marca3">
                                </div>

                                <div class="col-12 mt-2">
                                    <label for="modelo3" class="form-label">Modelo</label>
                                    <input id="modelo3" class="form-control" type="text" name="modelo3">
                                </div>
                                <div class="row mt-2">
                                    <label for="color3" class="form-label">Color</label>
                                    <div class="col-10">
                                        <select id="color3" class="form-control" name="color3">
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
                                        <input id="ci_cliente4" class="form-control" type="text" name="ci_cliente4">
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
                            <button type="button" class="btn btn-primary mt-2" onclick="registrarMant(event);"
                                id="btnRegistrar">Siguiente paso</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3 p-3 text-dark rounded" style="border: 5px solid #0BA1C1;">
                <form class="row" method="post" id="frmMant">
                    <div class="col-12 mt-2">
                        <input type="hidden" id="cod_mant" name="cod_mant">
                        <label for="cant_servicios" class="form-label">Numero de servicios</label>
                        <input id="cant_servicios" class="form-control" type="text" name="cant_servicios">
                    </div>

                    <div class="col-12 mt-2">
                        <label for="cost_mant" class="form-label"> Costo de Mantenimiento</label>
                        <div class="row">
                            <div class="col-7">
                                <input id="costo_mant" class="form-control" type="text" name="costo_mant">
                            </div>
                            <div class="col-5 mt-2">
                                <p>Bs.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-2">
                        <label for="hora_mant" class="form-label">Hora actual</label>
                        <input id="hora_mant" class="form-control" type="time" step="1" name="hora_mant">
                    </div>

                    <div class="col-12 mt-2">
                        <label for="cod_encargado2" class="form-label">Codigo del encargado</label>
                        <input id="cod_encargado2" class="form-control" type="text" name="cod_encargado2">
                    </div>

                    <div class="col-12 mt-2">
                        <label for="cod_ayudante2" class="form-label">Codigo del ayudante</label>
                        <input id="cod_ayudante2" class="form-control" type="text" name="cod_ayudante2">
                    </div>

                    <div class="col-4 mt-2">
                        <input id="cod_v5" class="form-control" type="text" name="cod_v5">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include "Views/Templates/footer.php"; ?>