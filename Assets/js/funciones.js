let tblEmpleados;
let tblVehiculos;
let tblClientes;
let tblProductos;

document.addEventListener("DOMContentLoaded", function () {
    tblEmpleados = $("#tblEmpleados").DataTable({
        ajax: {
            url: base_url + "Empleados/listar",
            dataSrc: "",
        },
        columns: [
            { data: "cod_emp" },
            { data: "ci_emp" },
            { data: "nom_emp" },
            { data: "app_emp" },
            { data: "apm_emp" },
            { data: "fecnac_emp" },
            { data: "cargo" },
            { data: "acciones" },
        ],
        language: {
            url: "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json",
        },
        dom:
            "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-5'i><'col-sm-7'p>>",
        buttons: [
            {
                extend: "excel",
                footer: true,
                title: "Archivo",
                filename: "Export_File",
                text: '<button class="btn btn-success btn-lg"> <i class="fas fa-file-excel"></i></button>',
            },
            {
                extend: "pdf",
                footer: true,
                title: "Archivo PDF",
                filename: "Export_File_pdf",
                text: '<button class="btn btn-danger btn-lg"> <i class="far fa-file-pdf"></i></button>',
            },
        ],
    });
});

document.addEventListener("DOMContentLoaded", function () {
    tblVehiculos = $("#tblVehiculos").DataTable({
        ajax: {
            url: base_url + "Vehiculos/listar",
            dataSrc: "",
        },
        columns: [
            { data: "cod_v" },
            { data: "placa" },
            { data: "marca" },
            { data: "modelo" },
            { data: "color" },
            { data: "ci_cliente" },
            { data: "acciones" },
        ],
        language: {
            url: "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json",
        },
        dom:
            "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-5'i><'col-sm-7'p>>",
        buttons: [
            {
                extend: "excel",
                footer: true,
                title: "Archivo",
                filename: "Export_File",
                text: '<button class="btn btn-success btn-lg"> <i class="fas fa-file-excel"></i></button>',
            },
            {
                extend: "pdf",
                footer: true,
                title: "Archivo PDF",
                filename: "Export_File_pdf",
                text: '<button class="btn btn-danger btn-lg"> <i class="far fa-file-pdf"></i></button>',
            },
        ],
    });
});

document.addEventListener("DOMContentLoaded", function () {
    tblClientes = $("#tblClientes").DataTable({
        ajax: {
            url: base_url + "Clientes/listar",
            dataSrc: "",
        },
        columns: [
            { data: "ci_cliente" },
            { data: "nom_cliente" },
            { data: "app_cliente" },
            { data: "apm_cliente" },
        ],
        language: {
            url: "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json",
        },
        dom:
            "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-5'i><'col-sm-7'p>>",
        buttons: [
            {
                extend: "excel",
                footer: true,
                title: "Archivo",
                filename: "Export_File",
                text: '<button class="btn btn-success btn-lg"> <i class="fas fa-file-excel"></i></button>',
            },
            {
                extend: "pdf",
                footer: true,
                title: "Archivo PDF",
                filename: "Export_File_pdf",
                text: '<button class="btn btn-danger btn-lg"> <i class="far fa-file-pdf"></i></button>',
            },
        ],
    });
});

document.addEventListener("DOMContentLoaded", function () {
    tblProductos = $("#tblProductos").DataTable({
        ajax: {
            url: base_url + "Productos/listar",
            dataSrc: "",
        },
        columns: [
            { data: "cod_producto" },
            { data: "descripcion" },
            { data: "tipo_producto" },
            { data: "precio_unidad" },
            { data: "stock" },
            { data: "acciones" },
        ],
        language: {
            url: "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json",
        },
        dom:
            "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-5'i><'col-sm-7'p>>",
    });
});
/* ------------------------------------------------------------------------- */
function frmLogin(e) {
    e.preventDefault();
    const usuario = document.getElementById("usuario");
    const clave = document.getElementById("clave");

    if (usuario.value == "") {
        clave.classList.remove("is-invalid");
        usuario.classList.add("is-invalid");
        usuario.focus();
    } else if (clave.value == "") {
        clave.classList.add("is-invalid");
        usuario.classList.remove("is-invalid");
        clave.focus();
    } else {
        const url = base_url + "Empleados/validar";
        const frm = document.getElementById("frmLogin");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));

        http.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                const res = JSON.parse(this.responseText);
                if (res == "ok") {
                    window.location = base_url + "Inicio";
                } else {
                    document.getElementById("alerta").classList.remove("d-none");
                    document.getElementById("alerta").innerHTML = res;
                }
            }
        };
    }
}

function InfoUsuario() {
    $("#info_usuario").modal("show");
}

