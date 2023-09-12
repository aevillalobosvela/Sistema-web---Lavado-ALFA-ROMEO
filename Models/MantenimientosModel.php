<?php
class MantenimientosModel extends Query
{
    private $datos, $cod_producto, $stock, $valor;
    private $cant_servicios, $tipo_mant, $hora_mant, $costo_mant, $cod_encargado, $cod_ayudante, $cod_v;

    public function __construct()
    {
        parent::__construct();
    }

    public function getProductos()
    {
        $sql = "SELECT * FROM producto";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function getAceites()
    {
        $sql = "SELECT * FROM producto WHERE tipo_producto = 'Aceite de motor'";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function getFiltros()
    {
        $sql = "SELECT * FROM producto WHERE tipo_producto = 'Filtro de aceite'";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function getBalatas()
    {
        $sql = "SELECT * FROM producto WHERE tipo_producto = 'Balatas de freno'";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function getEncargados()
    {
        $sql = "SELECT * FROM empleado WHERE cargo = 'tec. lavado'";
        $data = $this->selectAll($sql);
        return $data;
    }

    public function getAyudantes()
    {
        $sql = "SELECT * FROM empleado WHERE cargo = 'ayudante'";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function obtenerPrecio(int $cod_producto)
    {
        $sql = "SELECT * FROM producto WHERE cod_producto = $cod_producto";
        $data = $this->select($sql);
        return $data;
    }
    public function registrarMant(string $cant_servicios, string $hora_mant, string $costo_mant, string $cod_encargado, string $cod_ayudante, string $cod_v)
    {
        $this->cant_servicios = $cant_servicios;
        $this->hora_mant = $hora_mant;
        $this->costo_mant = $costo_mant;
        $this->cod_encargado = $cod_encargado;
        $this->cod_ayudante = $cod_ayudante;
        $this->cod_v = $cod_v;
        $sql = "INSERT INTO mantenimiento(cant_servicios,hora_mant,costo_mant,cod_encargado,cod_ayudante,cod_v) VALUES (?,?,?,?,?,?)";
        $datos = array($this->cant_servicios, $this->hora_mant, $this->costo_mant, $this->cod_encargado, $this->cod_ayudante, $this->cod_v);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "ok";
        } else {
            $res = "error";
        }
        return $res;
    }
    public function getMantenimientos()
    {
        $sql = "SELECT * FROM mantenimiento";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function getMantenimiento(string $cod_mant)
    {
        $sql = "SELECT * FROM mantenimiento WHERE cod_mant = $cod_mant";
        $data = $this->select($sql);
        return $data;
    }
    public function getVehiculo(string $cod_v)
    {
        $sql = "SELECT * FROM vehiculo WHERE cod_v = $cod_v";
        $data = $this->select($sql);
        return $data;
    }
    public function getCliente(string $ci_cliente)
    {
        $sql = "SELECT * FROM cliente WHERE ci_cliente = $ci_cliente";
        $data = $this->select($sql);
        return $data;
    }
    public function cambiarStock(string $cod_producto, string $valor)
    {
        $this->cod_producto = $cod_producto;
        $this->valor = $valor;

        $sql = "UPDATE producto SET stock= ? WHERE cod_producto = ?";
        $datos = array($this->valor, $this->cod_producto);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "si";
        } else {
            $res = "error";
        }
        return $res;
    }
}

?>