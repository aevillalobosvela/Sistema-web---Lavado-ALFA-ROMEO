<?php
class Vehiculos extends Controller
{
    public function __construct()
    {
        session_start();
        parent::__construct();
    }
    public function index()
    {
        $this->views->getView($this, "index");
    }
    public function listar()
    {
        $data = $this->model->getVehiculos();
        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['acciones'] = '<div>
            <button class="btn btn-primary btn-sm" type="button" onclick="btnEditarVeh(' . $data[$i]['cod_v'] . ');">
                <i class="fas fa-pencil"></i> 
            </button>
            <button class="btn btn-danger btn-sm" type="button" onclick="btnEliminarVeh(' . $data[$i]['cod_v'] . ');">
                <i class="fas fa-trash"></i> 
            </button>
            <div/>';
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function registrarVehiculo()
    {
        /* print_r($_POST); */

        $placa = $_POST['placa'];
        $marca = $_POST['marca'];
        $modelo = $_POST['modelo'];
        $color = $_POST['color'];
        $ci_cliente = $_POST['ci_cliente'];
        $cod_v = $_POST['cod_v'];
        if (empty($placa) || empty($marca) || empty($modelo) || empty($color) || empty($ci_cliente)) {
            $msg = "Todos los campos son obligatorios";
        } else {
            if ($cod_v == "") {

                $data = $this->model->registrarVehiculo($placa, $marca, $modelo, $color, $ci_cliente);
                if ($data == "ok") {
                    $msg = "si";
                } else if ($data == "existe") {
                    $msg = "El vehiculo ya existe";
                } else {
                    $msg = "Error al registrar vehiculo";
                }
            } else {
                $data = $this->model->modificarVehiculo($placa, $marca, $modelo, $color, $ci_cliente, $cod_v);
                if ($data == "modificado") {
                    $msg = "modificado";
                } else {
                    $msg = "Error al modificar vehiculo";
                }
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function registrarVehiculo2()
    {
        /* print_r($_POST); */

        $placa = $_POST['placa2'];
        $marca = $_POST['marca2'];
        $modelo = $_POST['modelo2'];
        $color = $_POST['color2'];
        $ci_cliente = $_POST['ci_cliente2'];
        $cod_v = $_POST['cod_v2'];
        if (empty($placa) || empty($marca) || empty($modelo) || empty($color) || empty($ci_cliente)) {
            $msg = "Todos los campos son obligatorios";
        } else {
            $data = $this->model->registrarVehiculo($placa, $marca, $modelo, $color, $ci_cliente);
            if ($data == "ok") {
                $msg = "si";
            } else if ($data == "existe") {
                $msg = "existe";
            } else {
                $msg = "Error al registrar vehiculo";
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function registrarVehiculo3()
    {
        /* print_r($_POST); */

        $placa = $_POST['placa3'];
        $marca = $_POST['marca3'];
        $modelo = $_POST['modelo3'];
        $color = $_POST['color3'];
        $ci_cliente = $_POST['ci_cliente4'];
        $cod_v = $_POST['cod_v4'];
        if (empty($placa) || empty($marca) || empty($modelo) || empty($color) || empty($ci_cliente)) {
            $msg = "Todos los campos son obligatorios";
        } else {
            $data = $this->model->registrarVehiculo($placa, $marca, $modelo, $color, $ci_cliente);
            if ($data == "ok") {
                $msg = "si";
            } else if ($data == "existe") {
                $msg = "existe";
            } else {
                $msg = "Error al registrar vehiculo";
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function buscarCodigo($placa)
    {
        $data = $this->model->buscarCodigo($placa);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function editar(int $cod_v)
    {
        $data = $this->model->editarVeh($cod_v);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function eliminar(int $cod_v)
    {
        $data = $this->model->eliminarVeh($cod_v);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function buscar($placa)
    {
        $data = $this->model->buscarVehiculo($placa);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
}
?>