function frmEmpleado() {
    document.getElementById("title").innerHTML = "Nuevo empleado";
    document.getElementById("btnAccion").innerHTML = "Registrar";
    document.getElementById("frmEmpleado").reset();
    $("#nuevo_empleado").modal("show");
    document.getElementById("cod_emp").value = "";
}

function registrarEmp(e) {
    e.preventDefault();
    const ci_emp = document.getElementById("ci_emp");
    const nom_emp = document.getElementById("nom_emp");
    const app_emp = document.getElementById("app_emp");
    const apm_emp = document.getElementById("apm_emp");
    const salario = document.getElementById("salario");
    const fecnac_emp = document.getElementById("fecnac_emp");
    const cargo = document.getElementById("cargo");
    const login = document.getElementById("login");
    const pass = document.getElementById("pass");

    if (
        ci_emp.value == "" ||
        nom_emp.value == "" ||
        app_emp.value == "" ||
        apm_emp.value == "" ||
        salario.value == "" ||
        fecnac_emp.value == "" ||
        login.value == "" ||
        pass.value == ""
    ) {
        Swal.fire({
            position: "center",
            icon: "error",
            title: "Todos los campos son obligatorios",
            showConfirmButton: false,
            timer: 1500,
        });
    } else {
        const url = base_url + "Empleados/registrar";
        const frm = document.getElementById("frmEmpleado");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                /* console.log(this.responseText); */
                const res = JSON.parse(this.responseText);
                if (res == "si") {
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "Empleado registrado con exito",
                        showConfirmButton: false,
                        timer: 1500,
                    });
                    frm.reset();
                    $("#nuevo_empleado").modal("hide");
                    tblEmpleados.ajax.reload();
                } else if (res == "modificado") {
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "Empleado modificado con exito",
                        showConfirmButton: false,
                        timer: 1500,
                    });
                    frm.reset();
                    $("#nuevo_empleado").modal("hide");
                    tblEmpleados.ajax.reload();
                } else {
                    Swal.fire({
                        position: "center",
                        icon: "error",
                        title: res,
                        showConfirmButton: false,
                        timer: 1500,
                    });
                }
            }
        };
    }
}

function btnEditarEmp(cod_emp) {
    document.getElementById("title").innerHTML = "Actualizar empleado";
    document.getElementById("btnAccion").innerHTML = "Actualizar";

    const url = base_url + "Empleados/editar/" + cod_emp;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();

    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            document.getElementById("cod_emp").value = res.cod_emp;
            document.getElementById("ci_emp").value = res.ci_emp;
            document.getElementById("nom_emp").value = res.nom_emp;
            document.getElementById("app_emp").value = res.app_emp;
            document.getElementById("apm_emp").value = res.apm_emp;
            document.getElementById("salario").value = res.salario;
            document.getElementById("fecnac_emp").value = res.fecnac_emp;
            document.getElementById("cargo").value = res.cargo;
            document.getElementById("login").value = res.login;
            document.getElementById("pass").value = res.pass;
            $("#nuevo_empleado").modal("show");
        }
    };
}

function btnEliminarEmp(cod_emp) {
    Swal.fire({
        title: "Esta seguro de continuar?",
        text: "El empleado sera eliminado!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si, eliminar!",
        cancelButtonText: "No",
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Empleados/eliminar/" + cod_emp;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();

            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    const frm = document.getElementById("frmEmpleado");
                    frm.reset();
                    tblEmpleados.ajax.reload();
                }
            };
            Swal.fire("Eliminado!", "El empleado ha sido eliminado.", "success");
        }
    });
}
/*----------------------------------------------------------------------------------------------------*/
function frmProducto() {
    document.getElementById("title").innerHTML = "Modificar stock";
    document.getElementById("btnAccion").innerHTML = "Guardar cambios";
    document.getElementById("frmProducto").reset();
    $("#modificar_producto").modal("show");
    document.getElementById("cod_producto").value = "";
}

function modificarStock(e) {
    e.preventDefault();
    var input = document.getElementById("stock2").value;
    var stocknuevo = parseFloat(input);
    const stockn = document.getElementById("stock2");
    if (isNaN(stocknuevo)) {
        error("Ingrese un numero valido");
    } else if (stocknuevo < 0) {
        error("Ingrese un numero positivo");
    } else {
        if (stockn.value == "") {
            error("El campo es obligatorio");
        } else {
            const url = base_url + "Productos/modificarStock";
            const frm = document.getElementById("frmProducto");
            const http = new XMLHttpRequest();
            http.open("POST", url, true);
            http.send(new FormData(frm));
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    /* console.log(this.responseText); */
                    const res = JSON.parse(this.responseText);
                    if (res == "si") {
                        exito("Stock actualizado");
                        frm.reset();
                        $("#modificar_producto").modal("hide");
                        tblProductos.ajax.reload();
                    } else {
                        error("Error en la actualizacion");
                    }
                }
            };
        }
    }
}

