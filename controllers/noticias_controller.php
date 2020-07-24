<?php
//Llamada al modelo
require_once("models/noticias_model.php");
$modelNoticias=new model_noticias();

if(isset($_POST['operation']))
{
    if($_POST['operation'] == "newNews")
    {
        $result = $modelNoticias->insert_noticia();
        echo $result;
    }
    else
    if($_POST['operation'] == "eliminarnoticia")
    {
        $result = $modelNoticias->eliminar_noticia();
        echo $result;
    }
    else
    if($_POST['operation'] == "infoNoticia")
    {
        $result = $modelNoticias->info_noticia();
        echo $result;
    }
    else
    if($_POST['operation'] == "editNews")
    {
        $result = $modelNoticias->editar_noticia();
        echo $result;
    }
}

