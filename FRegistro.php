<?php
session_start();
echo $_SESSION["Nivel"];
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
						Tabla de Registro
					</div>
					<div class="card-body" >
						<span class="btn btn-primary" data-toggle="modal" data-target="#agregarnuevosdatosmodal">
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
							regresar  <span class="fa fas fa-home"></span> 
						    </span>
						<?php	}
						  ?>
						  <?php
							if($_SESSION["Nivel"]==3){ ?>
							<span type="button" class="btn btn-success" id="regresar3" style="cursor:pointer;">
							regresar  <span class="fa fas fa-home"></span> 
						    </span>
						<?php	}
						  ?>

						<hr>
						<div id="tablaDatatable" >
							
						</div>
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
					<h5 class="modal-title" id="exampleModalLabel">Agrega nuevo registro</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<div class="modal-body">
					<form id="frmnuevo">

						<label>Numero de patrulla</label>
						<select class="form-control" id="Numeropratrulla" name="Numeropratrulla"> </select>
						<label>Nombre del chofer</label>
						<select  class="form-control" id="nombrechofer" name="nombrechofer">  </select>
						<label>Falla o motivo de ingrego</label>
						<input type="text" class="form-control input-sm" id="falla" name="falla" maxlength="255">
						<label>Escriba el kilometraje del vehiculo</label>
						<input type="text" class="form-control input-sm" id="kilometraje" name="kilometraje" maxlength="255"><br/>
						
						<div class="input-group date fj-date">
						 <label>seleccione la fecha de ingreso </label>	
 						 <input type="text" class="form-control"id="ingreso" name="ingreso"><span class="input-group-addon"  ><i class="glyphicon glyphicon-th"></i></span>
						</div>
						<div class="input-group date fj-date">
						 <label>seleccione la fecha de egreso </label>	
 						 <input type="text" class="form-control" id="egreso" name="egreso"><span class="input-group-addon" ><i class="glyphicon glyphicon-th"></i></span>
						</div>
						<label>seleccione taller</label>
						<select  class="form-control" id="taller" name="taller">  </select>
						<label>seleccione mecanico que recibe</label>
						<select  class="form-control" id="mecanico" name="mecanico">  </select>

						<input type="text" id="confirmacion" name="FRegistro" value="ConfRegistro" hidden="true">
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
					<h5 class="modal-title" id="exampleModalLabel">Actualizar registro</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="frmnuevoU">
						<input type="text" hidden="" id="idregistro" name="idregistro">
						<label>Numero de patrulla</label>
						<select class="form-control" id="NumeropratrullaU" name="NumeropratrullaU"> </select>
						<label>Nombre del chofer</label>
						<select  class="form-control" id="nombrechoferU" name="nombrechoferU">  </select>
						<label>Falla o motivo de ingrego</label>
						<input type="text" class="form-control input-sm" id="fallaU" name="fallaU" >
						<label>Escriba el kilometraje del vehiculo</label>
						<input type="text" class="form-control input-sm" id="kilometrajeU" name="kilometrajeU" ><br/>
						
						<div class="input-group date fj-date">
						 <label>seleccione la fecha de ingreso </label>	
 						 <input type="text" class="form-control fj-date" id="ingresoU" name="ingresoU"><span class="input-group-addon" ><i class="glyphicon glyphicon-th"></i></span>
						</div>
						<div class="input-group date fj-date">
						 <label>seleccione la fecha de egreso </label>	
 						 <input type="text" class="form-control fj-date" id="egresoU" name="egresoU"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
						</div>
						<label>seleccione taller</label>
						<select  class="form-control" id="tallerU" name="tallerU">  </select>
						<label>seleccione mecanico que recibe</label>
						<select  class="form-control" id="mecanicoU" name="mecanicoU">  </select>

					
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
		$('#regresar3').click(function(){
	 	$(location).attr('href','mainlow.php'); 	
	 });
				$.ajax({
			    type: 'POST',
			    url: 'procesos/cargarnumeropatrulla.php'
			  })
			  .done(function(num){
			  //	console.log(marcas);
			    $('#Numeropratrulla').html(num)
			  })
			  $.ajax({
			    type: 'POST',
			    url: 'procesos/cargarnombrechofer.php'
			  })
			  .done(function(chof){
			  //	console.log(marcas);
			    $('#nombrechofer').html(chof)
			  })
			  $.ajax({
			    type: 'POST',
			    url: 'procesos/cargarnombretaller.php'
			  })
			  .done(function(tall){
			  //	console.log(marcas);
			    $('#taller').html(tall)
			  })
			  $.ajax({
			    type: 'POST',
			    url: 'procesos/cargarnombremecanico.php'
			  })
			  .done(function(meca){
			  //	console.log(marcas);
			    $('#mecanico').html(meca)
			  })
		$('.fj-date').datepicker({
   				 format: "yyyy-mm-dd"
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
						//$('#frmnuevo')[0].reset();
						$('#tablaDatatable').load('tablaregistro.php');
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
				async: false,
				url:"procesos/actualizar.php",		
				success:function(r){
					console.log(r);
					if(r==1){
						$('#tablaDatatable').load('tablaregistro.php');
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
		$('#tablaDatatable').load('tablaregistro.php');

	});
</script>

<script type="text/javascript">
	function agregaFrmActualizar(idregistro){
		
			$.ajax({
			    type: 'POST',
			    async: false,
			    url: 'procesos/cargarnumeropatrulla.php'
			  })
			  .done(function(num){
			  //	console.log(marcas);
			    $('#NumeropratrullaU').html(num)
			  })
			  $.ajax({
			    type: 'POST',
			    async: false,
			    url: 'procesos/cargarnombrechofer.php'
			  })
			  .done(function(chof){
			  //	console.log(marcas);
			    $('#nombrechoferU').html(chof)
			  })
			  $.ajax({
			    type: 'POST',
			    async: false,
			    url: 'procesos/cargarnombretaller.php'
			  })
			  .done(function(tall){
			  //	console.log(marcas);
			    $('#tallerU').html(tall)
			  })
			  $.ajax({
			    type: 'POST',
			    async: false,
			    url: 'procesos/cargarnombremecanico.php'
			  })
			  .done(function(meca){
			  //	console.log(marcas);
			    $('#mecanicoU').html(meca)
			  })
		$('.fj-date').datepicker({
   				 format: "yyyy-mm-dd"
			})

		$.ajax({
			type:"POST",
			data:"FRegistro=" + idregistro,
			async: false,
			url:"procesos/obtenDatos.php",
			success:function(r){
			let	datos=jQuery.parseJSON(r);
			console.log(r);
					$('#idregistro').val(datos['id_registro']);
					$('#NumeropratrullaU').val(datos['id_vehiculos']);
					$('#nombrechoferU').val(datos['id_chofer']);
					$('#fallaU').val(datos['Falla']);
					$('#kilometrajeU').val(datos['Kilometraje']);
					$('#ingresoU').val(datos['FechaEntrada']);
					$('#egresoU').val(datos['FechaSalida']);
					$('#tallerU').val(datos['id_taller']);
					$('#mecanicoU').val(datos['id_mecanico']);
			}
		});
	}

	function eliminarDatos(idregistro){
		alertify.confirm('Eliminar un registro', '¿Seguro de eliminar este registro?', function(){ 
		//	let datos={"FUsuario":idusuario};
		//	console.log(datos);
			$.ajax({
				type:"POST",
				data:"FRegistro="+idregistro,
		//		asycn:false,
				url:"procesos/eliminar.php",

				success:function(r){
					console.log(r);
					if(r==1){
						$('#tablaDatatable').load('tablaregistro.php');
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
