
<?php 

require_once "clases/conexion.php";
$obj= new conectar();
$conexion=$obj->conexion();

$sql="SELECT id_chofer,Nombre,Telefono,Num_Radio,Num_Licencia
from Chofer";
$result=mysqli_query($conexion,$sql);
?>


<div>
	<table class="table table-hover table-condensed table-bordered" id="iddatatable">
		<thead style="background-color: #dc3545;color: white; font-weight: bold;">
			<tr>
				<td hidden="true">Id</td>
				<td>Nombre</td>
				<td>Telefono</td>
				<td>Radio</td>
				<td>Licencia</td>
				<td>Editar</td>
				<td>Eliminar</td>
			</tr>
		</thead>
		<tfoot style="background-color: #ccc;color: white; font-weight: bold;">
			<tr>
				<td hidden="true">Id</td>
				<td>Nombre</td>
				<td>Telefono</td>
				<td>Radio</td>
				<td>Licencia</td>
				<td>Editar</td>
				<td>Eliminar</td>
			</tr>
		</tfoot>
		<tbody>
			<?php 
			while ($mostrar=mysqli_fetch_row($result)) {
				?>
				<tr id="<?php echo $mostrar[0] ?>" class="row-selected" >
					<td hidden="true"><?php echo $mostrar[0] ?></td>
					<td><?php echo $mostrar[1] ?></td>
					<td><?php echo $mostrar[2] ?></td>
					<td><?php echo $mostrar[3] ?></td>
					<td><?php echo $mostrar[4] ?></td>

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

			{/*
				language: {
                url: 'librerias/datatable/traduccion.json', 
           				 }*/
           	dom: 'Bfrtip',
	        buttons: [{
	                extend: 'excelHtml5',
	                exportOptions: {
	                    columns: [ 1,2,3,4]
	                    
	                                },
	                title:'Reporte de Choferes'
                },
                {
	                extend: 'pdfHtml5',
	                exportOptions: {
	                    columns: [ 1,2,3,4 ]
	                },
	                title:'Reporte de Choferes',
	                customize : function(doc) {
                	doc.content[1].table.widths = [ '25%', '25%','25%','25%'];
                	doc.styles.tableBodyEven.alignment = 'center';
        			doc.styles.tableBodyEven.noWrap = true;
                	doc.styles.tableBodyOdd.alignment = 'center';
            		}
           		},
	        ],
	        language: {
                url: 'librerias/datatable/traduccion.json', 
           				 },
			});
	} );