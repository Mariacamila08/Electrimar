<?php 


include_once('../db/utilidades_sql.php');
include_once('utilidades.inc');
$id_categoria = $_GET['id_categoria'];
$result= del_categoriabyid($id_categoria);

 ?>