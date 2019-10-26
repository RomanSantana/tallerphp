<?php
	require_once "../clases/conexion.php";
	require_once "../clases/crud.php";




function selectnombrechofer(){
    $conect = new conectar();
  $conexion=$conect->conexion();
  
  $query = 'SELECT * FROM `Chofer`';
  $result=mysqli_query($conexion,$query);
  $listas = '<option value="0">Elige una opción</option>';
  while($row = $result->fetch_array(MYSQLI_ASSOC)){
    $listas .= "<option value='$row[id_chofer]'>$row[Nombre]</option>";
  }
  return $listas;
}

echo selectnombrechofer();


?>