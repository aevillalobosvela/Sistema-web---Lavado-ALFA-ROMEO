<?php
class Estadisticas extends Controller
{
    public function __construct()
    {
        session_start();
        parent::__construct();
    }
    public function index()
    {
        $data['empleado'] = $this->model->getDatos('empleado');
        $data['cliente'] = $this->model->getDatos('cliente');
        $data['mantenimiento'] = $this->model->getDatos('mantenimiento');
        $data['lavado'] = $this->model->getDatos('lavado');
        $this->views->getView($this, "index", $data);
    }
    public function lavadosMas()
    {
        $data = $this->model->lavadosMas();
        echo json_encode($data);
        die();
    }
    public function mantenimientosMas()
    {
        $data = $this->model->mantenimientosMas();
        echo json_encode($data);
        die();
    }
    public function dineroMas()
    {
        $data = $this->model->dineroMas();
        echo json_encode($data);
        die();
    }
    public function clientesMas()
    {
        $data = $this->model->clientesMas();
        echo json_encode($data);
        die();
    }
}
?>