<?php
class LavadosModel extends Query
{
    private $cod_rampa, $datos, $tipo_lavado, $hora_lavado, $costo_lavado, $cod_encargado, $cod_ayudante, $cod_v;
    public function __construct()
    {
        parent::__construct();
    }
    public function listarRampas()
    {
        $sql = "SELECT * FROM rampa";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function getLavados() {
        $sql = "SELECT * FROM lavado";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function getLavado(string $cod_lavado)
    {
        $sql = "SELECT * FROM lavado WHERE cod_lavado = $cod_lavado";
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
    public function finalizarLavado(string $cod_rampa)
    {
        $this->cod_rampa = $cod_rampa;
        $sql = "UPDATE rampa SET estado = 1 WHERE cod_rampa = ?";
        $datos = array($this->cod_rampa);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "modificado";
        } else {
            $res = "error";
        }
        return $res;
    }
    public function cambiarLavado(string $cod_rampa)
    {
        $this->cod_rampa = $cod_rampa;
        $sql = "UPDATE rampa SET estado = 0 WHERE cod_rampa = ?";
        $datos = array($this->cod_rampa);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "modificado";
        } else {
            $res = "error";
        }
        return $res;
    }
    public function registrarLavado(string $tipo_lavado, string $hora_lavado, string $costo_lavado, string $cod_encargado, string $cod_ayudante, string $cod_v)
    {
        $this->tipo_lavado = $tipo_lavado;
        $this->hora_lavado = $hora_lavado;
        $this->costo_lavado = $costo_lavado;
        $this->cod_encargado = $cod_encargado;
        $this->cod_ayudante = $cod_ayudante;
        $this->cod_v = $cod_v;
        $sql = "INSERT INTO lavado(tipo_lavado,hora_lavado,costo_lavado,cod_encargado,cod_ayudante,cod_v) VALUES (?,?,?,?,?,?)";
        $datos = array($this->tipo_lavado, $this->hora_lavado, $this->costo_lavado, $this->cod_encargado, $this->cod_ayudante, $this->cod_v);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "ok";
        } else {
            $res = "error";
        }
        return $res;
    }
}

?>