function btnEditarProd(cod_producto) {
    document.getElementById("title").innerHTML = "Modificar stock";
    document.getElementById("btnAccion3").innerHTML = "Actualizar";

    const url = base_url + "Productos/editar/" + cod_producto;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();

    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            stock.value = res.stock;
            cod_producto2.value = res.cod_producto;
            $("#modificar_producto").modal("show");
        }
    };
}

/*----------------------------------------------------------------------------------------------------*/

function frmVehiculo() {
    document.getElementById("title").innerHTML = "Nuevo Vehiculo";
    document.getElementById("btnAccion2").innerHTML = "Registrar";
    document.getElementById("frmVehiculo").reset();
    $("#nuevo_vehiculo").modal("show");
    document.getElementById("cod_v").value = "";
}

function registrarVeh(e) {
    e.preventDefault();

    const placa = document.getElementById("placa");
    const marca = document.getElementById("marca");
    const modelo = document.getElementById("modelo");
    const color = document.getElementById("color");
    const ci_cliente = document.getElementById("ci_cliente");

    if (
        placa.value == "" ||
        marca.value == "" ||
        modelo.value == "" ||
        color.value == "" ||
        ci_cliente.value == ""
    ) {
        Swal.fire({
            position: "center",
            icon: "error",
            title: "Todos los campos son obligatorios",
            showConfirmButton: false,
            timer: 1500,
        });
    } else {
        const url = base_url + "Vehiculos/registrarVehiculo";
        const frm = document.getElementById("frmVehiculo");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                /* console.log(this.responseText); */
                const res = JSON.parse(this.responseText);
                if (res == "si") {
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "Vehiculo registrado con exito",
                        showConfirmButton: false,
                        timer: 1500,
                    });
                    frm.reset();
                    $("#nuevo_vehiculo").modal("hide");
                    tblVehiculos.ajax.reload();
                } else if (res == "modificado") {
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "Vehiculo modificado con exito",
                        showConfirmButton: false,
                        timer: 1500,
                    });
                    frm.reset();
                    $("#nuevo_vehiculo").modal("hide");
                    tblVehiculos.ajax.reload();
                } else {
                    Swal.fire({
                        position: "center",
                        icon: "error",
                        title: res,
                        showConfirmButton: false,
                        timer: 1500,
                    });
                }
            }
        };
    }
}

function btnEditarVeh(cod_v) {
    document.getElementById("title").innerHTML = "Actualizar vehiculo";
    document.getElementById("btnAccion2").innerHTML = "Actualizar";

    const url = base_url + "Vehiculos/editar/" + cod_v;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();

    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            document.getElementById("cod_v").value = res.cod_v;
            document.getElementById("placa").value = res.placa;
            document.getElementById("marca").value = res.marca;
            document.getElementById("modelo").value = res.modelo;
            document.getElementById("color").value = res.color;
            document.getElementById("ci_cliente").value = res.ci_cliente;
            $("#nuevo_vehiculo").modal("show");
        }
    };
}

function btnEliminarVeh(cod_v) {
    Swal.fire({
        title: "Esta seguro de continuar?",
        text: "El vehiculo sera eliminado!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si, eliminar!",
        cancelButtonText: "No",
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Vehiculos/eliminar/" + cod_v;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();

            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    const frm = document.getElementById("frmVehiculo");
                    frm.reset();
                    tblVehiculos.ajax.reload();
                }
            };
            Swal.fire("Eliminado!", "El vehiculo ha sido eliminado.", "success");
        }
    });
}

/* --------------------------------------------------------------------------------------------------- */

function frmCliente() {
    document.getElementById("title").innerHTML = "Nuevo cliente";
    document.getElementById("btnAccionc").innerHTML = "Registrar";
    document.getElementById("frmCliente").reset();
    $("#nuevo_cliente").modal("show");
}

