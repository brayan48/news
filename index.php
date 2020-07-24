<?php
require_once("db/db.php");

if(isset($_GET['operation']))
{
    if($_GET['operation'] == "logout")
    {
        session_start();
        // Borramos toda la sesion
        session_destroy();
        require_once("views/login.php");
    }
}
else
if(isset($_POST['operation']))
{
    //Crud y funciones de usuarios
    if($_POST['operation'] == "newuser" || $_POST['operation'] == "validateUser" || $_POST['operation'] == "loginuser")
    {
        require_once("controllers/usuarios_controller.php");
    }
    else//Crud noticias
    if($_POST['operation'] == "newNews" || $_POST['operation'] == "eliminarnoticia" || $_POST['operation'] == "infoNoticia" || $_POST['operation'] == "editNews"){
        require_once("controllers/noticias_controller.php");
    }
}
else
{
    session_start();
    if(isset($_SESSION["persona"]))
    {
        require_once("views/dashboard.php");
    }
    else
    {
        require_once("controllers/noticias_controller.php");
        require_once("views/login.php");
    }
}
