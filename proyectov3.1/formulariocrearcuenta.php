<?php
/* Para incluir librerías de base de datos y utilidades */
include_once ('php/utilidades.inc');
	if (isset ($_SESSION['email'])) {
		if ($_SESSION['rol'] == 'almacen'){
			header('location:index.php');
			die();
		}
	}

include_once('php/header.inc');
				
				
?>

<div class="container registro">

	<h2>Registro Usuarios</h2>
	<div class="row contenedor">

		<form action="php/registro.php" method="POST" class="form-horizontal">
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
					<label class="col-sm-3 control-label">Apellido:</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="apellido" placeholder="Apellido">
					</div>
				</div>
  			</div> 

  			<div class="col-sm-6">
				<div class="form-group">
					<label class="col-sm-3 control-label">Email:</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="email" placeholder="Email">
					</div>
				</div>
  			</div>

  			<div class="col-sm-6">
				<div class="form-group">
					<label class="col-sm-3 control-label">Contraseña:</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="contraseña" placeholder="Contraseña">
					</div>
				</div>
  			</div>

  			<div class="col-sm-6">
				<div class="form-group">
					<label class="col-sm-3 control-label">Fec. Nac.:</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="fec_nac" placeholder="Fecha Nacimiento">
					</div>
				</div>
  			</div>

  			<div class="col-sm-6">
				<div class="form-group">
					<label class="col-sm-3 control-label">Direccion:</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="direccion" placeholder="Direccion">
					</div>
				</div>
  			</div>

  			<div class="col-sm-6">
				<div class="form-group">
					<label class="col-sm-3 control-label">Telefono:</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="Telefono" placeholder="Telefono">
					</div>
				</div>
  			</div>


  			<?php if (isset ($_SESSION['rol']) == 'admin') { ?>


  				<div class="col-sm-6">
					<div class="form-group">
						<label class="col-sm-3 control-label">Rol:</label>
						<div class="col-sm-9">
							<select class="form-control" name="rol">
								<option value="almacen">Almacen</option>
								<option value="admin">Administrador</option>
							</select>
						</div>
					</div>
  				</div>
					
			<?php } ?>

			<div class="botones">
				<div class="form-group">
			     	<button type="submit" class="btn btn-default">Crear Usuario</button>	
				</div>
			</div>
		</form>
	</div>

	<table class="table table-striped">
			<tr>
				<th>#</th>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Email</th>
				<th>Fec. Nac.</th>
				<th>Direccion</th>
				<th>Telefono</th>
			</tr>

			<?php 

			include_once('db/utilidades_sql.php');
			
			$result = get_usuarios();

			while ($datousuarios = $result -> fetch_assoc()) { 
														
				echo "<tr>
						
						<td>".$datousuarios['id']."</td>	
						<td>".$datousuarios['nombre']."</td>
						<td>".$datousuarios['apellido']."</td>
						<td>".$datousuarios['email']."</td>	
						<td>".$datousuarios['fec_nac']."</td>
						<td>".$datousuarios['direccion']."</td>
						<td>".$datousuarios['telefono']."</td>	
					  </tr>";
								
			}?>

	</table>

</div>

						
	<?php 
	include_once('php/footer.inc');
	?>