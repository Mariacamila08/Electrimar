<?php 	

include_once ('php/utilidades.inc');
include_once('db/utilidades_sql.php');
include_once('php/header.inc');

?>


<div class="container registro">

	<h2>Nueva Categoria</h2>
	<div class="row contenedor">

		
			<div class="col-sm-6">
	  			<div class="form-group">
	    			<label class="col-sm-3 control-label">Nombre:</label>
	   				<div class="col-sm-9">
	      				<input type="text" class="form-control" id="nombre" placeholder="Nombre">
	    			</div>
	 			</div>
 			</div>

 			<div class="col-sm-6">
				<div class="form-group">
					<label class="col-sm-3 control-label">Descripcion:</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="descripcion" placeholder="Descripcion">
					</div>
				</div>
  			</div> 		

			<div class="botones">
				<div class="form-group">
			     	<button class="btncategoria"  id="btn_categoria">Crear Categoria</button>	
				</div>
			</div>
		
	</div>

	<div id="datoscategoria">
		
	</div>


</div>
		

<?php 
	include_once('php/footer.inc');
?>