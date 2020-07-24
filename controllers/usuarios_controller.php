<?php
//Llamada al modelo
require_once("models/usuarios_model.php");
$modelUsuarios=new model_usuarios();

if(isset($_POST['operation']))
{
    if($_POST['operation'] == "newuser")
    {
        $result = $modelUsuarios->insert_usuario();
        echo $result;
    }
    else
    if($_POST['operation'] == "validateUser")
    {
        $result = $modelUsuarios->validar_usuario();
        echo $result;
    }
    else
    if($_POST['operation'] == "loginuser")
    {
        $result = $modelUsuarios->login_usuario();
        echo $result;
    }
}