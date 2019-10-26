<?php 
	
	require_once "../clases/conexion.php";
	require_once "../clases/crud.php";

	$obj= new crud();
	$objuser = new cruduser();
	$objchof= new crudchof();
	$objtaller= new crudtaller();
	$objvehiculos= new crudvehiculos();
	$objregistro= new crudregistro();

	if (isset($_POST["FMarca"]) && !empty($_POST["FMarca"])) {
			$datos=array(
						$_POST['FMarca'],
					);
			echo json_encode($obj->obtenDatos($datos[0]));
	}
	

	if (isset($_POST["FUsuario"]) && !empty($_POST["FUsuario"])) {
			$datos=array(
						$_POST['FUsuario'],
					);
			echo json_encode($objuser->obtenDatosuser($datos[0]));
	}

	if (isset($_POST["FChofer"]) && !empty($_POST["FChofer"])) {
		$datos=array(
					$_POST['FChofer'],
				);
		echo json_encode($objchof->obtenDatoschofer($datos[0]));
	}

	if (isset($_POST["FTaller"]) && !empty($_POST["FTaller"])) {
		$datos=array(
					$_POST['FTaller'],
				);
		echo json_encode($objtaller->obtenDatostaller($datos[0]));
	}

	if (isset($_POST["FMecanico"]) && !empty($_POST["FMecanico"])) {
		$datos=array(
					$_POST['FMecanico'],
				);
		echo json_encode($objmecanico->obtenDatosmecanico($datos[0]));
	}

	if (isset($_POST["FVehiculo"]) && !empty($_POST["FVehiculo"])) {
		$datos=array(
					$_POST['FVehiculo'],
				);
		echo json_encode($objvehiculos->obtenDatosvehiculos($datos[0]));
	}

	if (isset($_POST["FRegistro"]) && !empty($_POST["FRegistro"])) {
		$datos=$_POST['FRegistro'];
		echo json_encode($objregistro->obtenDatosregistro($datos));
	}

 ?>