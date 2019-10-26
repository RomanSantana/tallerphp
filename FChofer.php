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
						Tabla de Chofer
					</div>
					<div class="card-body">
						<span class="btn btn-primary" data-toggle="modal" data-target="#agregarnuevosdatosmodal" style="cursor:pointer;">
							Agregar nuevo <span class="fa fa-plus-circle"></span>
						</span>
						<?php
							if($_SESSION["Nivel"]==1){ ?>
							<span type="button" class="btn btn-success" id="regresar" style="cursor:pointer;">
							regresar <span class="fa fas fa-home"></span> 
						    </span>
						<?php	}
						  ?>
						  <?php
							if($_SESSION["Nivel"]==2){ ?>
							<span type="button" class="btn btn-success" id="regresar2" style="cursor:pointer;">
							regresar <span class="fa fas fa-home"></span> 
						    </span>
						<?php	}
						  ?>
						
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
						<label>Nombre</label>
						<input type="text" class="form-control input-sm" id="Nombre" name="Nombre" maxlength="150">
						<label>Telefono</label>
						<input type="text" class="form-control input-sm" id="Telefono" name="Telefono" maxlength="20">
						<label>Numero de radio</label>
						<input type="text" class="form-control input-sm" id="Radio" name="Radio" maxlength="20">
						<label>Licencia</label>
						<input type="text" class="form-control input-sm" id="Licencia" name="Licencia" maxlength="20">
						<input type="text" id="confirmacion" name="FChofer" value="ConfChofer" hidden="true">
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
					<h5 class="modal-title" id="exampleModalLabel">Actualizar chofer</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="frmnuevoU">
						<input type="text" hidden="" id="idchofer" name="idchofer">
						<label>Nombre</label>
						<input type="text" class="form-control input-sm" id="NombreU" name="NombreU" maxlength="150">
						<label>Telefono</label>
						<input type="text" class="form-control input-sm" id="TelefonoU" name="TelefonoU" maxlength="20">
						<label>Numero de radio</label>
						<input type="text" class="form-control input-sm" id="RadioU" name="RadioU" maxlength="20">
						<label>Licencia</label>
						<input type="text" class="form-control input-sm" id="LicenciaU" name="LicenciaU" maxlength="20">
						<input type="text" id="confirmacion" name="FChofer" value="ConfChofer" hidden="true">
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
		 $('#regresar2').click(function(){
	 	$(location).attr('href','mainmedium.php'); 	
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
						$('#tablaDatatable').load('tablachofer.php');
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
						$('#tablaDatatable').load('tablachofer.php');
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
		$('#tablaDatatable').load('tablachofer.php');

	});
</script>

<script type="text/javascript">
	function agregaFrmActualizar(idchofer){
		$.ajax({
			type:"POST",
			data:"FChofer=" + idchofer,
			url:"procesos/obtenDatos.php",
			success:function(r){
			let	datos=jQuery.parseJSON(r);
			console.log(datos);
				$('#idchofer').val(datos['id_chofer']);
				$('#NombreU').val(datos['Nombre']);
				$('#TelefonoU').val(datos['Telefono']);
				$('#RadioU').val(datos['Num_Radio']);
				$('#LicenciaU').val(datos['Num_Licencia']);
			}
		});
	}

	function eliminarDatos(idchofer){
		alertify.confirm('Eliminar un Chofer', '¿Seguro de eliminar este chofer?', function(){ 
		//	let datos={"FUsuario":idusuario};
		//	console.log(datos);
			$.ajax({
				type:"POST",
				data:"FChofer="+idchofer,
		//		asycn:false,
				url:"procesos/eliminar.php",

				success:function(r){
					console.log(r);
					if(r==1){
						$('#tablaDatatable').load('tablachofer.php');
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
