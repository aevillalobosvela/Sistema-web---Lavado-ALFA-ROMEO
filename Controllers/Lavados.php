<?php
class Lavados extends Controller
{
    public function __construct()
    {
        session_start();
        parent::__construct();
    }
    public function index()
    {
        $data['encargados'] = $this->model->getEncargados();
        $data['ayudantes'] = $this->model->getAyudantes();
        $this->views->getView($this, "index", $data);
    }

    public function listarRampas()
    {
        $data = $this->model->listarRampas();
        echo json_encode($data);
        die();
    }

    public function finalizarLavado(int $cod_rampa)
    {
        $data = $this->model->finalizarLavado($cod_rampa);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function cambiarLavado(int $cod_rampa)
    {
        $data = $this->model->cambiarLavado($cod_rampa);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    function registrarLavado()
    {
        $tipo_lavado = $_POST["tipo_lavado"];
        $hora_lavado = $_POST["hora_lavado"];
        $costo_lavado = $_POST["costo_lavado"];
        $cod_encargado = $_POST["cod_encargado"];
        $cod_ayudante = $_POST["cod_ayudante"];
        $cod_v = $_POST["cod_v3"];
        $cod_lavado = $_POST["cod_lavado"];
        if (empty($tipo_lavado) || empty($hora_lavado) || empty($costo_lavado) || empty($cod_encargado) || empty($cod_ayudante) || empty($cod_v)) {
            $msg = "Todos los campos son obligatorios";
        } else {
            $data = $this->model->registrarLavado($tipo_lavado, $hora_lavado, $costo_lavado, $cod_encargado, $cod_ayudante, $cod_v);
            if ($data == "ok") {
                $msg = "si";
            } else {
                $msg = "Error al registrar";
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    function ultimo()
    {
        $id = 0;
        $data = $this->model->getLavados();
        for ($i = 0; $i < count($data); $i++) {
            if ($data[$i]['cod_lavado'] > $id) {
                $id = $data[$i]['cod_lavado'];
            }
        }
        echo json_encode($id, JSON_UNESCAPED_UNICODE);
        die();
    }
    function generarPdf($cod_lavado)
    {
        $lavado = $this->model->getLavado($cod_lavado);
        $vehiculo = $this->model->getVehiculo($lavado['cod_v']);
        $cliente = $this->model->getCliente($vehiculo['ci_cliente']);
        require('Libraries/fpdf/fpdf.php');

        $pdf = new FPDF('L', 'mm', array(90, 55));
        $pdf->AddPage();
        $pdf->SetAutoPageBreak(false, 0);

        $pdf->SetTitle('Lavado registrado');
        $pdf->Image(base_url . 'Assets/img/text.png', 7, 5, 43, 17);
        $pdf->SetFont('Courier', 'B', 6);
        $pdf->Cell(40, 1, '', 0, 0);
        $pdf->Cell(38, 3, 'Tel. 4589309 - 4235928', 0, 1, 'C');
        $pdf->Cell(40, 1, '', 0, 0);
        $pdf->Cell(38, 3, 'Oruro - Bolivia', 0, 1, 'C');
        $pdf->Cell(40, 1, '', 0, 0);
        $pdf->Cell(38, 3, 'NIT: 00146588023', 0, 1, 'C');
        $pdf->Cell(40, 6, 'Direccion: Avenida Tacna final Norte', 0, 0, 'C');
        $pdf->Cell(38, 6, 'Num. lavado: ' . $lavado['cod_lavado'], 0, 1, 'C');
        $pdf->Cell(70, 6, '---------------------------------------------------------------', 0, 1, 'C');

        $pdf->Cell(35, 6, 'Hora de venta: ' . $lavado['hora_lavado'], 0, 0, 'C');
        $pdf->Cell(35, 6, 'Servicio: Lavado', 0, 1, 'C');
        switch ($lavado['tipo_lavado']) {
            case 1:
                $pdf->Cell(35, 6, 'Tipo: Lavado Simple', 0, 0, 'C');
                break;
            case 2:
                $pdf->Cell(35, 6, 'Tipo: Lavado Completo', 0, 0, 'C');
                break;
            case 3:
                $pdf->Cell(35, 6, 'Tipo: Lavado Especial', 0, 0, 'C');
                break;
            case 4:
                $pdf->Cell(35, 6, 'Tipo: Lavado Extra Especial', 0, 0, 'C');
                break;
            default:
                break;
        }
        $pdf->Cell(35, 6, 'Costo: ' . $lavado['costo_lavado'] . ' Bs.', 0, 1, 'C');
        $pdf->Cell(35, 6, 'Placa: ' . $vehiculo['placa'], 0, 0, 'C');
        $pdf->Cell(35, 6, 'Cliente: ' . $cliente['nom_cliente'] . ' ' . $cliente['app_cliente'], 0, 1, 'C');
        $pdf->Output();
    }
}
?>