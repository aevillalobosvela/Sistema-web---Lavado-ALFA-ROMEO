<?php
class Empleados extends Controller
{
    public function __construct()
    {
        session_start();
        parent::__construct();
    }
    public function index()
    {
        $this->views->getView($this, "index");
    }
    public function listar()
    {
        $data = $this->model->getEmpleados();
        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['acciones'] = '<div>
            <button class="btn btn-primary btn-sm" type="button" onclick="btnEditarEmp(' . $data[$i]['cod_emp'] . ');">
                <i class="fas fa-pencil"></i> 
            </button>
            <button class="btn btn-danger btn-sm" type="button" onclick="btnEliminarEmp(' . $data[$i]['cod_emp'] . ');">
                <i class="fas fa-trash"></i> 
            </button>
            <div/>';
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function validar()
    {
        if (empty($_POST['usuario']) || empty($_POST['clave'])) {
            print_r("NO");
        } else {
            $usuario = $_POST['usuario'];
            $clave = $_POST['clave'];
            $data = $this->model->getEmpleado($usuario, $clave);
            if ($data) {
                $_SESSION['cod_emp'] = $data['cod_emp'];
                $_SESSION['nom_emp'] = $data['nom_emp'];
                $_SESSION['app_emp'] = $data['app_emp'];
                $_SESSION['apm_emp'] = $data['apm_emp'];
                $_SESSION['fecnac_emp'] = $data['fecnac_emp'];
                $_SESSION['cargo'] = $data['cargo'];
                $msg = "ok";
            } else {
                $msg = "Usuario y/o password incorrectos :(";
            }
        }
        echo json_encode($msg);
        die();
    }

    public function registrar()
    {
        /* print_r($_POST); */

        $ci_emp = $_POST["ci_emp"];
        $nom_emp = $_POST['nom_emp'];
        $app_emp = $_POST['app_emp'];
        $apm_emp = $_POST['apm_emp'];
        $salario = $_POST['salario'];
        $fecnac_emp = $_POST['fecnac_emp'];
        $cargo = $_POST['cargo'];
        $login = $_POST['login'];
        $pass = $_POST['pass'];
        $cod_emp = $_POST['cod_emp'];
        if (empty($ci_emp) || empty($nom_emp) || empty($app_emp) || empty($apm_emp) || empty($cargo) || empty($salario) || empty($fecnac_emp) || empty($login) || empty($pass)) {
            $msg = "Todos los campos son obligatorios";
        } else {
            if ($cod_emp == "") {
                $data = $this->model->registrarEmpleado($ci_emp, $nom_emp, $app_emp, $apm_emp, $salario, $fecnac_emp, $cargo, $login, $pass);
                if ($data == "ok") {
                    $msg = "si";
                } else if ($data == "existe") {
                    $msg = "El usuario ya existe";
                } else {
                    $msg = "Error al registrar empleado";
                }
            } else{
                $data = $this->model->modificarEmpleado($ci_emp, $nom_emp, $app_emp, $apm_emp, $salario, $fecnac_emp, $cargo, $login, $pass, $cod_emp);
                if ($data == "modificado") {
                    $msg = "modificado";
                } else  {
                    $msg = "Error al modificar empleado";
                }
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function editar(int $cod_emp)
    {
        $data = $this->model->editarEmp($cod_emp);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function eliminar(int $cod_emp) 
    {
        $data = $this->model->eliminarEmp($cod_emp);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
}
?>