<?php 
	
	require_once "../clases/conexion.php";
	require_once "../clases/crud.php";

	$obj= new crud();
	$objuser= new cruduser();
	$objchof= new crudchof();
	$objtaller= new crudtaller();
	$objmecanico= new crudmecanico();
	$objvehiculo= new crudvehiculos();
	$objregistro= new crudregistro();
	//	$datosM=array($_POST['FMarca'],$_POST['Emarca']);
	//	$datosU=array($_POST['FUsuario'],$_POST['Eusuario']);


/*	if($datosM[1] == "ConfMarca"){
		echo $obj->eliminar($datosM[0]);
	}*/
	if(isset($_POST['FMarca'])){
		echo $obj->eliminar($_POST['FMarca']);
	}

	if(isset($_POST['FUsuario']) && !empty($_POST['FUsuario'])){
		echo $objuser->eliminaruser($_POST['FUsuario']);
	}
	
	if(isset($_POST['FChofer']) && !empty($_POST['FChofer'])){
		echo $objchof->eliminarchofer($_POST['FChofer']);
	}

	if(isset($_POST['FTaller']) && !empty($_POST['FTaller'])){
		echo $objtaller->eliminartaller($_POST['FTaller']);
	}

	if(isset($_POST['FMecanico']) && !empty($_POST['FMecanico'])){
		echo $objmecanico->eliminarmecanico($_POST['FMecanico']);
	}
	
	if(isset($_POST['FVehiculo']) && !empty($_POST['FVehiculo'])){
		echo $objvehiculo->eliminarvehiculos($_POST['FVehiculo']);
	}
	
	if(isset($_POST['FRegistro']) && !empty($_POST['FRegistro'])){
		echo $objregistro->eliminarregistro($_POST['FRegistro']);
	}

 ?>
