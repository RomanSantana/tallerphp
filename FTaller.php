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
						Tabla de Taller
					</div>
					<div class="card-body">
						<span class="btn btn-primary" data-toggle="modal" data-target="#agregarnuevosdatosmodal" style="cursor:pointer;">
							Agregar nuevo <span class="fa fa-plus-circle"></span>
						</span>
						<span type="button" class="btn btn-success" id="regresar" style="cursor:pointer;">
							regresar <span class="fa fas fa-home"></span> 
						</span>
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
					<h5 class="modal-title" id="exampleModalLabel">Agrega nuevo taller</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<div class="modal-body">
					<form id="frmnuevo">
						<label>Descripcion</label>
						<input type="text" class="form-control input-sm" id="Descripcion" name="Descripcion" maxlength="150">
						<label>Direccion</label>
						<input type="text" class="form-control input-sm" id="Direccion" name="Direccion" maxlength="150">
						<label>Telefono</label>
						<input type="text" class="form-control input-sm" id="Telefono" name="Telefono" maxlength="20">
						<input type="text" id="confirmacion" name="FTaller" value="ConfTaller" hidden="true">
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
					<h5 class="modal-title" id="exampleModalLabel">Actualizar taller</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="frmnuevoU">
						<input type="text" hidden="" id="idtaller" name="idtaller">
						<label>Descripcion</label>
						<input type="text" class="form-control input-sm" id="DescripcionU" name="DescripcionU" maxlength="150">
						<label>Direccion</label>
						<input type="text" class="form-control input-sm" id="DireccionU" name="DireccionU" maxlength="150">
						<label>Telefono</label>
						<input type="text" class="form-control input-sm" id="TelefonoU" name="TelefonoU" maxlength="20">
						<input type="text" id="confirmacion" name="FTaller" value="ConfTaller" hidden="true">
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
						$('#tablaDatatable').load('tablataller.php');
						alertify.success("agregado con exito :D");						
					}
					if (r==5) {
						alertify.error("dato repetido");
						$('#frmnuevo')[0].reset();
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
					console.log(r);
					if(r==1){
						$('#tablaDatatable').load('tablataller.php');
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
		$('#tablaDatatable').load('tablataller.php');

	});
</script>

<script type="text/javascript">
	function agregaFrmActualizar(idtaller){
		$.ajax({
			type:"POST",
			data:"FTaller=" + idtaller,
			url:"procesos/obtenDatos.php",
			success:function(r){
			let	datos=jQuery.parseJSON(r);
			console.log(datos);
				$('#idtaller').val(datos['id_taller']);
				$('#DescripcionU').val(datos['Descripcion']);
				$('#DireccionU').val(datos['Direccion']);
				$('#TelefonoU').val(datos['Telefono']);
			}
		});
	}

	function eliminarDatos(idtaller){
		alertify.confirm('Eliminar un taller', '¿Seguro de eliminar este chofer?', function(){ 
		//	let datos={"FUsuario":idusuario};
		//	console.log(datos);
			$.ajax({
				type:"POST",
				data:"FTaller="+idtaller,
		//		asycn:false,
				url:"procesos/eliminar.php",

				success:function(r){
					console.log(r);
					if(r==1){
						$('#tablaDatatable').load('tablataller.php');
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
