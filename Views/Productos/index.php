<?php include "Views/Templates/header.php"; ?>
<h1 class="display-6">Productos</h1>
<div class="table-responsive">
    <table class="table table-light" id="tblProductos" width="100%">
        <thead class="thead-light">
            <tr>
                <th>Codigo</th>
                <th>Descripcion</th>
                <th>Tipo</th>
                <th>Precio unidad</th>
                <th>Stock</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<div id="modificar_producto" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="title">Modificar stock</h5>

            </div>
            <div class="modal-body">
                <form method="post" id="frmProducto">
                    <div class="row">
                        <div class="col-md-4">

                        </div>
                        <div class="col-md-4 text-center">
                            <div class="form-group mt-2">
                                <label for="cod_producto2">Codigo del producto</label>
                                <input id="cod_producto2" class="form-control" type="text" name="cod_producto2">
                            </div>
                        </div>
                        <div class="col-md-4">

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-1">

                        </div>
                        <div class="col-md-4 text-center">
                            <div class="form-group mt-2">
                                <label for="stock">Stock actual</label>
                                <input id="stock" class="form-control" type="text" name="stock">
                            </div>
                        </div>
                        <div class="col-md-2">

                        </div>
                        <div class="col-md-4 text-center">
                            <div class="form-group mt-2">
                                <label for="stock2">Nuevo valor</label>
                                <input id="stock2" class="form-control" type="text" name="stock2">
                            </div>
                        </div>
                        <div class="col-md-1">

                        </div>
                    </div>
                    <button class="btn btn-primary mt-4" type="button" onclick="modificarStock(event);"
                        id="btnAccion3">Guardar cambios</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include "Views/Templates/footer.php"; ?>