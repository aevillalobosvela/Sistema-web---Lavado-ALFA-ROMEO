<?php include "Views/Templates/header.php"; ?>
<h1 class="display-6">Clientes</h1>
<div class="table-responsive">
    <table class="table table-light" id="tblClientes" width="100%">
        <thead class="thead-light">
            <tr>
                <th>CI</th>
                <th>Nombre</th>
                <th>Ap. Pat.</th>
                <th>Ap. Mat.</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<div id="nuevo_cliente" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="title">Nuevo</h5>

            </div>
            <div class="modal-body">
                <form method="post" id="frmCliente">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mt-2">
                                <label for="ci_cliente">C.I.</label>
                                <input id="ci_cliente" class="form-control" type="text" name="ci_cliente" placeholder="C.I.">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label for="nom_cliente">Nombre/s</label>
                                <input id="nom_cliente" class="form-control" type="text" name="nom_cliente"
                                    placeholder="Nombre/s">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mt-2">
                                <label for="app_cliente">Ap. Paterno</label>
                                <input id="app_cliente" class="form-control" type="text" name="app_cliente"
                                    placeholder="Ap. Paterno">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mt-2">
                                <label for="apm_cliente">Ap. Materno</label>
                                <input id="apm_cliente" class="form-control" type="text" name="apm_cliente"
                                    placeholder="Ap. Materno">
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-primary mt-3" type="button" onclick="registrarCliente(event);"
                        id="btnAccionc">Registrar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include "Views/Templates/footer.php"; ?>