function registrarCliente(e) {
    e.preventDefault();
    const ci_cliente = document.getElementById("ci_cliente");
    const nom_cliente = document.getElementById("nom_cliente");
    const app_cliente = document.getElementById("app_cliente");
    const apm_cliente = document.getElementById("apm_cliente");

    if (
        ci_cliente.value == "" ||
        nom_cliente.value == "" ||
        app_cliente.value == "" ||
        apm_cliente.value == ""
    ) {
        Swal.fire({
            position: "center",
            icon: "error",
            title: "Todos los campos son obligatorios",
            showConfirmButton: false,
            timer: 1500,
        });
    } else {
        const url = base_url + "Clientes/registrar";
        const frm = document.getElementById("frmCliente");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                /* console.log(this.responseText); */
                const res = JSON.parse(this.responseText);
                if (res == "si") {
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "cliente registrado con exito",
                        showConfirmButton: false,
                        timer: 1500,
                    });
                    frm.reset();
                    $("#nuevo_cliente").modal("hide");
                    tblClientes.ajax.reload();
                } else if (res == "existe") {
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "cliente recurrente registrado",
                        showConfirmButton: false,
                        timer: 1500,
                    });
                    frm.reset();
                    $("#nuevo_cliente").modal("hide");
                    tblClientes.ajax.reload();
                } else {
                    Swal.fire({
                        position: "center",
                        icon: "error",
                        title: res,
                        showConfirmButton: false,
                        timer: 1500,
                    });
                }
            }
        };
    }
}

/* --------------------------------------------------------------------------------------------------- */
/* Funciones para el mantenimiento */

function verificarServicios(e) {
    var cant = 0;
    for (let i = 1; i < 4; i++) {
        var caja = "check" + i;
        var row = "sel" + i;
        var checkbox = document.getElementById(caja);
        var box = document.getElementById(row);
        box.hidden = true;
        if (checkbox.checked) {
            cant = cant + 1;
            box.hidden = false;
            obtenerPrecio(i);
        }
    }
    costo_mantenimiento2.value = cant * 20;
    costo_mantenimiento2.disabled = true;
    canti.value = cant;
    canti.disabled = true;
}

function continuarMant() {
    var cant = 0;
    var sw = 0;
    for (let i = 1; i < 4; i++) {
        var caja = "check" + i;
        var unidades = "unidad" + i;
        var unidad = document.getElementById(unidades);
        var checkbox = document.getElementById(caja);
        if (checkbox.checked) {
            cant = cant + 1;
            if (isNaN(unidad.value)) {
                error("Ingrese un valor valido de unidades");
                sw = 1;
            } else if (unidad.value < 1) {
                error("Ingrese un valor positivo de unidades");
                sw = 1;
            } else if (unidad.value == "") {
                error("El campo de unidades es obligatorio");
                sw = 1;
            }
        }
    }

    if (cant == 0) {
        error("Seleccione un servicio como minimo");
    } else if (sw == 0) {
        continuarMant2();
    }
}

function continuarMant2() {
    mante0.hidden = true;
    mante1.hidden = false;
    var costo = 0;
    var inputHora = document.getElementById("hora_mant");
    var horaActual = new Date().toLocaleTimeString("es-ES", {
        hour: "2-digit",
        minute: "2-digit",
        second: "2-digit",
    });
    inputHora.value = horaActual;
    cod_encargado2.value = encargado2.value;
    cod_ayudante2.value = ayudante2.value;
    cant_servicios.value = canti.value;
    for (let i = 1; i < 4; i++) {
        var checkbox = document.getElementById("check" + i);
        if (checkbox.checked) {
            var stock = document.getElementById("stock" + i).value;
            var unidad = document.getElementById("unidad" + i).value;
            var elem = document.getElementById("ele" + i).value;
            var precio = document.getElementById("precio" + i).value;
            if (parseInt(unidad, 10) > parseInt(stock, 10)) {
                error("No hay stock disponible");
                esperar(1000).then(() => {
                    location.reload();
                });
            } else {
                costo = costo + (precio * unidad) + 20;
                costo_mant.value = costo;
            }
        }
    }

}


function obtenerPrecio(caja) {
    elem = "ele" + caja;
    var ele = document.getElementById(elem).value;

    const url = base_url + "Mantenimientos/obtenerPrecio/" + ele;
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            /* console.log(this.responseText); */
            const res = JSON.parse(this.responseText);
            stock1 = "stock" + caja;
            precio1 = "precio" + caja;
            document.getElementById(stock1).value = res.stock;
            document.getElementById(precio1).value = res.precio_unidad;
        }
    };
}
function buscarCliente2() {
    ci = ci_cliente3.value;
    const url = base_url + "Clientes/buscar/" + ci;
    const frm = document.getElementById("frmCliente2");
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send(new FormData(frm));
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            /* console.log(this.responseText); */
            const res = JSON.parse(this.responseText);
            if (res == "no existe") {
                error("Cliente no registrado");
            } else {
                exito("Cliente encontrado");
                document.getElementById("nom_cliente3").value = res.nom_cliente;
                document.getElementById("app_cliente3").value = res.app_cliente;
                document.getElementById("apm_cliente3").value = res.apm_cliente;
            }
        }
    };
}
function registrarCliente2(e) {
    e.preventDefault();
    const url = base_url + "Clientes/registrarCliente2";
    const frm = document.getElementById("frmCliente2");
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send(new FormData(frm));
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            /* console.log(this.responseText); */
            const res = JSON.parse(this.responseText);
            if (res == "si") {
                ci_cliente4.value = ci_cliente3.value;
                registrarVehiculo2(e);
            } else {
                error("error");
            }
        }
    };
}

