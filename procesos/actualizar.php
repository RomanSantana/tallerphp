<?php 
	require_once "../clases/conexion.php";
	require_once "../clases/crud.php";
	$obj= new crud();
	$objuser = new cruduser();
	$objchof= new crudchof();
	$objtaller= new crudtaller();
	$objmecanico= new crudmecanico();
	$objvehiculos= new crudvehiculos();
	$objregistro= new crudregistro();

if(isset($_POST['FMarca']) && !empty($_POST['FMarca'])){
	$datos=  array(trim($_POST['idmarca']), 
					trim($_POST['nombreM'])
					);	
	echo $obj->actualizar($datos);
}

if(isset($_POST['FUsuario']) && !empty($_POST['FUsuario'])) {
	$datos=  array(trim($_POST['idusuario']), 
				   trim($_POST['NumUsuarioU']), 
			//	   trim($_POST['ContUsuarioU']),
				   trim($_POST['NomUsuarioU']),
				   trim($_POST['NivUsuarioU']),
					);	
	echo $objuser->actualizaruser($datos);
}	

if(isset($_POST['FChofer']) && !empty($_POST['FChofer'])) {
	$datos=  array(trim($_POST['idchofer']), 
				   trim($_POST['NombreU']), 
				   trim($_POST['TelefonoU']),
				   trim($_POST['RadioU']),
				   trim($_POST['LicenciaU']),
					);	
	echo $objchof->actualizarchofer($datos);
}	

if(isset($_POST['FTaller']) && !empty($_POST['FTaller'])) {
	$datos=  array(trim($_POST['idtaller']), 
				   trim($_POST['DescripcionU']), 
				   trim($_POST['DireccionU']),
				   trim($_POST['TelefonoU']),
					);	
	echo $objtaller->actualizartaller($datos);
}	

if(isset($_POST['FMecanico']) && !empty($_POST['FMecanico'])) {
	$datos=  array(trim($_POST['idmecanico']), 
				   trim($_POST['NombreU']), 
				   trim($_POST['DireccionU']),
				   trim($_POST['TelefonoU']),
					);	
	echo $objmecanico->actualizarmecanico($datos);
}	

if(isset($_POST['FVehiculo']) && !empty($_POST['FVehiculo'])) {
	$datos=  array(trim($_POST['idvehiculoU']), 
				   trim($_POST['PlacaU']), 
				   trim($_POST['NumeroU']),
				   trim($_POST['marcaU']),
				   trim($_POST['anioU']),
				   trim($_POST['DescripcionU']),
				   trim($_POST['EstatusU']),
					);	
	echo $objvehiculos->actualizarvehiculos($datos);
}	

if(isset($_POST['idregistro']) && !empty($_POST['idregistro'])) {
	$datos=  array(trim($_POST['idregistro']), 
				   trim($_POST['NumeropratrullaU']), 
				   trim($_POST['nombrechoferU']),
				   trim($_POST['fallaU']),
				   trim($_POST['kilometrajeU']),
				   trim($_POST['ingresoU']),
				   trim($_POST['egresoU']),
				   trim($_POST['tallerU']),
				   trim($_POST['mecanicoU']),
					);	
	echo $objregistro->actualizarregistro($datos);
}	

?>