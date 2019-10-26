<?php 

	class crud{
		public function agregar($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="INSERT into Marca (Descripcion) values ('$datos[0]')";
			return mysqli_query($conexion,$sql);
		}

		public function obtenDatos($idmarca){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="SELECT id_marca,
					Descripcion
					from Marca 
					where id_marca='$idmarca'";
			$result=mysqli_query($conexion,$sql);
			$ver=mysqli_fetch_row($result);

			$datos=array( 
				'id_marca' => $ver[0],
				'Descripcion' => $ver[1]
				 );
			return $datos;
		}

		public function actualizar($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="UPDATE Marca set Descripcion = '$datos[1]'
								where id_marca='$datos[0]' ";
			return mysqli_query($conexion,$sql);
		}
		public function eliminar($idmarca){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="DELETE from Marca where id_marca='$idmarca'";
			return mysqli_query($conexion,$sql);
		}
	}

class cruduser{
		public function agregaruser($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();
			$sql="INSERT into Usuario (Num_Empleado,contrasena,Nombre,Nivel)
			 values ('$datos[0]',
			 		 '$datos[1]',
			 		 '$datos[2]',
			 		 '$datos[3]')";
			return mysqli_query($conexion,$sql);
		}
		public function cambiarcontrasenia($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();
				$sql="UPDATE Usuario set contrasena  = '$datos[1]'
								where Num_Empleado='$datos[0]' ";
			return mysqli_query($conexion,$sql);
		}

		public function obtenDatosuser($idusuario){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="SELECT id_usuario,
					Num_Empleado,
					contrasena,
					Nombre,
					Nivel
					from Usuario 
					where id_usuario='$idusuario'";
			$result=mysqli_query($conexion,$sql);
			$ver=mysqli_fetch_row($result);

			$datos=array( 
				'id_usuario'  => $ver[0],
				'Num_Empleado' => $ver[1],
				'contrasena' => $ver[2],
				'Nombre' => $ver[3],
				'Nivel' => $ver[4]
				 );
			return $datos;
		}

		public function actualizaruser($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="UPDATE Usuario set Num_Empleado = '$datos[1]',
								/*	 contrasena  = '$datos[2]',*/
									 Nombre  = '$datos[2]',
									 Nivel = '$datos[3]'
								where id_usuario='$datos[0]' ";
			return mysqli_query($conexion,$sql);
		}

		public function eliminaruser($idusuario){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="DELETE from Usuario where id_usuario='$idusuario'";
			return mysqli_query($conexion,$sql);
		}
	}

class crudchof{
		public function agregarchofer($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="INSERT into Chofer (Nombre,Telefono,Num_Radio,Num_Licencia)
			 values ('$datos[0]',
			 		 '$datos[1]',
			 		 '$datos[2]',
			 		 '$datos[3]')";
			return mysqli_query($conexion,$sql);
		}

		public function obtenDatoschofer($idchofer){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="SELECT id_chofer,
					Nombre,
					Telefono,
					Num_Radio,
					Num_Licencia
					from Chofer 
					where id_chofer='$idchofer'";
			$result=mysqli_query($conexion,$sql);
			$ver=mysqli_fetch_row($result);

			$datos=array( 
				'id_chofer'  => $ver[0],
				'Nombre' => $ver[1],
				'Telefono' => $ver[2],
				'Num_Radio' => $ver[3],
				'Num_Licencia' => $ver[4]
				 );
			return $datos;
		}

		public function actualizarchofer($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="UPDATE Chofer set Nombre = '$datos[1]',
									 Telefono  = '$datos[2]',
									 Num_Radio  = '$datos[3]',
									 Num_Licencia = '$datos[4]'
								where id_chofer='$datos[0]' ";
			return mysqli_query($conexion,$sql);
		}
		public function eliminarchofer($idchofer){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="DELETE from Chofer where id_chofer='$idchofer'";
			return mysqli_query($conexion,$sql);
		}
	}

class crudtaller{
		public function agregartaller($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="INSERT into Taller (Descripcion,Direccion,Telefono)
			 values ('$datos[0]',
			 		 '$datos[1]',
			 		 '$datos[2]')";
			return mysqli_query($conexion,$sql);
		}

		public function obtenDatostaller($idtaller){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="SELECT id_taller,
					Descripcion,
					Direccion,
					Telefono
					from Taller 
					where id_taller='$idtaller'";
			$result=mysqli_query($conexion,$sql);
			$ver=mysqli_fetch_row($result);

			$datos=array( 
				'id_taller'  => $ver[0],
				'Descripcion' => $ver[1],
				'Direccion' => $ver[2],
				'Telefono' => $ver[3],
				 );
			return $datos;
		}

		public function actualizartaller($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="UPDATE Taller set Descripcion = '$datos[1]',
									 Direccion  = '$datos[2]',
									 Telefono  = '$datos[3]'
								where id_taller='$datos[0]' ";
			return mysqli_query($conexion,$sql);
		}
		public function eliminartaller($idtaller){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="DELETE from Taller where id_taller='$idtaller'";
			return mysqli_query($conexion,$sql);
		}
	}

