<?php
	require_once "../clases/conexion.php";
	require_once "../clases/crud.php";




function selectnombremecanico(){
    $conect = new conectar();
    $conexion=$conect->conexion();
  
  $query = 'SELECT * FROM `Mecanico`';
  $result=mysqli_query($conexion,$query);
  $listas = '<option value="0">Elige una opción</option>';
  while($row = $result->fetch_array(MYSQLI_ASSOC)){
    $listas .= "<option value='$row[id_mecanico]'>$row[Nombre]</option>";
  }
  return $listas;
}

echo  selectnombremecanico();


?>