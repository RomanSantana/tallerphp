
<?php
session_start();
if(!isset($_SESSION["Nivel"]) || $_SESSION["Nivel"]==1 || $_SESSION["Nivel"]==2){
  header("location:login.php");

}


?>


<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title>Administrador</title>
        <?php require_once "scripts.php";  ?>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
		  <a class="navbar-brand" href="#">CAPTURISTA</a>
		  	<div class="dropdown">
			  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			    Formularios
			  </button>
			  <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
			    <button class="dropdown-item" type="button" onclick="dirigirregistro()">Formulario Registro</button>
		<!--	    <button class="dropdown-item" type="button" onclick="dirigirusuario()">Formulario Usuario</button>
			    <button class="dropdown-item" type="button" onclick="dirigirmarca()">Formulario Marca</button>
			    <button class="dropdown-item" type="button" onclick="dirigirMecanico()">Formulario Mecanico</button>
			    <button class="dropdown-item" type="button" onclick="dirigirvehiculos()">Formulario Vehiculos</button>
			     <button class="dropdown-item" type="button" onclick="dirigirchofer()">Formulario Chofer</button>
			    <button class="dropdown-item" type="button" onclick="dirigirtaller()">Formulario Taller</button> -->
			  </div>
			  <span type="button" class="btn btn-danger" id="cerrarsesion" style="cursor:pointer;">
				Cerrar Sesión<span class="fa "></span> 
		    	</span>
			</div>

		</nav>

    </body>
</html>

<script type="text/javascript">
	    
	    $('#cerrarsesion').click(function(){
	 	$(location).attr('href','logout.php'); 	
	 	});
	 	

		function dirigirregistro(){
			window.location.href = "FRegistro.php";
		}
		function dirigirusuario(){
			window.location.href = "FUsuario.php";
		}
		function dirigirmarca(){
			window.location.href = "FMarca.php";
		}
		function dirigirMecanico(){
			window.location.href = "FMecanico.php";
		}
		function dirigirvehiculos(){
			window.location.href = "FVehiculos.php";
		}
		function dirigirchofer(){
			window.location.href = "FChofer.php";
		}
		function dirigirtaller(){
			window.location.href = "FTaller.php";
		}	

</script>