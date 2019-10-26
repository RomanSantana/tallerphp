
<?php 

require_once "clases/conexion.php";
$obj= new conectar();
$conexion=$obj->conexion();
/*
$sql="SELECT id_vehiculos,Placa,Numero,id_marca,Anio,Descripcion,Estatus
from Vehiculos";*/
$sql= "SELECT re.id_registro, re.id_vehiculos,ve.Numero, re.id_chofer, ch.Nombre, re.Falla, re.kilometraje, re.FechaEntrada, re.FechaSalida, re.id_taller,
ta.Descripcion,re.id_mecanico,me.Nombre
FROM Registro as re
inner join Vehiculos as ve ON re.id_vehiculos = ve.id_vehiculos  
inner join Chofer as ch on re.id_chofer = ch.id_chofer
inner join Taller as ta on re.id_taller = ta.id_taller
inner join Mecanico as me on re.id_mecanico = me.id_mecanico
;";
$result=mysqli_query($conexion,$sql);
?>


<div>
	<table class="table table-hover table-condensed table-bordered" id="iddatatable" width="100%">
		<thead style="background-color: #dc3545;color: white; font-weight: bold; " width="100%">
			<tr>
				<td hidden="true">Id</td>
				<td hidden="true">id_vehiculos</td>
				<td>Numero de patrulla</td>
				<td hidden="true">id_chofer</td>
				<td>Nombre del chofer</td>
				<td>Falla</td>
				<td>Kilometraje</td>
				<td>Fecha de ingreso</td>
				<td>Fecha de egreso</td>
				<td hidden="true">id_taller</td>
				<td>Nombre/descripcion taller</td>
				<td hidden="true">id_mecanico</td>
				<td>nombre mecanico</td>
				<td>Editar</td>  
				<td>Eliminar</td>    
			</tr>
		</thead>
		<tfoot style="background-color: #ccc;color: white; font-weight: bold;" width="100%">
			<tr>
				<td hidden="true">Id</td>
				<td hidden="true">id_vehiculos</td>
				<td>Numero de patrulla</td>
				<td hidden="true">id_chofer</td>
				<td>Nombre del chofer</td>
				<td>Falla</td>
				<td>Kilometraje</td>
				<td>Fecha de ingreso</td>
				<td>Fecha de egreso</td>
				<td hidden="true">id_taller</td>
				<td>Nombre/descripcion taller</td>
				<td hidden="true">id_mecanico</td>
				<td>nombre mecanico</td>
				<td>Editar</td>
				<td>Eliminar</td>   
			</tr>
		</tfoot>
		<tbody width="100%">
			<?php  //hidden="true"
			while ($mostrar=mysqli_fetch_row($result)) {
				?>
				<tr>
					<td hidden="true"><?php echo $mostrar[0] ?></td>
					<td hidden="true"><?php echo $mostrar[1] ?></td>
					<td><?php echo $mostrar[2] ?></td>
					<td hidden="true"><?php echo $mostrar[3] ?></td>
					<td><?php echo $mostrar[4] ?></td>
					<td><?php echo $mostrar[5] ?></td>
					<td><?php echo $mostrar[6] ?></td>
					<td><?php echo $mostrar[7] ?></td>
					<td><?php echo $mostrar[8] ?></td>
					<td hidden="true"><?php echo $mostrar[9] ?></td>
					<td><?php echo $mostrar[10] ?></td>
					<td hidden="true"><?php echo $mostrar[11] ?></td>
					<td><?php echo $mostrar[12] ?></td>
		
						<td style="text-align: center;">
						<span class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalEditar" onclick="agregaFrmActualizar('<?php echo $mostrar[0] ?>')" style="cursor:pointer;">
							<span class="fa fa-pencil-square-o"></span>
						</span>
						
					</td>
					<td style="text-align: center;">
						<span class="btn btn-danger btn-sm" onclick="eliminarDatos('<?php echo $mostrar[0] ?>')" style="cursor:pointer;">
							<span class="fa fa-trash"></span>
						</span>
						
					</td>
					
		

				</tr>
				<?php 
			}
			?>
		</tbody>
	</table>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$('#iddatatable').DataTable(
	
			{
				 dom: 'Bfrtip',
	        buttons: [{
	                extend: 'excelHtml5',
	                exportOptions: {
	                    columns: [ 2,4,5,6,7,8,10,12]
	                    
	                                },
	                title:'Reporte de Registro'
                },
                {
	                extend: 'pdfHtml5',
	                exportOptions: {
	                    columns: [ 2,4,5,6,7,8,10,12 ]
	                },
	                title:'Reporte de Registro',
	                orientation: 'landscape',
	                customize : function(doc) {
                	doc.content[1].table.widths = [ '12.5%', '12.5%','12.5%','12.5%','12.5%','12.5%','12.5%','12.5%'];
                	doc.styles.tableBodyEven.alignment = 'center';
        			doc.styles.tableBodyEven.noWrap = true;
                	doc.styles.tableBodyOdd.alignment = 'center';
            		}
           		},
	        ],
				language: {
                url: 'librerias/datatable/traduccion.json', 
           				 },
           				 scrollX: "40vh",
			});


	} );
</script>