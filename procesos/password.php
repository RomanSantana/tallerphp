<?php 
	require_once "../clases/conexion.php";
	require_once "../clases/crud.php";

	$objuser= new cruduser();

	if(isset($_POST['FUsuario']) && !empty($_POST['FUsuario']))
	 {
			$numero = trim($_POST['NumUsuario']);
		//	$sql="SELECT Num_Empleado from Usuario where Num_Empleado = '$numero' ";
			$contrasena=trim($_POST['ContNue']);
			$confirmar=trim($_POST['ContConf']);
			if($contrasena==$confirmar){
					$password_segura= password_hash($contrasena,PASSWORD_BCRYPT,['cost'=>4]);
				//	$result=mysqli_query($conexion,$sql);
				//	$fila=mysqli_num_rows($result);

					$datos=array(
								trim($_POST['NumUsuario']),$password_segura
								);
						echo $objuser->cambiarcontrasenia($datos);
					
				}

	}	