function registrarVehiculo2(e) {
    e.preventDefault();
    const url = base_url + "Vehiculos/registrarVehiculo3";
    const frm = document.getElementById("frmVehiculo3");
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send(new FormData(frm));
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            /* console.log(this.responseText); */
            const res = JSON.parse(this.responseText);
            if (res == "si" || res == "existe") {
                buscarCodigo2(e, placa3.value);
                almacenarMant(e);
            } else {
                exito("Datos registrados");
            }
        }
    };
}
function buscarVehiculo2(e) {
    plac = placa3.value;
    const url = base_url + "Vehiculos/buscar/" + plac;
    const frm = document.getElementById("frmVehiculo3");
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send(new FormData(frm));
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            /* console.log(this.responseText); */
            const res = JSON.parse(this.responseText);
            if (res == "no existe") {
                error("Vehiculo no registrado");
            } else {
                exito("Vehiculo encontrado");
                ci_cliente3.value = res.ci_cliente;
                nom_cliente3.value = res.nom_cliente;
                app_cliente3.value = res.app_cliente;
                apm_cliente3.value = res.apm_cliente;
                marca3.value = res.marca;
                modelo3.value = res.modelo;
                color3.value = res.color;
                cod_v5.value = res.cod_v;
            }
        }
    };
}

function registrarMant(e) {
    if (
        ci_cliente3.value == "" ||
        nom_cliente3.value == "" ||
        app_cliente3.value == "" ||
        apm_cliente3.value == ""
    ) {
        error("Los campos del cliente son obligatorios");
    } else if (
        placa3.value == "" ||
        marca3.value == "" ||
        modelo3.value == "" ||
        color3.value == ""
    ) {
        error("Los campos del vehiculo son obligatorios");
    } else {
        registrarCliente2(e);
    }
}

function buscarCodigo2(e, placa3) {
    e.preventDefault();
    const url = base_url + "Vehiculos/buscarCodigo/" + placa3;
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            /* console.log(this.responseText); */
            const res = JSON.parse(this.responseText);
            cod_v5.value = res.cod_v;
        }
    };
}
function almacenarMant(e) {
    e.preventDefault();
    if (
        cant_servicios.value == "" ||
        costo_mant.value == "" ||
        hora_mant.value == "" ||
        cod_encargado2.value == "" ||
        cod_ayudante2.value == ""
    ) {
        error("Campos del registro vacios");
    } else {
        const url = base_url + "Mantenimientos/registrarMant";
        const frm = document.getElementById("frmMant");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                /* console.log(this.responseText); */
                const res = JSON.parse(this.responseText);
                if (res == "si" || res == "existe") {
                    generarPdfMant(e);

                } else {
                    exito("Datos registrados");
                }
            }
        };
    }
}
function generarPdfMant(e) {
    e.preventDefault();
    const url = base_url + "Mantenimientos/ultimo";
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            cambiarStock(e);
            new swal({
                title: "Datos registrados correctamente",
                icon: "success",
                buttons: ["Cancelar", "Aceptar"],
            }).then((confirm) => {
                if (confirm) {
                    location.reload();
                } else {
                    location.reload();
                }
            });
            const res = JSON.parse(this.responseText);
            const ruta = base_url + 'Mantenimientos/generarPdf/' + res;
            window.open(ruta);
        }
    };
}
function cambiarStock(e) {
    e.preventDefault();
    for (let i = 1; i < 4; i++) {
        var checkbox = document.getElementById("check" + i);
        if (checkbox.checked) {
            var unidad = document.getElementById("unidad" + i).value;
            var elem = document.getElementById("ele" + i).value;
            var stock = document.getElementById("stock" + i).value;
            var valor = parseInt(stock, 10) - parseInt(unidad, 10);
            const url = base_url + 'Mantenimientos/cambiarStock';
            const params = 'elem=' + encodeURIComponent(elem) + '&valor=' + encodeURIComponent(valor);

            const http = new XMLHttpRequest();
            http.open('POST', url, true);
            http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                    const res = JSON.parse(this.responseText);
                }
            };
            http.send(params);
        }
    }
}
/* --------------------------------------------------------------------------------------------------- */
/* Funciones para el lavado */