class crudmecanico{
		public function agregarmecanico($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="INSERT into Mecanico (Nombre,Direccion,Telefono)
			 values ('$datos[0]',
			 		 '$datos[1]',
			 		 '$datos[2]')";
			return mysqli_query($conexion,$sql);
		}

		public function obtenDatosmecanico($idmecanico){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="SELECT id_mecanico,
					Nombre,
					Direccion,
					Telefono
					from Mecanico 
					where id_mecanico='$idmecanico'";
			$result=mysqli_query($conexion,$sql);
			$ver=mysqli_fetch_row($result);

			$datos=array( 
				'id_mecanico'  => $ver[0],
				'Nombre' => $ver[1],
				'Direccion' => $ver[2],
				'Telefono' => $ver[3],
				 );
			return $datos;
		}

		public function actualizarmecanico($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="UPDATE Mecanico set Nombre = '$datos[1]',
									 Direccion  = '$datos[2]',
									 Telefono  = '$datos[3]'
								where id_mecanico='$datos[0]' ";
			return mysqli_query($conexion,$sql);
		}
		public function eliminarmecanico($idmecanico){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="DELETE from Mecanico where id_mecanico='$idmecanico'";
			return mysqli_query($conexion,$sql);
		}
	}


	class crudvehiculos{
		public function agregarvehiculos($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="INSERT into Vehiculos (Placa,Numero,id_marca,Anio,Descripcion,Estatus)
			 values ('$datos[0]',
			 		 '$datos[1]',
			 		 '$datos[2]',
			 		 '$datos[3]',
			 		 '$datos[4]',
			 		 '$datos[5]')";
			return mysqli_query($conexion,$sql);
		}

		public function obtenDatosvehiculos($idvehiculo){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="SELECT id_vehiculos,
					Placa,
					Numero,
					id_marca,
					Anio,
					Descripcion,
					Estatus
					from Vehiculos 
					where id_vehiculos='$idvehiculo'";
			$result=mysqli_query($conexion,$sql);
			$ver=mysqli_fetch_row($result);

			$datos=array( 
				'id_vehiculos'  => $ver[0],
				'Placa' => $ver[1],
				'Numero' => $ver[2],
				'id_marca' => $ver[3],
				'Anio' => $ver[4],
				'Descripcion' => $ver[5],
				'Estatus' => $ver[6],
				 );
			return $datos;
		}

		public function actualizarvehiculos($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="UPDATE Vehiculos set Placa = '$datos[1]',
									 Numero  = '$datos[2]',
									 id_marca  = '$datos[3]',
									 Anio  = '$datos[4]',
									 Descripcion  = '$datos[5]',
									 Estatus  = '$datos[6]'
								where id_vehiculos='$datos[0]' ";
			return mysqli_query($conexion,$sql);
		}
		public function eliminarvehiculos($idvehiculo){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="DELETE from Vehiculos where id_vehiculos='$idvehiculo'";
			return mysqli_query($conexion,$sql);
		}
	}

	class crudregistro{
		public function agregarregistro($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="INSERT into Registro (id_vehiculos,id_chofer,Falla,Kilometraje,FechaEntrada,FechaSalida,id_taller,id_mecanico)
			 values ('$datos[0]',
			 		 '$datos[1]',
			 		 '$datos[2]',
			 		 '$datos[3]',
			 		 '$datos[4]',
			 		 '$datos[5]',
			 		 '$datos[6]',
			 		 '$datos[7]'
			 		)";
			return mysqli_query($conexion,$sql);
		}

		public function obtenDatosregistro($idregistro){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="SELECT
					id_registro,
					id_vehiculos,
					id_chofer,
					Falla,
					Kilometraje,
					FechaEntrada,
					FechaSalida,
					id_taller,
					id_mecanico
					from Registro 
					where id_registro='$idregistro'";
			$result=mysqli_query($conexion,$sql);
			$ver=mysqli_fetch_row($result);

			$datos=array( 
				'id_registro'  => $ver[0],
				'id_vehiculos'  => $ver[1],
				'id_chofer' => $ver[2],
				'Falla' => $ver[3],
				'Kilometraje' => $ver[4],
				'FechaEntrada' => $ver[5],
				'FechaSalida' => $ver[6],
				'id_taller' => $ver[7],
				'id_mecanico' => $ver[8]
				 );
			return $datos;
		}

		public function actualizarregistro($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="UPDATE Registro set id_vehiculos  = '$datos[1]',
									 id_chofer  = '$datos[2]',
									 Falla  = '$datos[3]',
									 Kilometraje  = '$datos[4]',
									 FechaEntrada  = '$datos[5]',
									 FechaSalida  = '$datos[6]',
								     id_taller  = '$datos[7]',
								     id_mecanico  = '$datos[8]'
								where id_registro = '$datos[0]' ;";
			return mysqli_query($conexion,$sql);
		}

		public function eliminarregistro($idregistro){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="DELETE from Registro where id_registro='$idregistro'";
			return mysqli_query($conexion,$sql);
		}
	}	
 ?>