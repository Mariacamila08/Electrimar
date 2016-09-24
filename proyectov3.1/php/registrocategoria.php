<?php 
include_once ('../db/utilidades_sql.php');
include_once ('utilidades.inc');


if ($_POST){
	$nombre=isset($_POST['nombre'])? $_POST['nombre']:'' ;
	$descripcion=isset($_POST['descripcion'])? $_POST['descripcion']:'' ;
	$result=set_registro_categoria ($nombre,$descripcion);
		
					ob_start(); //Inicia ciclo
						
						if ($result){
							echo "<h5>Los datos se almacenaron correctamente</h5>";
						}else {
							echo "<h5>No se pudo almacenar los datos</h5>";
						}
				    ob_end_flush();
				    die();
}

			
?>