rampas();
function rampas() {
    const url = base_url + "Lavados/listarRampas";
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            /* console.log(this.responseText); */
            const res = JSON.parse(this.responseText);

            for (let i = 1; i < res.length + 1; i++) {
                valor = res[i - 1]["estado"];
                if (
                    window.location.href == "http://localhost/taller-alfa-romeo/Lavados"
                ) {
                    cambiarIcono(valor, i);
                }
            }
        }
    };
}

function cambiarIcono(valor, i) {
    icon = document.getElementById("icono" + i);
    paragraph = document.getElementById("texto" + i);
    btn1 = document.getElementById("btni" + i);
    btn2 = document.getElementById("btnf" + i);
    if (valor == 1) {
        icon.classList.add("fa-circle-check");
        icon.classList.add("text-success");
        paragraph.textContent = "Estado: Libre";
        btn1.disabled = false;
        btn2.disabled = true;
    } else {
        icon.classList.add("fa-circle-xmark");
        icon.classList.add("text-danger");
        paragraph.textContent = "Estado: Ocupado";
        btn1.disabled = true;
        btn2.disabled = false;
    }
}

function iniciarLavado(e, rmp) {
    const pant0 = document.getElementById("lavado0");
    const pant1 = document.getElementById("lavado1");
    cod_ayudante.value = ayudante.value;
    cod_encargado.value = encargado.value;
    pant0.hidden = true;
    pant1.hidden = false;
    rampa.value = rmp;
    lavado.value = 1;
    costo_lavado2.value = 20;
    costo_lavado.value = 20;
    nom_lavado.value = "Lavado simple y secado";
    tipo_lavado.value = 1;
}

function tipoLavado(e, tipo_lav) {
    lavado.value = tipo_lav;
    switch (tipo_lav) {
        case 1:
            costo_lavado2.value = 20;
            costo_lavado.value = 20;
            tipo_lavado.value = 1;
            nom_lavado.value = "Lavado simple y secado";
            descripcion.innerHTML = "Lavado simple y secado";
            imagen_lavado.setAttribute(
                "src",
                "http://localhost/taller-alfa-romeo/Assets/img/lavado1.jpg"
            );
            break;
        case 2:
            costo_lavado2.value = 25;
            costo_lavado.value = 25;
            tipo_lavado.value = 2;
            nom_lavado.value = "Lavado completo, fumigado y engrasado";
            descripcion.innerHTML = "Lavado completo, fumigado y engrasado";
            imagen_lavado.setAttribute(
                "src",
                "http://localhost/taller-alfa-romeo/Assets/img/lavado2.jpg"
            );
            break;
        case 3:
            costo_lavado2.value = 35;
            costo_lavado.value = 35;
            tipo_lavado.value = 3;
            nom_lavado.value = "Lavado, fumigado y limpieza interior";
            descripcion.innerHTML = "Lavado, fumigado y limpieza interior";
            imagen_lavado.setAttribute(
                "src",
                "http://localhost/taller-alfa-romeo/Assets/img/lavado3.jpg"
            );
            break;
        case 4:
            costo_lavado2.value = 45;
            costo_lavado.value = 45;
            tipo_lavado.value = 4;
            nom_lavado.value = "Todos los servicios, encerado y pulido";
            descripcion.innerHTML = "Todos los servicios, encerado y pulido";
            imagen_lavado.setAttribute(
                "src",
                "http://localhost/taller-alfa-romeo/Assets/img/lavado4.jpg"
            );
            break;
        default:
            break;
    }
}

function continuarLavado(e) {
    const pant0 = document.getElementById("lavado1");
    const pant1 = document.getElementById("lavado2");
    pant0.hidden = true;
    pant1.hidden = false;
    var inputHora = document.getElementById("hora_lavado");
    var horaActual = new Date().toLocaleTimeString("es-ES", {
        hour: "2-digit",
        minute: "2-digit",
        second: "2-digit",
    });
    inputHora.value = horaActual;
}

function registrarLavado(e) {
    if (
        ci_cliente.value == "" ||
        nom_cliente.value == "" ||
        app_cliente.value == "" ||
        apm_cliente.value == ""
    ) {
        error("Los campos del cliente son obligatorios");
    } else if (
        placa2.value == "" ||
        marca2.value == "" ||
        modelo2.value == "" ||
        color2.value == ""
    ) {
        error("Los campos del vehiculo son obligatorios");
    } else {
        registrarCliente(e);
    }
}

function registrarCliente(e) {
    e.preventDefault();
    const url = base_url + "Clientes/registrarCliente";
    const frm = document.getElementById("frmCliente");
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send(new FormData(frm));
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            /* console.log(this.responseText); */
            const res = JSON.parse(this.responseText);
            if (res == "si") {
                ci_cliente2.value = ci_cliente.value;
                registrarVehiculo(e);
            } else {
                error("error");
            }
        }
    };
}

