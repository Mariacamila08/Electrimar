<?php
/* Para incluir librerías de base de datos y utilidades */
include_once ('db/utilidades_sql.php');
include_once ('php/utilidades.inc');
	if (isset ($_SESSION['email'])) {
		if ($_SESSION['rol'] == 'cliente'){
			header('location:index.php');
			die();
		}
	}



	$result = get_categorias();
	$estado='false';
	$error = 'false';
	$msg='';
	$msg_error='';

		if ($_FILES) {
		$directorioimg='img/producto/';
		$ruta=$directorioimg.basename($_FILES['img']['name']);
		$move=move_uploaded_file($_FILES['img']['tmp_name'],$ruta);

		

		if ($_POST) {	
		$nombre=isset($_POST['nombre'])? $_POST['nombre']:'' ;
		$descripcion=isset($_POST['descripcion'])? $_POST['descripcion']:'' ;
		$img=$ruta;
		$referencia=isset($_POST['referencia'])? $_POST['referencia']:'' ;
		$peso=isset($_POST['peso'])? $_POST['peso']:'' ;
		$unidad=isset($_POST['unidad'])? $_POST['unidad']:'' ;
		$alto=isset($_POST['alto'])? $_POST['alto']:'' ;
		$ancho=isset($_POST['ancho'])? $_POST['ancho']:'' ;
		$valor=isset($_POST['valor'])? $_POST['valor']:'' ;
		$existencia=isset($_POST['existencia'])? $_POST['existencia']:'' ;
		$fechaentrada=isset($_POST['fechaentrada'])? $_POST['fechaentrada']:'' ;
		$stock=isset($_POST['stock'])? $_POST['stock']:'' ;
		$id_categoria=isset($_POST['categoria'])? $_POST['categoria']:'' ;
		$id_bodega=isset($_POST['bodega'])? $_POST['bodega']:'' ;
		

			$registro=set_producto($nombre,$descripcion,$img,$referencia,$peso,$unidad,$alto,$ancho,$valor,$existencia,$fechaentrada,$stock,$id_categoria,$id_bodega);
	}

		}

include_once ('php/header.inc');

?>


