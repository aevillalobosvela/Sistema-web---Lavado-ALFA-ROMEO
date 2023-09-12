<?php
class Clientes extends Controller
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
        $data = $this->model->getClientes();
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function registrarCliente()
    {
        /* print_r($_POST); */

        $ci_cliente = $_POST["ci_cliente"];
        $nom_cliente = $_POST['nom_cliente'];
        $app_cliente = $_POST['app_cliente'];
        $apm_cliente = $_POST['apm_cliente'];
        if (empty($ci_cliente) || empty($nom_cliente) || empty($app_cliente) || empty($apm_cliente)) {
            $msg = "Todos los campos son obligatorios";
        } else {
            $data = $this->model->registrarCliente($ci_cliente, $nom_cliente, $app_cliente, $apm_cliente);
            if ($data == "ok") {
                $msg = "si";
            } else if ($data == "existe") {
                $msg = "si";
            } else {
                $msg = "Error al registrar cliente";
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function registrarCliente2()
    {
        /* print_r($_POST); */

        $ci_cliente = $_POST["ci_cliente3"];
        $nom_cliente = $_POST['nom_cliente3'];
        $app_cliente = $_POST['app_cliente3'];
        $apm_cliente = $_POST['apm_cliente3'];
        if (empty($ci_cliente) || empty($nom_cliente) || empty($app_cliente) || empty($apm_cliente)) {
            $msg = "Todos los campos son obligatorios";
        } else {
            $data = $this->model->registrarCliente($ci_cliente, $nom_cliente, $app_cliente, $apm_cliente);
            if ($data == "ok") {
                $msg = "si";
            } else if ($data == "existe") {
                $msg = "si";
            } else {
                $msg = "Error al registrar cliente";
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function buscar($ci)
    {
        $data = $this->model->buscarCliente($ci);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
}
?>