<?php
class model_usuarios{
    private $db;
    private $usuarios;

    public function __construct(){
        $this->db=Conectar::conexion();
        $this->usuarios=array();
    }
    public function insert_usuario(){
        if(!isset($_POST['user']))
        {
            $consulta = -1;
        }
        else
        {
            $user = $_POST['user'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            if($user!=""and$email!=""and$password!="")
            {
                //Validamos si el usuario ya existe
                $consulta=$this->db->query("select * from usuarios where UPPER(usu_usuario) = UPPER('".$user."');");
                $cantUsers = mysqli_num_rows($consulta);

                if($cantUsers <= 0)
                {
                    $consulta=$this->db->query("insert into usuarios(usu_usuario,usu_clave,usu_correo) values('".$user."','".$password."','".$email."');");
                    if($consulta > 0)
                    {
                        return 1;
                    }
                    else
                    {
                        return 0;
                    }
                }
                else
                {
                    return -1;
                }
            }
            else
            {
                return -2;
            }
        }

        return $consulta;
    }
    public function update_usuario(){
        $consulta=$this->db->query("update personas set per_nombre = '".$_REQUEST['nombre']."' where per_clave_int = '".$_REQUEST['id']."';");
        return $consulta;
    }
    public function delete_usuario(){
        $consulta=$this->db->query("delete from personas where per_clave_int = '".$_REQUEST['id']."';");
        return $consulta;
    }
    public function validar_usuario(){
        if(!isset($_POST['user']))
        {
            return 0;
        }
        else
        {
            $user = $_POST['user'];

            //Validamos si el usuario ya existe
            $consulta=$this->db->query("select * from usuarios where UPPER(usu_usuario) = UPPER('".$user."');");
            $cantUsers = mysqli_num_rows($consulta);

            if($cantUsers <= 0)
            {
                return 0;
            }
            else
            {
                return 1;
            }
        }
    }
    public function login_usuario(){
        if(!isset($_POST['user'])||!isset($_POST['password']))
        {
            return 0;
        }
        else
        {
            $user = $_POST['user'];
            $password = $_POST['password'];

            session_start();

            // INSERTA EL CÓDIGO EXITOSO AQUI
            if (($password == NULL)or($user == NULL))
            {
                $status= "Usuario o Contraseña incorrecta";
                session_destroy();
            }
            else
            if($password != '' and $user != '')
            {
                $status= "Usuario o Contraseña incorrecta";
                $consulta=$this->db->query("select * from usuarios where UPPER(usu_usuario) = UPPER('".$user."')");
                $dato = mysqli_fetch_array($consulta);
                $usu = $dato['usu_usuario'];
                $pass = $dato['usu_clave'];

                if(strtoupper($usu) != strtoupper($user) || strtoupper($pass) != strtoupper($password))
                {
                    $status= "Usuario o Contraseña incorrecta";
                    session_destroy();
                }
                else
                {
                    $_SESSION['persona'] = $user;
                    $_SESSION['usuario'] = $user;
                    setcookie("usIdentificacion",$user);
                    setcookie("clave",$pass);
                    $identificador= session_id();
                    $fecha=date("Y/m/d H:i:s");
                    $status= "1";
                }
            }
            return $status;
        }
    }
}
?>
