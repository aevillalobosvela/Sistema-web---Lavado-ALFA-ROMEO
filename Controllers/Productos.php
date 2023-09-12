<?php
class Productos extends Controller
{
    public function __construct()
    {
        session_start();
        parent::__construct();
    }
    public function index()
    {
        $data['aceites'] = $this->model->getAceites();
        $this->views->getView($this, "index", $data);
    }
    public function listar()
    {
        $data = $this->model->getProductos();

        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['acciones'] = '<div>
            <button class="btn btn-primary btn-sm" type="button" onclick="btnEditarProd(' . $data[$i]['cod_producto'] . ');">
                <i class="fas fa-pencil"></i> 
            </button>
            <div/>';
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function editar(int $cod_producto)
    {
        $data = $this->model->editarProd($cod_producto);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function modificarStock()
    {
        $stock = $_POST['stock2'];
        $cod_producto = $_POST['cod_producto2'];
        if (empty($stock) || empty($cod_producto)) {
            $msg = "Todos los campos son obligatorios";
        } else {
            $data = $this->model->modificarStock($stock, $cod_producto);
            if ($data == "modificado") {
                $msg = "si";
            } else {
                $msg = "Error";
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
}
?>