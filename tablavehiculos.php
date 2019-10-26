
<?php 

require_once "clases/conexion.php";
$obj= new conectar();
$conexion=$obj->conexion();
/*
$sql="SELECT id_vehiculos,Placa,Numero,id_marca,Anio,Descripcion,Estatus
from Vehiculos";*/
$sql= "SELECT ve.id_vehiculos, ve.Placa, ve.Numero, ve.id_marca, ma.Descripcion, ve.Anio, ve.Descripcion, ve.Estatus
FROM Vehiculos as ve
inner join marca as ma ON ve.id_marca = ma.id_marca";
$result=mysqli_query($conexion,$sql);
?>


<div>
	<table class="table table-hover table-condensed table-bordered" id="iddatatable">
		<thead style="background-color: #dc3545;color: white; font-weight: bold;">
			<tr>
				<td hidden="true">Id</td>
				<td>Placa</td>
				<td>Numero de patrulla</td>
				<td>Marca</td>
				<td>Año</td>
				<td>Descripcion</td>
				<td>Estatus</td>
				<td>Editar</td>
				<td>Eliminar</td>
			</tr>
		</thead>
		<tfoot style="background-color: #ccc;color: white; font-weight: bold;">
			<tr>
				<td hidden="true">Id</td>
				<td>Placa</td>
				<td>Numero de patrulla</td>
				<td>Marca</td>
				<td>Año</td>
				<td>Descripcion</td>
				<td>Estatus</td>
				<td>Editar</td>
				<td>Eliminar</td>
			</tr>
		</tfoot>
		<tbody>
			<?php 
			while ($mostrar=mysqli_fetch_row($result)) {
				?>
				<tr style="width: 100%">
					<td hidden="true"><?php echo $mostrar[0] ?></td>
					<td><?php echo $mostrar[1] ?></td>
					<td><?php echo $mostrar[2] ?></td>
					<td><?php echo $mostrar[4] ?></td>
					<td><?php echo $mostrar[5] ?></td>
					<td><?php echo $mostrar[6] ?></td>
					<td><?php echo $mostrar[7] ?></td>

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
	                    columns: [ 1,2,4,5,6]
	                    
	                                },
	                title:'Reporte de Vehiculos'

                },
                {
	                extend: 'pdfHtml5',
	                exportOptions: {
	                    columns: [ 1,2,4,5,6 ]
	                },
	                title:'Reporte de Vehiculos',
 					customize : function(doc) {
                		doc.content[1].table.widths = [ '20%', '20%','20%','20%','20%' ];
                		doc.styles.tableBodyEven.alignment = 'center';
        				doc.styles.tableBodyEven.noWrap = true;
                		doc.styles.tableBodyOdd.alignment = 'center';
            		}
           		},
	        ],
	        
				language: {
                url: 'librerias/datatable/traduccion.json', 
           				 }
			});


	} );
</script>