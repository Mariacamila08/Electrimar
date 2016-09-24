<?php 
include_once('db/utilidades_sql.php');
 ?>

<table class="table table-striped">
			<tr>
				<th>#</th>
				<th>Nombre</th>
				<th>Descripcion</th>
				<th>Eliminar</th>
			</tr>

			<?php 
			
			$result = get_categorias();
			

			while ($categoria = $result -> fetch_assoc()) { 
														
				echo "<tr>
						
						<td>".$categoria['id_categoria']."</td>	
						<td>".$categoria['nombre']."</td>
						<td>".$categoria['descripcion']."</td>"; ?>

				<?php	echo'	<td><button class="btnborrar" value="'.$categoria['id_categoria'].'">Borrar</button></td>
						</tr>';
								
			}?>


	</table>