<?php
class Mantenimientos extends Controller
{
    public function __construct()
    {
        session_start();
        parent::__construct();
    }
    public function index()
    {
        $data['aceites'] = $this->model->getAceites();
        $data['filtros'] = $this->model->getFiltros();
        $data['balatass'] = $this->model->getBalatas();
        $data['encargados2'] = $this->model->getEncargados();
        $data['ayudantes2'] = $this->model->getAyudantes();
        $this->views->getView($this, "index", $data);
    }
    public function obtenerPrecio(int $cod_producto)
    {
        $data = $this->model->obtenerPrecio($cod_producto);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function registrarMant()
    {
        $cant_servicios = $_POST["cant_servicios"];
        $hora_mant = $_POST["hora_mant"];
        $costo_mant = $_POST["costo_mant"];
        $cod_encargado = $_POST["cod_encargado2"];
        $cod_ayudante = $_POST["cod_ayudante2"];
        $cod_v = $_POST["cod_v5"];
        $cod_mant = $_POST["cod_mant"];
        if (empty($cant_servicios) || empty($hora_mant) || empty($costo_mant) || empty($cod_encargado) || empty($cod_ayudante) || empty($cod_v)) {
            $msg = "Todos los campos son obligatorios";
        } else {
            $data = $this->model->registrarMant($cant_servicios, $hora_mant, $costo_mant, $cod_encargado, $cod_ayudante, $cod_v);
            if ($data == "ok") {
                $msg = "si";
            } else {
                $msg = "Error al registrar";
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function ultimo()
    {
        $id = 0;
        $data = $this->model->getMantenimientos();
        for ($i = 0; $i < count($data); $i++) {
            if ($data[$i]['cod_mant'] > $id) {
                $id = $data[$i]['cod_mant'];
            }
        }
        echo json_encode($id, JSON_UNESCAPED_UNICODE);
        die();
    }
    function generarPdf($cod_mant)
    {
        $mantenimiento = $this->model->getMantenimiento($cod_mant);
        $vehiculo = $this->model->getVehiculo($mantenimiento['cod_v']);
        $cliente = $this->model->getCliente($vehiculo['ci_cliente']);
        require('Libraries/fpdf/fpdf.php');

        $pdf = new FPDF('L', 'mm', array(90, 55));
        $pdf->AddPage();
        $pdf->SetAutoPageBreak(false, 0);

        $pdf->SetTitle('Mantenimiento registrado');
        $pdf->Image(base_url . 'Assets/img/text.png', 7, 5, 43, 17);
        $pdf->SetFont('Courier', 'B', 6);
        $pdf->Cell(40, 1, '', 0, 0);
        $pdf->Cell(38, 3, 'Tel. 4589309 - 4235928', 0, 1, 'C');
        $pdf->Cell(40, 1, '', 0, 0);
        $pdf->Cell(38, 3, 'Oruro - Bolivia', 0, 1, 'C');
        $pdf->Cell(40, 1, '', 0, 0);
        $pdf->Cell(38, 3, 'NIT: 00146588023', 0, 1, 'C');
        $pdf->Cell(40, 6, 'Direccion: Avenida Tacna final Norte', 0, 0, 'C');
        $pdf->Cell(38, 6, 'Num. mantenimiento: ' . $mantenimiento['cod_mant'], 0, 1, 'C');
        $pdf->Cell(70, 6, '---------------------------------------------------------------', 0, 1, 'C');

        $pdf->Cell(35, 6, 'Hora de venta: ' . $mantenimiento['hora_mant'], 0, 0, 'C');
        $pdf->Cell(35, 6, 'Servicio: Mantenimiento', 0, 1, 'C');
        switch ($mantenimiento['cant_servicios']) {
            case 1:
                $pdf->Cell(35, 6, 'Tipo: Mantenimiento Simple', 0, 0, 'C');
                break;
            case 2:
                $pdf->Cell(35, 6, 'Tipo: Mantenimiento Completo', 0, 0, 'C');
                break;
            case 3:
                $pdf->Cell(35, 6, 'Tipo: Mantenimiento Especial', 0, 0, 'C');
                break;
            default:
                break;
        }
        $pdf->Cell(35, 6, 'Costo: ' . $mantenimiento['costo_mant'] . ' Bs.', 0, 1, 'C');
        $pdf->Cell(35, 6, 'Placa: ' . $vehiculo['placa'], 0, 0, 'C');
        $pdf->Cell(35, 6, 'Cliente: ' . $cliente['nom_cliente'] . ' ' . $cliente['app_cliente'], 0, 1, 'C');
        $pdf->Output();
    }
    public function cambiarStock()
    {
        $elem = $_POST['elem'];
        $valor = $_POST['valor'];
        $data = $this->model->cambiarStock($elem, $valor);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
}
?>