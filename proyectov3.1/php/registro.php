<?php

	include_once ('../db/utilidades_sql.php');

	if ($_POST){
		//Isset: Recupera lo que trae el metodo 
		$nombre=isset($_POST['nombre'])? $_POST['nombre']:'' ;
		$apellido=isset($_POST['apellido'])? $_POST['apellido']:'' ;
		$email=isset($_POST['email'])? $_POST['email']:'' ;
		$contrasena=isset($_POST['contrasena'])? $_POST['contrasena']:'' ;
		$fec_nac=isset($_POST['fec_nac'])? $_POST['fec_nac']:'' ;
		$direccion=isset($_POST['direccion'])? $_POST['direccion']:'' ;
		$telefono=isset($_POST['telefono'])? $_POST['telefono']:'' ;
		$rol=isset($_POST['rol'])? $_POST['rol']:'' ;
		$contrasena=password_hash($contrasena,PASSWORD_DEFAULT); 

		$result=set_registro($nombre,$apellido,$email,$contrasena,$fec_nac,$direccion,$telefono,$rol); //set_registro metodo
	
					ob_start(); //Inicia ciclo
						header ("refresh:2;url=../formulariocategoria.php");
						if ($result){
							echo "<h5>Los datos se almacenaron correctamente</h5>";
						}else {
							echo "<h5>No se pudo almacenar los datos</h5>";
						}
				    ob_end_flush();
				    die();
}
	


?>