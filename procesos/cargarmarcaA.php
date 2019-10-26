<?php
	require_once "../clases/conexion.php";
	require_once "../clases/crud.php";

$dato=$_POST['FVehiculo'];

function selectmarcavehiculo($dato){
  $conect = new conectar();
	$conexion=$conect->conexion();
  
 
  $query = 'SELECT * FROM `Marca`';
  $result=mysqli_query($conexion,$query);
 /* $marca=array(
            trim($_POST['id_marca']),
            );*/
  $ver=mysqli_fetch_row($result);
    /*  $datoB=array( 
        'id_marca'  => $ver[0],
        'Descripcion' => $ver[1],
         );*/
      $listas="";
  while($row = $result->fetch_array(MYSQLI_ASSOC)){
    
 //   if ($dato!=$row['id_marca']) {
       $listas .= "<option value='$row[id_marca]'>$row[Descripcion]</option>";
//    }
   /* else
    {
      $listas .= "<option value='$row[id_marca]' selected= 'selec' >$row[Descripcion]</option>";
    }*/
  }
  return $listas;
}

if(isset($_POST['FVehiculo']) && !empty($_POST['FVehiculo'])) {
echo selectmarcavehiculo($dato);
}

?>