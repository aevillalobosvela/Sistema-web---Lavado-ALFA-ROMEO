<?php
class EstadisticasModel extends Query
{
    private $datos, $ci_emp, $nom_emp, $app_emp, $apm_emp, $cargo, $salario, $fecnac_emp, $login, $pass;
    public function __construct()
    {
        parent::__construct();
    }
    public function getDatos(string $table)
    {
        $sql = "SELECT COUNT(*) AS total FROM $table";
        $data = $this->select($sql);
        return $data;
    }

    public function lavadosMas()
    {
        $sql = "SELECT tipo_lavado, COUNT(tipo_lavado) AS cantidad
                FROM lavado GROUP BY tipo_lavado";
        $data = $this->selectAll($sql);
        return $data;
    }

    public function mantenimientosMas()
    {
        $sql = "SELECT cant_servicios, COUNT(cant_servicios) AS cantidad
                FROM mantenimiento GROUP BY cant_servicios";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function dineroMas()
    {
        $sql = "SELECT 'Lavados' AS servicio,SUM(costo_lavado) AS total FROM lavado
                UNION ALL
                SELECT 'Mantenimientos' AS servicio,SUM(costo_mant) AS total FROM mantenimiento";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function clientesMas()
    {
        $sql = "SELECT CONCAT(c.nom_cliente, ' ', c.app_cliente) AS nombre_completo, COUNT(*) AS cantidad
                FROM cliente c
                JOIN vehiculo v ON c.ci_cliente = v.ci_cliente
                LEFT JOIN lavado l ON v.cod_v = l.cod_v
                LEFT JOIN mantenimiento m ON v.cod_v = m.cod_v
                GROUP BY nombre_completo
                ORDER BY cantidad DESC
                LIMIT 5;";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function getEmpleados()
    {
        $sql = "SELECT * FROM empleado";
        $data = $this->selectAll($sql);
        return $data;
    }
}
?>