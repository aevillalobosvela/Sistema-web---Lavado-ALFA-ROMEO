<?php
class EmpleadosModel extends Query
{
    private $cod_emp,$datos, $ci_emp, $nom_emp, $app_emp, $apm_emp, $cargo, $salario, $fecnac_emp, $login, $pass;
    public function __construct()
    {
        parent::__construct();
    }
    public function getEmpleado(string $usuario, string $clave)
    {
        $sql = "SELECT * FROM empleado WHERE login = '$usuario' AND pass = '$clave'";
        $data = $this->select($sql);
        return $data;
    }
    public function getEmpleados()
    {
        $sql = "SELECT * FROM empleado";
        $data = $this->selectAll($sql);
        return $data;
    }

    public function registrarEmpleado(string $ci_emp, string $nom_emp, string $app_emp, string $apm_emp, string $salario, string $fecnac_emp, string $cargo, string $login, string $pass)
    {
        $this->ci_emp = $ci_emp;
        $this->nom_emp = $nom_emp;
        $this->app_emp = $app_emp;
        $this->apm_emp = $apm_emp;
        $this->salario = $salario;
        $this->fecnac_emp = $fecnac_emp;
        $this->cargo = $cargo;
        $this->login = $login;
        $this->pass = $pass;
        $verificar = "SELECT * FROM empleado WHERE ci_emp = '$this->ci_emp'";
        $existe = $this->select($verificar);
        if (empty($existe)) {
            $sql = "INSERT INTO empleado(ci_emp, nom_emp, app_emp, apm_emp, salario, fecnac_emp, cargo, login, pass) 
            VALUES (?,?,?,?,?,?,?,?,?)";
            $datos = array($this->ci_emp, $this->nom_emp, $this->app_emp, $this->apm_emp, $this->salario, $this->fecnac_emp, $this->cargo, $this->login, $this->pass);
            $data = $this->save($sql, $datos);
            if ($data == 1) {
                $res = "ok";
            } else {
                $res = "error";
            }
        } else{
            $res = "existe";
        }
        return $res;
    }

    public function modificarEmpleado(string $ci_emp, string $nom_emp, string $app_emp, string $apm_emp, string $salario, string $fecnac_emp, string $cargo, string $login, string $pass, int $cod_emp)
    {
        $this->cod_emp = $cod_emp;
        $this->ci_emp = $ci_emp;
        $this->nom_emp = $nom_emp;
        $this->app_emp = $app_emp;
        $this->apm_emp = $apm_emp;
        $this->salario = $salario;
        $this->fecnac_emp = $fecnac_emp;
        $this->cargo = $cargo;
        $this->login = $login;
        $this->pass = $pass;

        $sql = "UPDATE empleado SET ci_emp = ?, nom_emp= ?, app_emp= ?, apm_emp= ?, salario= ?, fecnac_emp= ?, cargo= ?, login= ?, pass= ? WHERE cod_emp = ?";
        $datos = array($this->ci_emp, $this->nom_emp, $this->app_emp, $this->apm_emp, $this->salario, $this->fecnac_emp, $this->cargo, $this->login, $this->pass, $this->cod_emp);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "modificado";
        } else {
            $res = "error";
        }
        return $res;
    }

    public function editarEmp(int $cod_emp)
    {
        $sql = "SELECT * FROM empleado WHERE cod_emp = $cod_emp";
        $data = $this->select($sql);
        return $data;
    }

    public function eliminarEmp(int $cod_emp)
    {
        $sql = "DELETE FROM empleado WHERE cod_emp = $cod_emp";
        $data = $this->select($sql);
        return $data;
    }
}

?>