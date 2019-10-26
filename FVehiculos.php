<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php require_once "scripts.php"; ?>
	
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="card text-left">
					<div class="card-header">
						Tabla de Vehiculos
					</div>
					<div class="card-body">
						<span class="btn btn-primary" data-toggle="modal" data-target="#agregarnuevosdatosmodal" style="cursor:pointer;">
							Agregar nuevo<span class="fa fa-plus-circle"></span>
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
							regresar<span class="fa fas fa-home"></span> 
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
					<h5 class="modal-title" id="exampleModalLabel">Agrega nuevo vehiculo</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<div class="modal-body">
					<form id="frmnuevo">
						<label>Placa</label>
						<input type="text" class="form-control input-sm" id="Placa" name="Placa" maxlength="20">
						<label>Numero de patrulla</label>
						<input type="text" class="form-control input-sm" id="Numero" name="Numero" maxlength="5">
						<label>Marca</label>
						<select id="mostrarmarca" name="marca" class="form-control">  </select>
						<label>Año</label>
						<input type="text" class="form-control input-sm" id="anio" name="anio" maxlength="4">
						<label>Descripcion</label>
						<input type="text" class="form-control input-sm" id="Descripcion" name="Descripcion" maxlength="255">
						<label>Estatus</label>
						<select class="form-control" id="Estatus" name="Estatus">
							    <option >Activo</option>
							    <option >Inactivo</option>
						</select>
						<input type="text" id="confirmacion" name="FVehiculo" value="ConfVehiculo" hidden="true">
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
					<h5 class="modal-title" id="exampleModalLabel">Actualizar mecanico</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="frmnuevoU">
						<input type="text" hidden="" id="idvehiculoU" name="idvehiculoU">
						<label>Placa</label>
						<input type="text" class="form-control input-sm" id="PlacaU" name="PlacaU" maxlength="20">
						<label>Numero de patrulla</label>
						<input type="text" class="form-control input-sm" id="NumeroU" name="NumeroU" maxlength="5">
						<label>Marca</label>
						<select id="marcaU" name="marcaU" class="form-control">  </select>
						<label>Año</label>
						<input type="text" class="form-control input-sm" id="anioU" name="anioU" maxlength="4">
						<label>Descripcion</label>
						<input type="text" class="form-control input-sm" id="DescripcionU" name="DescripcionU" maxlength="255">
						<label>Estatus</label>
						<select class="form-control" id="EstatusU" name="EstatusU">
							    <option>Activo</option>
							    <option>Inactivo</option>
						</select>
						<input type="text" id="confirmacion" name="FVehiculo" value="ConfVehiculo" hidden="true">
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
	 	
		$.ajax({
			    type: 'POST',
			    url: 'procesos/cargarmarca.php'
			  })
			  .done(function(marcas){
			  //	console.log(marcas);
			    $('#mostrarmarca').html(marcas)
			  })

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
						$('#tablaDatatable').load('tablavehiculos.php');
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
						$('#tablaDatatable').load('tablavehiculos.php');
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
		$('#tablaDatatable').load('tablavehiculos.php');

	});
</script>

<script type="text/javascript">
	function agregaFrmActualizar(idvehiculo){
		
		$.ajax({
				data:"FVehiculo=" + idvehiculo,
			    type: 'POST',
			    url: 'procesos/cargarmarcaA.php'
			  })
			  .done(function(marcas){
			  	console.log(marcas);
			    $('#marcaU').html(marcas);
			   		$.ajax({ //inicia ajax
			type:"POST",
			data:"FVehiculo=" + idvehiculo,
			url:"procesos/obtenDatos.php",
			success:function(r){
			let	datos=jQuery.parseJSON(r);
			console.log(datos);
				$('#idvehiculoU').val(datos['id_vehiculos']);
				$('#PlacaU').val(datos['Placa']);
				$('#NumeroU').val(datos['Numero']);
				$('#marcaU').val(datos['id_marca']);
				$('#anioU').val(datos['Anio']);
				$('#DescripcionU').val(datos['Descripcion']);
				$('#EstatusU').val(datos['Estatus']);
			}
		}); //finaliza ajax
			  })

/*		$.ajax({
			type:"POST",
			data:"FVehiculo=" + idvehiculo,
			url:"procesos/obtenDatos.php",
			success:function(r){
			let	datos=jQuery.parseJSON(r);
			console.log(datos);
				$('#idvehiculoU').val(datos['id_vehiculos']);
				$('#PlacaU').val(datos['Placa']);
				$('#NumeroU').val(datos['Numero']);
				$('#marcaU').val(datos['id_marca']);
				$('#anioU').val(datos['Anio']);
				$('#DescripcionU').val(datos['Descripcion']);
				$('#EstatusU').val(datos['Estatus']);
			}
		});*/
	}

	function eliminarDatos(idvehiculo){
		alertify.confirm('Eliminar un mecanico', '¿Seguro de eliminar este mecanico?', function(){ 
		//	let datos={"FUsuario":idusuario};
		//	console.log(datos);
			$.ajax({
				type:"POST",
				data:"FVehiculo="+idvehiculo,
		//		asycn:false,
				url:"procesos/eliminar.php",

				success:function(r){
					console.log(r);
					if(r==1){
						$('#tablaDatatable').load('tablavehiculos.php');
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
