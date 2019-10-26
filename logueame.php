<?php 
require_once "clases/conexion.php";
$conect = new conectar();
$conexion=$conect->conexion();
session_start();

if(isset($_POST["Num_Empleado"]) && isset($_POST["contrasena"])){
  $Num_Empleado =$_POST["Num_Empleado"]; //mysqli_real_escape_string($connect, $_POST["user"]);
  $cont= $_POST["contrasena"];
  $sql = "SELECT * FROM Usuario WHERE Num_Empleado='$Num_Empleado' "; //AND contrasena='$contrasena'";
  $result = mysqli_query($conexion, $sql);
  $num_row = mysqli_num_rows($result);
  if ($num_row == "1") {
    $data = mysqli_fetch_array($result);
     $rest=password_verify($cont,$data['contrasena']);
    if($rest){
      $_SESSION["Num_Empleado"] = $data["Num_Empleado"];
      $_SESSION["Nivel"] = $data["Nivel"];
       echo $data["Nivel"];
    }
    else{
      echo 4;
    }

  } else {
    echo 4;
  }
 } else {
 echo "que onda";
}

?>