function buscarCliente() {
    ci = ci_cliente.value;
    const url = base_url + "Clientes/buscar/" + ci;
    const frm = document.getElementById("frmCliente");
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send(new FormData(frm));
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            /* console.log(this.responseText); */
            const res = JSON.parse(this.responseText);
            if (res == "no existe") {
                error("Cliente no registrado");
            } else {
                exito("Cliente encontrado");
                document.getElementById("nom_cliente").value = res.nom_cliente;
                document.getElementById("app_cliente").value = res.app_cliente;
                document.getElementById("apm_cliente").value = res.apm_cliente;
            }
        }
    };
}

function registrarVehiculo(e) {
    e.preventDefault();
    const url = base_url + "Vehiculos/registrarVehiculo2";
    const frm = document.getElementById("frmVehiculo2");
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send(new FormData(frm));
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            /* console.log(this.responseText); */
            const res = JSON.parse(this.responseText);
            if (res == "si" || res == "existe") {
                buscarCodigo(e, placa2.value);
                almacenarLavado(e);
            } else {
                exito("Datos registrados");
            }
        }
    };
}

function buscarVehiculo(e) {
    plac = placa2.value;
    const url = base_url + "Vehiculos/buscar/" + plac;
    const frm = document.getElementById("frmVehiculo2");
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send(new FormData(frm));
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            /* console.log(this.responseText); */
            const res = JSON.parse(this.responseText);
            if (res == "no existe") {
                error("Vehiculo no registrado");
            } else {
                exito("Vehiculo encontrado");
                ci_cliente.value = res.ci_cliente;
                nom_cliente.value = res.nom_cliente;
                app_cliente.value = res.app_cliente;
                apm_cliente.value = res.apm_cliente;
                marca2.value = res.marca;
                modelo2.value = res.modelo;
                color2.value = res.color;
                cod_v3.value = res.cod_v;
            }
        }
    };
}

function buscarCodigo(e, placa3) {
    e.preventDefault();
    const url = base_url + "Vehiculos/buscarCodigo/" + placa3;
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            /* console.log(this.responseText); */
            const res = JSON.parse(this.responseText);
            cod_v3.value = res.cod_v;
        }
    };
}

function almacenarLavado(e) {
    e.preventDefault();
    if (
        costo_lavado.value == "" ||
        hora_lavado.value == "" ||
        cod_encargado.value == "" ||
        cod_ayudante.value == "" ||
        tipo_lavado.value == ""
    ) {
        error("Campos del registro vacios");
    } else {
        const url = base_url + "Lavados/registrarLavado";
        const frm = document.getElementById("frmLavado");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                /* console.log(this.responseText); */
                const res = JSON.parse(this.responseText);
                if (res == "si" || res == "existe") {
                    generarPdfLavado(e);
                } else {
                    exito("Datos registrados");
                }
            }
        };
    }
}

function generarPdfLavado(e) {
    e.preventDefault();
    const url = base_url + "Lavados/ultimo";
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            new swal({
                title: "Datos registrados correctamente",
                icon: "success",
                buttons: ["Cancelar", "Aceptar"],
            }).then((confirm) => {
                if (confirm) {
                    location.reload();
                } else {
                    location.reload();
                }
            });
            cambiarLavado(e);
            const res = JSON.parse(this.responseText);
            const ruta = base_url + 'Lavados/generarPdf/' + res;
            window.open(ruta);
        }
    };
}

function cambiarLavado(e) {
    e.preventDefault();
    rmp = document.getElementById("rampa").value;
    const url = base_url + "Lavados/cambiarLavado/" + rmp;
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            const res = JSON.parse(this.responseText);
        }
    };
}

function finalizarLavado(e, rmp) {
    const url = base_url + "Lavados/finalizarLavado/" + rmp;
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            /* console.log(this.responseText); */
            const res = JSON.parse(this.responseText);
            if (res == "modificado") {
                exito("El lavado finalizo correctamente");
                esperar(2000).then(() => {
                    location.reload();
                });
            } else {
                error("La rampa no se pudo desocupar");
            }
        }
    };
}

/* ------------------------------------------------------------------------------------ */
/* Funciones para los graficos */

lavadosMas();
function lavadosMas() {
    const url = base_url + "Estadisticas/lavadosMas";
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            /* console.log(this.responseText); */
            const res = JSON.parse(this.responseText);

            let tipo = [];
            let cantidad = [];
            for (let i = 0; i < res.length; i++) {
                tipo.push(getTipoLavado(res[i]['tipo_lavado']));
                cantidad.push(res[i]['cantidad']);
            }

            var ctx = document.getElementById("lavadosMas");
            var myPieChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: tipo,
                    datasets: [{
                        data: cantidad,
                        backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#28a745'],
                    }],
                },
            });
        }
    }
}

