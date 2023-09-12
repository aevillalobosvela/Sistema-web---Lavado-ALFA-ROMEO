<?php
class ProductosModel extends Query
{
    private $datos, $cod_producto, $stock;
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
    public function editarProd(int $cod_producto)
    {
        $sql = "SELECT * FROM producto WHERE cod_producto = $cod_producto";
        $data = $this->select($sql);
        return $data;
    }
    public function modificarStock(string $stock, int $cod_producto)
    {
        $this->stock = $stock;
        $this->cod_producto = $cod_producto;

        $sql = "UPDATE producto SET stock = ? WHERE cod_producto = ?";
        $datos = array($this->stock, $this->cod_producto);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "modificado";
        } else {
            $res = "error";
        }
        return $res;
    }

    /*     public function editarVeh(int $cod_v)
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
        } */
}

?>