<?php
class ClientesModel extends Query
{
    private $datos, $ci_cliente, $nom_cliente, $app_cliente, $apm_cliente;
    public function __construct()
    {
        parent::__construct();
    }
    public function getClientes()
    {
        $sql = "SELECT * FROM cliente";
        $data = $this->selectAll($sql);
        return $data;
    }

    public function registrarCliente(string $ci_cliente, string $nom_cliente, string $app_cliente, string $apm_cliente)
    {
        $this->ci_cliente = $ci_cliente;
        $this->nom_cliente = $nom_cliente;
        $this->app_cliente = $app_cliente;
        $this->apm_cliente = $apm_cliente;
        $verificar = "SELECT * FROM cliente WHERE ci_cliente = '$this->ci_cliente'";
        $existe = $this->select($verificar);
        if (empty($existe)) {
            $sql = "INSERT INTO cliente(ci_cliente, nom_cliente, app_cliente, apm_cliente) 
            VALUES (?,?,?,?)";
            $datos = array($this->ci_cliente, $this->nom_cliente, $this->app_cliente, $this->apm_cliente);
            $data = $this->save($sql, $datos);
            if ($data == 1) {
                $res = "ok";
            } else {
                $res = "error";
            }
        } else {
            $sql = "UPDATE cliente SET nom_cliente= ?, app_cliente= ?, apm_cliente= ? WHERE ci_cliente = ?";
            $datos = array($this->nom_cliente, $this->app_cliente, $this->apm_cliente, $this->ci_cliente);
            $data = $this->save($sql, $datos);
            if ($data == 1) {
                $res = "existe";
            } else {
                $res = "error";
            }
        }
        return $res;
    }
    public function buscarCliente(string $ci)
    {
        $verificar = "SELECT * FROM cliente WHERE ci_cliente = '$ci'";
        $existe = $this->select($verificar);

        if (empty($existe)) {
            $data = "no existe";
        } else {
            $sql = "SELECT * FROM cliente WHERE ci_cliente = '$ci'";
            $data = $this->select($sql);
        }
        return $data;
    }
}

?>