<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php require_once "scripts.php";  ?>
	
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="card text-left">
					<div class="card-header">
						Tabla Marca
					</div>
					<div class="card-body">
						<span type="button" class="btn btn-primary" data-toggle="modal" data-target="#agregarnuevosdatosmodal" style="cursor:pointer;">
							Agregar nuevo <span class="fa fa-plus-circle"></span>
						</span>
						<span type="button" class="btn btn-success" id="regresar" style="cursor:pointer;">
							regresar <span class="fa fas fa-home"></span> 
						</span>
						<hr>
						
						<hr>
						<div id="tablaDatatable"></div>
					</div>
					<div class="card-footer text-muted">
						By Seminario De Titulacion
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="agregarnuevosdatosmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Agrega nuevas Marcas</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<div class="modal-body">
					<form id="frmnuevo">
						<label>Marca</label>
						<input type="text" class="form-control input-sm" id="nombre" name="nombre">
						<input type="text" id="confirmacion" name="FMarca" value="ConfMarca" hidden="true" >
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" id="btnAgregarnuevo" class="btn btn-primary">Agregar nuevo</button>
				</div>
			</div>
		</div>
	</div>


	<!-- Modal -->
	<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Actualizar marca</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="frmnuevoU">
						<input type="text" hidden="" id="idmarca" name="idmarca">
						<label>Nombre</label>
						<input type="text" class="form-control input-sm" id="nombreM" name="nombreM">
						<input type="text" id="confirmacion" name="FMarca" value="ConfMarca" hidden="true" >
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" class="btn btn-warning" id="btnActualizar">Actualizar</button>
				</div>
			</div>
		</div>
	</div>


</body>
</html>


<script type="text/javascript">
	$(document).ready(function(){
	 $('#regresar').click(function(){
	 	$(location).attr('href','mainadmin.php'); 	
	 });
		$('#btnAgregarnuevo').click(function(){
			datos=$('#frmnuevo').serialize();
	
					console.log(datos);
					
			$.ajax({
				type:"POST",
				data:datos,
				url:"procesos/agregar.php",
				success:function(r){
					console.log(r);
					if (r==1) {
						$('#frmnuevo')[0].reset();
						$('#tablaDatatable').load('tabla.php');
						alertify.success("agregado con exito :D");						
					}
					if (r==5) {
						alertify.error("dato repetido");
					}
				}
			});
		});

		$('#btnActualizar').click(function(){
			datos=$('#frmnuevoU').serialize();
			console.log(datos);
			$.ajax({
				type:"POST",
				data:datos,
				url:"procesos/actualizar.php",		
				success:function(r){
					if(r==1){
						$('#tablaDatatable').load('tabla.php');
						alertify.success("Actualizado con exito :D");
					}else{
						alertify.error("Fallo al actualizar :(");
					}
				}
			});
		});
	});
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaDatatable').load('tabla.php');
		        
	});
</script>

<script type="text/javascript">
	function agregaFrmActualizar(idmarca){
	//	let datos={"FMarca":idmarca, "Emarca":"ConfMarca"};
		$.ajax({
			type:"POST",
			data:"FMarca="+idmarca,
			url:"procesos/obtenDatos.php",
			success:function(r){
				console.log(r);
			let	datos=jQuery.parseJSON(r);
				$('#idmarca').val(datos['id_marca']);
				$('#nombreM').val(datos['Descripcion']);
			}
		});
	}

	function eliminarDatos(idmarca){
		alertify.confirm('Eliminar una marca', '¿Seguro de eliminar esta marca?', function(){ 
		//	let datos={"FMarca":idmarca, "Emarca":"ConfMarca"};
		//	var miJSON = JSON.encode(datos);
	//		console.log(datos);
			$.ajax({
				type:"POST",
				data:"FMarca="+idmarca,
			//	asycn:false,
				url:"procesos/eliminar.php",
				success:function(r){
					console.log(r);
					if(r==1){
						$('#tablaDatatable').load('tabla.php');
						alertify.success("Eliminado con exito !");
					}else{
						alertify.error("No se pudo eliminar...");
					}
				}
			});

		}
		, function(){

		});
	}


</script>