<div class="container registro">

	<h2>Registro Productos</h2>
	<div class="row contenedor">

		<form enctype="multipart/form-data" method="POST" class="form-horizontal">
			<div class="col-sm-6">
	  			<div class="form-group">
	    			<label class="col-sm-3 control-label">Nombre:</label>
	   				<div class="col-sm-9">
	      				<input type="text" class="form-control" name="nombre" placeholder="Nombre">
	    			</div>
	 			</div>
 			</div>

 			<div class="col-sm-6">
	  			<div class="form-group">
	    			<label class="col-sm-3 control-label">Descripcion:</label>
	   				<div class="col-sm-9">
	      				<input type="text" class="form-control" name="descripcion" placeholder="Descripcion">
	    			</div>
	 			</div>
 			</div>

 			<div class="col-sm-6">
	  			<div class="form-group">
	    			<label class="col-sm-3 control-label">Imagen:</label>
	   				<div class="col-sm-9">
	      				<input type="file" accept="image/*" name="img" >
	    			</div>
	 			</div>
 			</div>

 			<div class="col-sm-6">
	  			<div class="form-group">
	    			<label class="col-sm-3 control-label">Referencia:</label>
	   				<div class="col-sm-9">
	      				<input type="text" class="form-control" name="referencia" placeholder="Referencia">
	    			</div>
	 			</div>
 			</div>

 			<div class="col-sm-6">
	  			<div class="form-group">
	    			<label class="col-sm-3 control-label">Peso:</label>
	   				<div class="col-sm-9">
	      				<input type="text" class="form-control" name="peso" placeholder="Peso">
	    			</div>
	 			</div>
 			</div>

 			<div class="col-sm-6">
	  			<div class="form-group">
	    			<label class="col-sm-3 control-label">Unidad:</label>
	   				<div class="col-sm-9">
	      				<input type="text" class="form-control" name="unidad" placeholder="Unidad">
	    			</div>
	 			</div>
 			</div>

 			<div class="col-sm-6">
	  			<div class="form-group">
	    			<label class="col-sm-3 control-label">Alto:</label>
	   				<div class="col-sm-9">
	      				<input type="text" class="form-control" name="alto" placeholder="Alto">
	    			</div>
	 			</div>
 			</div>

			<div class="col-sm-6">
	  			<div class="form-group">
	    			<label class="col-sm-3 control-label">Ancho:</label>
	   				<div class="col-sm-9">
	      				<input type="text" class="form-control" name="ancho" placeholder="Ancho">
	    			</div>
	 			</div>
 			</div>

 			<div class="col-sm-6">
	  			<div class="form-group">
	    			<label class="col-sm-3 control-label">Valor:</label>
	   				<div class="col-sm-9">
	      				<input type="text" class="form-control" name="valor" placeholder="Valor">
	    			</div>
	 			</div>
 			</div>

 			<div class="col-sm-6">
	  			<div class="form-group">
	    			<label class="col-sm-3 control-label">Existencia:</label>
	   				<div class="col-sm-9">
	      				<input type="text" class="form-control" name="existencia" placeholder="Existencia">
	    			</div>
	 			</div>
 			</div>

 			<div class="col-sm-6">
	  			<div class="form-group">
	    			<label class="col-sm-3 control-label">Fecha Entrada:</label>
	   				<div class="col-sm-9">
	      				<input type="text" value="<?php echo date('d/m/y') ?>" name="fechaentrada" class="form-control">
	    			</div>
	 			</div>
 			</div>

 			<div class="col-sm-6">
	  			<div class="form-group">
	    			<label class="col-sm-3 control-label">Stock Minimo:</label>
	   				<div class="col-sm-9">
	      				<input type="text" class="form-control" name="stock" placeholder="Stock Minimo">
	    			</div>
	 			</div>
 			</div>

 			<div class="col-sm-6">
	  			<div class="form-group">
	    			<label class="col-sm-3 control-label">Categoria:</label>
	   				<div class="col-sm-9">
	      				<select class="form-control" name="categoria">
							<?php while ($datoscategoria=$result->fetch_assoc()) { ?>
								<option value="<?php echo $datoscategoria['id_categoria'] ?>"><?php echo $datoscategoria['nombre'] ?>
								</option>
							<?php } ?>
						</select>
	    			</div>
	 			</div>
 			</div>

 			<div class="col-sm-6">
	  			<div class="form-group">
	    			<label class="col-sm-3 control-label">Bodega:</label>
	   				<div class="col-sm-9">
	      				<select class="form-control" name="categoria">
							<?php 

							$resultbodega = get_bodegas();

							while ($datosbodega=$resultbodega->fetch_assoc()) { ?>
								<option value="<?php echo $datosbodega['id_bodega'] ?>"><?php echo $datosbodega['nombre'] ?>
								</option>
							<?php } ?>
						</select>
	    			</div>
	 			</div>
 			</div>


			<div class="botones">
				<div class="form-group">
			     	<button type="submit" class="btn btn-default">Crear Producto</button>	
				</div>
			</div>
		</form>
	</div>

	<table class="table table-striped">
			<tr>
				<th>#</th>
				<th>Nombre</th>
				<th>Descripcion</th>
				<th>Ref.</th>
				<th>Peso</th>
				<th>Unidad</th>
				<th>Alto</th>
				<th>Ancho</th>
				<th>Valor</th>
				<th>Existencia</th>
				<th>Stock</th>
				<th>Categoria</th>
				<th>Bodega</th>

			</tr>

			<?php 

			
			
			$result = get_productos();

			while ($datousuarios = $result -> fetch_assoc()) { 
														
				echo "<tr>
						
						<td>".$datousuarios['id_producto']."</td>	
						<td>".$datousuarios['nombre']."</td>
						<td>".$datousuarios['descripcion']."</td>
						<td>".$datousuarios['referencia']."</td>	
						<td>".$datousuarios['peso']."</td>
						<td>".$datousuarios['unidad']."</td>
						<td>".$datousuarios['alto']."</td>	
						<td>".$datousuarios['ancho']."</td>	
						<td>$".number_format($datousuarios['valor'],2)."</td>	
						<td>".$datousuarios['existencia']."</td>	
						<td>".$datousuarios['stock']."</td>	
						<td>".$datousuarios['id_categoria']."</td>
						<td>".$datousuarios['id_bodega']."</td>
					  </tr>";
							
			}?>

	</table>

</div>
	

<?php 
include_once('php/footer.inc')
?>