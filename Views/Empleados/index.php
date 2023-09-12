<?php include "Views/Templates/header.php"; ?>
<h1 class="display-6">Listado de empleados</h1>
<button class="btn btn-primary mb-2" type="button" onclick="frmEmpleado();">Nuevo empleado</button>
<div class="table-responsive">
    <table class="table table-light" id="tblEmpleados" width="100%">
        <thead class="thead-light">
            <tr>
                <th>Codigo</th>
                <th>CI</th>
                <th>Nombre</th>
                <th>Ap. Pat.</th>
                <th>Ap. Mat.</th>
                <th>Fecha de nac.</th>
                <th>Cargo</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<div id="nuevo_empleado" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="title">Nuevo empleado</h5>

            </div>
            <div class="modal-body">
                <form method="post" id="frmEmpleado">
                    <div class="form-group ">
                        <label for="nom_emp">Nombre/s</label>
                        <input type="hidden" id="cod_emp" name="cod_emp">
                        <input id="nom_emp" class="form-control" type="text" name="nom_emp" placeholder="Nombre/s">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mt-2">
                                <label for="app_emp">Ap. Paterno</label>
                                <input id="app_emp" class="form-control" type="text" name="app_emp"
                                    placeholder="Ap. Paterno">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mt-2">
                                <label for="apm_emp">Ap. Materno</label>
                                <input id="apm_emp" class="form-control" type="text" name="apm_emp"
                                    placeholder="Ap. Materno">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mt-2">
                                <label for="ci_emp">C.I.</label>
                                <input id="ci_emp" class="form-control" type="text" name="ci_emp" placeholder="C.I.">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mt-2">
                                <label for="cargo">Cargo</label>
                                <select id="cargo" class="form-control" name="cargo">
                                    <option>mecanico</option>
                                    <option>tec. lavado</option>
                                    <option>ayudante</option>
                                    <option>administrador</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mt-2">
                                <label for="salario">Salario</label>
                                <input id="salario" class="form-control" type="text" name="salario"
                                    placeholder="Salario">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mt-2">
                                <label for="fecnac_emp">Fecha de nacimiento</label>
                                <input id="fecnac_emp" class="form-control" type="date" name="fecnac_emp">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mt-2">
                                <label for="login">Usuario</label>
                                <input id="login" class="form-control" type="text" name="login" placeholder="Usuario">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mt-2">
                                <label for="pass">password</label>
                                <input id="pass" class="form-control" type="password" name="pass"
                                    placeholder="Password">
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary mt-3" type="button" onclick="registrarEmp(event);"
                        id="btnAccion">Registrar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include "Views/Templates/footer.php"; ?>