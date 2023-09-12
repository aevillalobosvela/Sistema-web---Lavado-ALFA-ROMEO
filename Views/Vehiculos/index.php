<?php include "Views/Templates/header.php"; ?>
<h1 class="display-6">Vehiculos</h1>
<div class="table-responsive">
    <table class="table table-light" id="tblVehiculos" width="100%">
        <thead class="thead-dark">
            <tr>
                <th>Codigo</th>
                <th>Placa</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Color</th>
                <th>CI Cliente</th>
                <th></th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</div>

<div id="nuevo_vehiculo" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="title">Registrar vehiculo</h5>

            </div>
            <div class="modal-body">
                <form method="post" id="frmVehiculo">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label for="placa">Placa</label>
                                <input type="hidden" id="cod_v" name="cod_v">
                                <input id="placa" class="form-control" type="text" name="placa" placeholder="Placa">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mt-2">
                                <label for="marca">Marca</label>
                                <input id="marca" class="form-control" type="text" name="marca" placeholder="Marca">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mt-2">
                                <label for="modelo">Modelo</label>
                                <input id="modelo" class="form-control" type="text" name="modelo" placeholder="Modelo">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mt-2">
                                <label for="color">Color</label>
                                <input id="color" class="form-control" type="text" name="color" placeholder="Color">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mt-2">
                            <label for="ci_cliente">CI de cliente</label>
                            <input id="ci_cliente" class="form-control" type="text" name="ci_cliente" placeholder="CI">
                        </div>
                    </div>
                    <button class="btn btn-primary mt-3" type="button" onclick="registrarVeh(event);"
                        id="btnAccion2">Registrar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include "Views/Templates/footer.php"; ?>