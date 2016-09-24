
<?php
//Establecer la recuperación en las constantes para la conexión al motor de la base de datos y accesos a la base de datos que se necesite, La función REQUIRE recupera la información del archivo que esta establecido en los parámetros


require ('credenciales_db.php');
//Establecemos la conexión utilizando la clase mysqli, estableciendo los datos recuperados anteriormente


$mysqli =new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);
//Si la conexión presenta un error lo recomendable es matar el proceso saliendo del archivo 
mysqli_set_charset($mysqli,"utf8");
if ($mysqli-> connect_errno) {
echo "No se pudo establecer la conexión";
exit;
	}

else {

		}

function set_registro ($nombre,$apellido,$email,$contrasena,$fec_nac,$direccion,$telefono,$rol) {
	global $mysqli;
	$datosuser=get_user_byid($email);
	if (!$datosuser) {

		$sql="INSERT INTO cliente (nombre,apellido,email,fec_nac,direccion,telefono) VALUES ('{$nombre}','{$apellido}','{$email}','{$fec_nac}','{$direccion}','{$telefono}')";
		 $mysqli-> query ($sql);

			if ($mysqli) {
			$rol='almacen';
			set_user ($email,$contrasena,$rol);
			}
	}
}

function get_usuarios() {
	global $mysqli;
	$sql="SELECT * FROM cliente ORDER BY nombre";
	return $mysqli-> query ($sql);
}


function set_user ($email,$contrasena,$rol) {
	global $mysqli;

	$sql="INSERT INTO user (email,contrasena,rol) VALUES ('{$email}','{$contrasena}','{$rol}')";

	$mysqli-> query ($sql);
	
	}

function get_user_byid($email) {
	global $mysqli;
	$sql="SELECT email,contrasena,rol FROM user WHERE email='{$email}'";
	$result=$mysqli-> query ($sql);
	return $result-> fetch_assoc();
}

function set_registro_categoria ($nombre,$descripcion) {
	global $mysqli;

	$sql="INSERT INTO categoria (nombre,descripcion) VALUES ('{$nombre}','{$descripcion}')";
	return $mysqli-> query ($sql);

}



function get_categorias() {
	global $mysqli;
	$sql="SELECT * FROM categoria ORDER BY nombre";
	return $mysqli-> query ($sql);
}

function get_bodegas() {
	global $mysqli;
	$sql="SELECT * FROM bodega ORDER BY nombre";
	return $mysqli-> query ($sql);
}


function set_producto ($nombre,$descripcion,$img,$referencia,$peso,$unidad,$alto,$ancho,$valor,$existencia,$fechaentrada,$stock,$id_categoria,$id_bodega) {
	global $mysqli;

	$sql="INSERT INTO producto (nombre,descripcion,img,referencia,peso,unidad,alto,ancho,valor,existencia,fechaentrada,stock,id_categoria,id_bodega) VALUES ('{$nombre}','{$descripcion}','{$img}','{$referencia}','{$peso}','{$unidad}','{$alto}','{$ancho}','{$valor}','{$existencia}','{$fechaentrada}','{$stock}','{$id_categoria}','{$id_bodega}')";
	 $mysqli-> query ($sql);

}

function get_productos() {
	global $mysqli;
	$sql="SELECT * FROM producto ORDER BY id_producto";
	return $mysqli-> query ($sql);
}

function del_categoriabyid($id_categoria)
{
	global $mysqli;
	settype($id_categoria, integer);
	$sql="DELETE FROM categoria where id_categoria =".$id_categoria;
	return $mysqli-> query($sql);
}

	


?>