function getTipoLavado(tipo) {
    switch (tipo) {
        case "1":
            return 'Simple';
        case "2":
            return 'Completo';
        case "3":
            return 'Especial';
        case "4":
            return 'Extra Especial';
        default:
            return '';
    }
}

mantenimientosMas();
function mantenimientosMas() {
    const url = base_url + "Estadisticas/mantenimientosMas";
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            /* console.log(this.responseText); */
            const res = JSON.parse(this.responseText);

            let tipo = [];
            let cantidad = [];
            for (let i = 0; i < res.length; i++) {
                tipo.push(getTipoMantenimiento(res[i]['cant_servicios']));
                cantidad.push(res[i]['cantidad']);
            }

            var ctx = document.getElementById("mantenimientosMas");
            var myPieChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: tipo,
                    datasets: [{
                        data: cantidad,
                        backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#28a745'],
                    }],
                },
            });
        }
    }
}

function getTipoMantenimiento(tipo) {
    switch (tipo) {
        case "1":
            return 'Cambio general';
        case "2":
            return 'Reparacion especial';
        case "3":
            return 'Mantenimiento completo';
        default:
            return '';
    }
}

dineroMas();
function dineroMas() {
    const url = base_url + "Estadisticas/dineroMas";
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            /* console.log(this.responseText); */
            const res = JSON.parse(this.responseText);

            let servicio = [];
            let cantidad = [];
            for (let i = 0; i < res.length; i++) {
                servicio.push(res[i]['servicio']);
                cantidad.push(res[i]['total']);
            }

            var ctx = document.getElementById("dineroMas");
            var myLineChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: servicio,
                    datasets: [{
                        label: "",
                        backgroundColor: ['#1EE5D9', '#E5D91E', '#ffc107', '#28a745'],
                        borderColor: "rgba(2,117,216,1)",
                        data: cantidad,
                    }],
                },
                options: {
                    scales: {
                        xAxes: [{
                            time: {
                                unit: 'month'
                            },
                            gridLines: {
                                display: false
                            },
                            ticks: {
                                maxTicksLimit: 6
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                min: 0,
                                max: 15000,
                                maxTicksLimit: 5
                            },
                            gridLines: {
                                display: true
                            }
                        }],
                    },
                    legend: {
                        display: false
                    }
                }
            });

        }
    }
}

clientesMas();
function clientesMas() {
    const url = base_url + "Estadisticas/clientesMas";
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send();
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            /* console.log(this.responseText); */
            const res = JSON.parse(this.responseText);

            let nombre = [];
            let cantidad = [];
            for (let i = 0; i < res.length; i++) {
                nombre.push(res[i]['nombre_completo']);
                cantidad.push(res[i]['cantidad']);
            }
            var ctx = document.getElementById("clientesMas");
            var myLineChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: nombre,
                    datasets: [{
                        label: "Servicios realizados",
                        backgroundColor: ['#E5D91E', '#1EE5D9', '#1EE55D ', '#1E6FE5 ', '#9554E4 '],
                        borderColor: "rgba(2,117,216,1)",
                        data: cantidad,
                    }],
                },
                options: {
                    scales: {
                        xAxes: [{
                            time: {
                                unit: 'month'
                            },
                            gridLines: {
                                display: false
                            },
                            ticks: {
                                maxTicksLimit: 6
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                min: 0,
                                max: 15000,
                                maxTicksLimit: 5
                            },
                            gridLines: {
                                display: true
                            }
                        }],
                    },
                    legend: {
                        display: false
                    }
                }
            });

        }
    }
}


/* --------------------------------------------------------------------------------------------------- */

function esperar(ms) {
    return new Promise((resolve) => setTimeout(resolve, ms));
}

function prueba() {
    prueba2();
    location.reload();
}
function exito(texto) {
    Swal.fire({
        position: "center",
        icon: "success",
        title: texto,
        showConfirmButton: false,
        timer: 1500,
    });
}
function error(texto) {
    Swal.fire({
        position: "center",
        icon: "error",
        title: texto,
        showConfirmButton: false,
        timer: 1500,
    });
}
function prueba2(texto, icono) {
    Swal.fire({
        position: "center",
        icon: icono,
        title: texto,
        showConfirmButton: false,
        timer: 1500,
    });
}
function prueba3() {
    Swal.fire({
        position: "center",
        icon: "success",
        title: "texto",
        showConfirmButton: false,
        timer: 1500,
    });
}
