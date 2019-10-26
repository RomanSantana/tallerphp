<?php
//ob_start();
require_once "clases/conexion.php";
$obj= new conectar();
$conexion=$obj->conexion();




?>
<style>
<!--
#encabezado {padding:5px 0; border-bottom: 1px solid; width:100%;margin:auto;}
#encabezado .fila #col_1 {width: 15%; text-align: left;}
#encabezado .fila #col_2 {text-align:left; width: 65%}

#encabezado .fila #col_2 #span1{font-size: 15px;}
#encabezado .fila #col_2 #span2{font-size: 15px; color: #ccc;}

#footer {padding-bottom:5px 0;border-top: 2px solid #46d; width:80%; margin:auto;}
#footer .fila td {text-align:center; width:100%;}
#footer .fila td span {font-size: 10px; color: #000;}

#fecha {margin-top:100px; width:100%;}
#fecha tr td {text-align: right; width:100%;}

#central {margin-top:20px; width:100%;}
#central tr td {padding: 0px; text-align:left; width:100%;}

#datos { margin:auto; width:100%; margin-top:7%;}
#datos td{border:1px solid black;}
#cabecera {color:fff; margin:auto;  font-size: 16pt; text-align:center; margin-top:4%;}
-->
</style>

    <?php
               
            function imprimirtabla($inicio,$filas){     
             
            require_once "clases/conexion.php";
            $obj= new conectar();
            $conexion=$obj->conexion();      
 
                     $filas=$filas;
                     $inicio=$inicio;
                   
                        // 3 paginas en este caso por 102 registros
    ?>
           <page>   
           <page_header>
                          <div id="cabecera">  VEHICULOS INACTIVOS </div>
           </page_header>
           
           
             <table id="datos" border >
                
                <tr style="height:10px" class="fila">
                    <td style="width:10%;height:auto;" align="center"><b>#</b></td>
                    <td style="width:20%;height:auto;" align="center"><b>placa</b></td>
                    <td style="width:15%;height:auto;" align="center"><b>numero de patrulla</b></td>
                    <td style="width:15%;height:auto;" align="center"><b>marca</b></td>
                    <td style="width:25%;height:auto;" align="center"><b>año</b></td>
                    <td style="width:15%;height:auto;" align="center"><b>Descripcion</b></td>
                   
                </tr>
                <?php
         /*       $sql= "SELECT ve.id_vehiculos, ve.Placa, ve.Numero, ve.id_marca, ma.Descripcion, ve.Anio, ve.Descripcion, ve.Estatus
                FROM Vehiculos as ve
                inner join marca as ma ON ve.id_marca = ma.id_marca";  */
                $sql="SELECT ve.Placa, ve.Numero, ma.Descripcion, ve.Anio, ve.Descripcion 
                        from Vehiculos as ve inner join marca as ma ON ve.id_marca = ma.id_marca where Estatus ='Inactivo' limit $inicio,$filas";
                        $result=mysqli_query($conexion,$sql);

                $i=0;

                while($row=mysqli_fetch_row($result)){
                    $i++;

                ?>
                
                    <tr style="height:10px" class="fila">
                   
                    <td style="width:10%;height:auto;" align="center"><?php echo $i; ?> </td>
                    <td style="width:20%;height:auto;" align="center"><?php echo $row[0];?></td>
                    <td style="width:15%;height:auto;" align="center"><?php echo $row[1];?> </td>
                    <td style="width:15%;height:auto;" align="center"><?php echo $row[2];?> </td>
                    <td style="width:25%;height:auto;" align="center"><?php echo $row[3];?> </td>
                    <td style="width:15%;height:auto;" align="center"><?php echo $row[4];?> </td>
                </tr>

                  
        
                <?php
                }
                ?>
              
            </table>
       </page>

<?php
}



$sql="SELECT count(*) as id_chofer from Chofer";
 $result=mysqli_query($conexion,$sql);
 $total_registros = mysqli_num_rows($result);
 $total_paginas = ceil($total_registros /  45);
 $filas=45;
 $i=1;
 $inicio=0;
 while ($i <=$total_paginas) {
      imprimirtabla($inicio,$filas);

      $i++;
    
      $inicio=$inicio+45;
 }

?>
