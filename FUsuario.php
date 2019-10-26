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
						Tabla de Usuario
					</div>

					<div class="card-body">
						<span class="btn btn-primary" data-toggle="modal" data-target="#agregarnuevosdatosmodal"  style="cursor:pointer;">
							Agregar nuevo <span class="fa fa-plus-circle"></span>
						</span>
						<span class="btn btn-danger" data-toggle="modal" data-target="#cambiarcontraseña"  style="cursor:pointer;">
							cambiar contraseña <span class="fa fa-pencil-square-o"></span>
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
					<h5 class="modal-title" id="exampleModalLabel">Agrega nuevo usuario</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<div class="modal-body">
					<form id="frmnuevo">
						<label>Numero de Empleado</label>
						<input type="text" class="form-control input-sm" id="NumUsuario" name="NumUsuario" maxlength="5" onkeypress="return check(event)">
						<label>Contraseña</label>
						<input type="password" class="form-control input-sm" id="ContUsuario" name="ContUsuario">
						<label>Nombre</label>
						<input type="text" class="form-control input-sm" id="NomUsuario" name="NomUsuario" onkeypress="return checknom(event)">
						<label for="sel1">Selecciona el nivel de usuario</label>
						<select class="form-control" id="NivUsuario" name="NivUsuario">
							    <option>1</option>
							    <option>2</option>
							    <option>3</option>
						  </select>
						<input type="text" id="confirmacion" name="FUsuario" value="ConfUsuario" hidden="true">
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
	<div class="modal fade" id="cambiarcontraseña" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">cambiar contraseña</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<div class="modal-body">
					<form id="formnewpass">
						<label>Numero de Empleado</label>
						<input type="number" class="form-control input-sm" id="NumUsuario" name="NumUsuario" maxlength="5" >
						<label>Contraseña nueva</label>
						<input type="password" class="form-control input-sm" id="ContNue" name="ContNue">
						<label>Confirmar contraseña</label>
						<input type="password" class="form-control input-sm" id="ContConf" name="ContConf">
						<input type="text" id="confirmacion" name="FUsuario" value="ConfCont" hidden="true">
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" id="cambiarpass" class="btn btn-warning">cambiar</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Actualizar usuario</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="frmnuevoU">
						<input type="text" hidden="" id="idusuario" name="idusuario">
						<label>Numero de Empleado</label>
						<input type="text" class="form-control input-sm" id="NumUsuarioU" name="NumUsuarioU" maxlength="5">
					<!--	<label>Contraseña</label>
						<input type="password" class="form-control input-sm" id="ContUsuarioU" name="ContUsuarioU" disabled>  -->
						<label>Nombre</label>
						<input type="text" class="form-control input-sm" id="NomUsuarioU" name="NomUsuarioU">
						<label for="sel1">Selecciona el nivel de usuario</label>
						<select class="form-control" id="NivUsuarioU" name="NivUsuarioU">
							    <option>1</option>
							    <option>2</option>
							    <option>3</option>
						  </select>
						<input type="text" id="confirmacion" name="FUsuario" value="ConfUsuario" hidden="true">
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
	function checknom(e) {
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla == 8) {
        return true;
    }

    // Patron de entrada, en este caso solo acepta numeros y letras
    patron = /[A-Z a-z]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}
function check(e) {
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla == 8) {
        return true;
    }

    // Patron de entrada, en este caso solo acepta numeros y letras
    patron = /[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}
	$('#cambiarpass').click(function(){
			datos=$('#formnewpass').serialize();	
					console.log(datos);					
			$.ajax({
				type:"POST",
				data:datos,
				url:"procesos/password.php",
				success:function(r){
					console.log(r);
					if (r==1) {
						$('#formnewpass')[0].reset();
						$('#tablaDatatable').load('tablausuario.php');
						alertify.success("agregado con exito :D");						
					}
					if (r==5) {
						alertify.error("dato repetido");
					}
				}
			});
		});

	 
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
						$('#tablaDatatable').load('tablausuario.php');
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
					console.log(r);
					if(r==1){
						$('#tablaDatatable').load('tablausuario.php');
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
		$('#tablaDatatable').load('tablausuario.php');
	});
</script>

<script type="text/javascript">
	function agregaFrmActualizar(idusuario){
		$.ajax({
			type:"POST",
			data:"FUsuario=" + idusuario,
			url:"procesos/obtenDatos.php",
			success:function(r){
			let	datos=jQuery.parseJSON(r);
			console.log(datos);
				$('#idusuario').val(datos['id_usuario']);
				$('#NumUsuarioU').val(datos['Num_Empleado']);
			//	$('#ContUsuarioU').val(datos['contrasena']);
				$('#NomUsuarioU').val(datos['Nombre']);
				$('#NivUsuarioU').val(datos['Nivel']);
			}
		});
	}

	function eliminarDatos(idusuario){
		alertify.confirm('Eliminar un usuario', '¿Seguro de eliminar este usuario?', function(){ 
		//	let datos={"FUsuario":idusuario};
		//	console.log(datos);
			$.ajax({
				type:"POST",
				data:"FUsuario="+idusuario,
		//		asycn:false,
				url:"procesos/eliminar.php",

				success:function(r){
					console.log(r);
					if(r==1){
						$('#tablaDatatable').load('tablausuario.php');
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
