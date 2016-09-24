$(document).ready(inicio);

function inicio(){
	get_categoria();
	$(".btncategoria").click(confirmarcategoria);
	$(".btnborrar").click(del_categoria);
	
		//$("#compras").load("estadocarrito.php");
}

function confirmarcategoria(){


	var parametros = {
                "nombre" : $("#nombre").val(),
                "descripcion" : $("#descripcion").val()
        };
        
    $.ajax({
                data:  parametros,
                url:   'php/registrocategoria.php',
                type:  'post',
                beforeSend: function () {
                        $("#datoscategoria").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                      get_categoria();
                      //  $("#datoscategoria").html(response);
                }
        });	
}
function get_categoria(){
	$("#datoscategoria").load("consultacategoria.php");

}

function del_categoria(){
	alert('hola');
	//$("#borrar").load("borrar.php?id_categoria="+$(this).val());	
}
