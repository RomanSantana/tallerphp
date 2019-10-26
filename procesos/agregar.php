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

	$conect = new conectar();
	$conexion=$conect->conexion();

	
	

	if(isset($_POST['FMarca']) && !empty($_POST['FMarca']))
	 {
			$nombre = trim($_POST['nombre']);
			$sql="SELECT Descripcion from Marca where Descripcion = '$nombre' ";
			$result=mysqli_query($conexion,$sql);
			$fila=mysqli_num_rows($result);
			if($fila>0) {
				echo 5;
			}
			else
			{

			$datos=array(
						trim($_POST['nombre']),
						);
				echo $obj->agregar($datos);
			}
	}
	
if(isset($_POST['FUsuario']) && !empty($_POST['FUsuario']))
	 {
			$numero = trim($_POST['NumUsuario']);
			$sql="SELECT Num_Empleado from Usuario where Num_Empleado = '$numero' ";
			$contrasena=trim($_POST['ContUsuario']);
			$password_segura= password_hash($contrasena,PASSWORD_BCRYPT,['cost'=>4]);
			$result=mysqli_query($conexion,$sql);
			$fila=mysqli_num_rows($result);
			if($fila>0) {
				echo 5;
			}
			else
			{

			$datos=array(
						trim($_POST['NumUsuario']),$password_segura,trim($_POST['NomUsuario']),trim($_POST['NivUsuario']),
						);
				echo $objuser->agregaruser($datos);
			}
		//	echo $_POST['FUsuario'];
	}	
if(isset($_POST['FChofer']) && !empty($_POST['FChofer']))
	 {
			$numero = trim($_POST['Licencia']);
			$sql="SELECT Num_Licencia from Chofer where Num_Licencia = '$numero' ";
			$result=mysqli_query($conexion,$sql);
			$fila=mysqli_num_rows($result);
			if($fila>0) {
				echo 5;
			}
			else
			{

			$datos=array(
						trim($_POST['Nombre']),trim($_POST['Telefono']),trim($_POST['Radio']),trim($_POST['Licencia']),
						);
				echo $objchof->agregarchofer($datos);
			}
	}	

if(isset($_POST['FTaller']) && !empty($_POST['FTaller']))
	 {
			$dato = trim($_POST['Descripcion']);
			$sql="SELECT Descripcion from Taller where Descripcion = '$dato' ";
			$result=mysqli_query($conexion,$sql);
			$fila=mysqli_num_rows($result);
			if($fila>0) {
				echo 5;
			}
			else
			{

			$datos=array(
						trim($_POST['Descripcion']),trim($_POST['Direccion']),trim($_POST['Telefono']),
						);
				echo $objtaller->agregartaller($datos);
			}
	}


if(isset($_POST['FMecanico']) && !empty($_POST['FMecanico']))
	 {
			$dato = trim($_POST['Nombre']);
			$sql="SELECT Nombre from Mecanico where Nombre = '$dato' ";
			$result=mysqli_query($conexion,$sql);
			$fila=mysqli_num_rows($result);
			if($fila>0) {
				echo 5;
			}
			else
			{

			$datos=array(
						trim($_POST['Nombre']),trim($_POST['Direccion']),trim($_POST['Telefono']),
						);
				echo $objmecanico->agregarmecanico($datos);
			}
	}


if(isset($_POST['FVehiculo']) && !empty($_POST['FVehiculo']))
	 {
			$dato = trim($_POST['Placa']);
			$sql="SELECT Placa from Vehiculos where Placa = '$dato' ";
			$result=mysqli_query($conexion,$sql);
			$fila=mysqli_num_rows($result);
			if($fila>0) {
				echo 5;
			}
			else
			{

			$datos=array(
						trim($_POST['Placa']),trim($_POST['Numero']),trim($_POST['marca']),trim($_POST['anio']),trim($_POST['Descripcion']),trim($_POST['Estatus']),
						);
				echo $objvehiculo->agregarvehiculos($datos);
			}
	}

if(isset($_POST['FRegistro']) && !empty($_POST['FRegistro']))
	 {
	/*		$dato = trim($_POST['Placa']);
			$sql="SELECT Placa from Vehiculos where Placa = '$dato' ";
			$result=mysqli_query($conexion,$sql);
			$fila=mysqli_num_rows($result);
			if($fila>0) {
				echo 5;
			}
			else
			{

			$datos=array(
						trim($_POST['Placa']),trim($_POST['Numero']),trim($_POST['marca']),trim($_POST['anio']),trim($_POST['Descripcion']),trim($_POST['Estatus']),
						);
				echo $objvehiculo->agregarvehiculos($datos);
			}
	}*/
	$datos=array(
						trim($_POST['Numeropratrulla']),trim($_POST['nombrechofer']),trim($_POST['falla']),trim($_POST['kilometraje']),trim($_POST['ingreso']),
						trim($_POST['egreso']),trim($_POST['taller']),trim($_POST['mecanico']),
					);
				echo $objregistro->agregarregistro($datos);
	}
	
 ?>
 