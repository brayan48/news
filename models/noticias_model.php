<?php
class model_noticias{
    private $db;
    private $noticias;
    private $infonoticia;

    public function __construct(){
        $this->db=Conectar::conexion();
        $this->noticias=array();
        $this->infonoticia=array();
    }
    public function insert_noticia(){
        if(!isset($_POST['rut']))
        {
            $consulta = -1;
        }
        else
        {
            $titulo = $_POST['titulo'];
            $ruta = $_POST['rut'];
            $texto = $_POST['texto'];
            $palabras = $_POST['palabras'];

            if($titulo!=""and$ruta!=""and$texto!=""and$palabras!="")
            {
                $trozos = explode(".", $ruta);
                $rutaold = $ruta;
                $extension = end($trozos);

                $consulta=$this->db->query("insert into noticias(not_titulo,not_imagen,not_texto,not_palabras) values('".$titulo."','','".$texto."','".$palabras."');");
                $clavenoticia=mysqli_insert_id($this->db);
                if($consulta > 0)
                {
                    $rutan = "public/dist/imagesnews/".$clavenoticia.".".$extension;
                    if(rename($rutaold,$rutan))
                    {
                        $consulta=$this->db->query("update noticias set not_imagen = '".$rutan."' where not_clave_int = '".$clavenoticia."';");
                    }

                    return 1;
                }
                else
                {
                    return 0;
                }
            }
            else
            {
                return -2;
            }
        }

        return $consulta;
    }
    public function editar_noticia(){
        if(!isset($_POST['rut']))
        {
            $consulta = -1;
        }
        else
        {
            $titulo = $_POST['titulo'];
            $ruta = $_POST['rut'];
            $texto = $_POST['texto'];
            $palabras = $_POST['palabras'];
            $id = $_POST['id'];

            if($titulo!=""and$texto!=""and$palabras!="")
            {
                $trozos = explode(".", $ruta);
                $rutaold = $ruta;
                $extension = end($trozos);

                if($ruta != '')
                {
                    unlink("public/dist/imagesnews/".$id.".".$extension);
                    $rutan = "public/dist/imagesnews/".$id.".".$extension;
                    if(rename($rutaold,$rutan))
                    {
                        $consulta=$this->db->query("update noticias set not_titulo = '".$titulo."',not_imagen = '".$rutan."',not_texto = '".$texto."',not_palabras = '".$palabras."' where not_clave_int = ".$id);
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
                        return 0;
                    }
                }
                else
                {
                    $consulta=$this->db->query("update noticias set not_titulo = '".$titulo."',not_texto = '".$texto."',not_palabras = '".$palabras."' where not_clave_int = ".$id);
                    if($consulta > 0)
                    {
                        return 1;
                    }
                    else
                    {
                        return 0;
                    }
                }
            }
            else
            {
                return -2;
            }
        }

        return $consulta;
    }
    public function eliminar_noticia(){
        $consulta=$this->db->query("delete from noticias where not_clave_int = '".$_POST['id']."';");
        if($consulta > 0)
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }
    public function info_noticia()
    {
        if(isset($_POST['id']))
        {
            $id = $_POST['id'];
            $result=$this->db->query("select not_titulo titulo,not_imagen imagen,not_texto texto,not_palabras palabras from noticias where not_clave_int = ".$id);

            while($rows=mysqli_fetch_object($result))
            {
                $this->infonoticia[]=$rows;
            }
            return json_encode($this->infonoticia);
        }
        else
        {
            return 0;
        }
    }
    public function shownews()
    {
        $result=$this->db->query("select * from noticias");

        while($rows=mysqli_fetch_assoc($result)){
            $this->noticias[]=$rows;
        }
        return $this->noticias;
    }
}
?>
