<?php
error_reporting(0);
$carpeta = 'public/dist/tmp';
//CREACION DE CARPETA PARA LAS IMAGENES DE LAS NOTICIAS
$insimpro = 0;
if(!file_exists($carpeta)){
    if(mkdir($carpeta, 0777, true)){ $insimpro = 1; } else { $insimpro = 0; } }
else{ $insimpro = 1;}

$carpeta="public/dist/tmp/";
$ruta = $_GET['ruta'];
$input = $_GET['input'];

$name=$carpeta.basename($_FILES[$input]['name']);
move_uploaded_file($_FILES[$input]['tmp_name'], $name);
?>
<script type="text/javascript">
//parent.document.getElementById("picture").src ='<?php echo $name; ?>';

parent.document.getElementById('<?php echo $ruta;?>').innerHTML ='<?php echo $name; ?>';
</Script>
