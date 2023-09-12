<?php
class VehiculosModel extends Query
{
    private $cod_v, $datos, $placa, $placa2, $marca, $modelo, $color, $ci_cliente;
    public function __construct()
    {
        parent::__construct();
    }

    public function getVehiculos()
    {
        $sql = "SELECT * FROM vehiculo";
        $data = $this->selectAll($sql);
        return $data;
    }
    function buscarCodigo(string $placa2)
    {
        $this->placa = $placa2;
        $sql = "SELECT * FROM vehiculo WHERE placa = '$this->placa'";
        $data = $this->select($sql);
        return $data;
    }
    public function registrarVehiculo(string $placa, string $marca, string $modelo, string $color, int $ci_cliente)
    {
        $this->placa = $placa;
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->color = $color;
        $this->ci_cliente = $ci_cliente;
        $verificar = "SELECT * FROM vehiculo WHERE placa = '$this->placa'";
        $existe = $this->select($verificar);
        if (empty($existe)) {
            $sql = "INSERT INTO vehiculo(placa,marca,modelo,color,ci_cliente) VALUES (?,?,?,?,?)";
            $datos = array($this->placa, $this->marca, $this->modelo, $this->color, $this->ci_cliente);
            $data = $this->save($sql, $datos);
            if ($data == 1) {
                $res = "ok";
            } else {
                $res = "error";
            }
        } else {
            $res = "existe";
        }
        return $res;
    }

    public function modificarVehiculo(string $placa, string $marca, string $modelo, string $color, int $ci_cliente, int $cod_v)
    {
        $this->cod_v = $cod_v;
        $this->placa = $placa;
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->color = $color;
        $this->ci_cliente = $ci_cliente;

        $sql = "UPDATE vehiculo SET placa = ?, marca = ?, modelo = ?, color = ?, ci_cliente= ? WHERE cod_v = ?";
        $datos = array($this->placa, $this->marca, $this->modelo, $this->color, $this->ci_cliente, $this->cod_v);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "modificado";
        } else {
            $res = "error";
        }
        return $res;
    }
    public function editarVeh(int $cod_v)
    {
        $sql = "SELECT * FROM vehiculo WHERE cod_v = $cod_v";
        $data = $this->select($sql);
        return $data;
    }
    public function eliminarVeh(int $cod_v)
    {
        $sql = "DELETE FROM vehiculo WHERE cod_v = $cod_v";
        $data = $this->select($sql);
        return $data;
    }
    public function buscarVehiculo(string $placa)
    {
        $verificar = "SELECT * FROM vehiculo WHERE placa = '$placa'";
        $existe = $this->select($verificar);

        if (empty($existe)) {
            $data = "no existe";
        } else {
            $sql = "SELECT * FROM vehiculo v,cliente c 
                    WHERE v.placa = '$placa'
                    AND v.ci_cliente = c.ci_cliente";
            $data = $this->select($sql);
        }
        return $data;
    }
}

?>