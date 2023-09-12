<?php include "Views/Templates/header.php"; ?>
<div class="row ">
    <div class="col-xl-3 col-md-6">
        <div class="card bg-primary">
            <div class="card-body d-flex text-white">
                <div class="mr-auto">Empleados</div>
                <i class="fas fa-users fa-2x ml-auto"></i>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a href="<?php echo base_url; ?>Empleados" class="text-white">Ver detalle</a>
                <span class="text-white">
                    <?php echo $data['empleado']['total']; ?>
                </span>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-success">
            <div class="card-body d-flex text-white">
                Clientes
                <i class="fas fa-child fa-2x ml-auto"></i>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a href="<?php echo base_url; ?>Clientes" class="text-white">Ver detalle</a>
                <span class="text-white">
                    <?php echo $data['cliente']['total']; ?>
                </span>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-warning">
            <div class="card-body d-flex text-white">
                Mantenimientos
                <i class="fas fa-wrench fa-2x ml-auto"></i>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a href="<?php echo base_url; ?>Mantenimientos" class="text-white">Ver detalle</a>
                <span class="text-white">
                    <?php echo $data['mantenimiento']['total']; ?>
                </span>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-danger">
            <div class="card-body d-flex text-white">
                Lavados
                <i class="fas fa-shower fa-2x ml-auto"></i>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a href="<?php echo base_url; ?>Lavados" class="text-white">Ver detalle</a>
                <span class="text-white">
                    <?php echo $data['lavado']['total']; ?>
                </span>
            </div>
        </div>
    </div>
</div>
<div class="row mt-3">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-header bg-dark text-white">
                Tipo de lavado mas popular
            </div>
            <div class="card-body">
                <canvas id="lavadosMas" width="400" height="400"></canvas>
            </div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="card">
            <div class="card-header bg-dark text-white">
                Mantenimiento mas solicitado
            </div>
            <div class="card-body">
                <canvas id="mantenimientosMas" width="400" height="400"></canvas>
            </div>
        </div>
    </div>
</div>
<div class="row mt-3">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-header bg-dark text-white">
                Servicio mas redituable (Bs.)
            </div>
            <div class="card-body">
                <canvas id="dineroMas" width="400" height="400"></canvas>
            </div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="card">
            <div class="card-header bg-dark text-white">
                Clientes recurrentes
            </div>
            <div class="card-body">
                <canvas id="clientesMas" width="400" height="400"></canvas>
            </div>
        </div>
    </div>
</div>
<?php include "Views/Templates/footer.php"; ?>