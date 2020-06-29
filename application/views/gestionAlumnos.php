<!--main content start-->

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"> </script>

<section id="main-content">
	<section class="wrapper">
		<table id="alumnoLista" class="display">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Nombre de Usuario</th>
					<th>Curso</th>
					<th>Editar</th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($alumnos as $a) {
				?>	
					<tr id="rowalumnos<?= $a->id ?>">
					<td><?= $a->Nombre  ?></td>
					<td><?= $a->apellido ?></td>
					<td><?= $a->username ?></td>
					<td><?= $a->curso ?></td>
					<td><i class="eliminar fa fa-trash-o" style="cursor: pointer" id="alumno-<?= $a->id ?>"></i></td>
				</tr>	
				
				<?php
			}
				?>
				
			</tbody>
		</table>
	</section> 
</section> 

<script type="text/javascript">

		$(".eliminar").click(function() {  //este es un listener
		var idalumno=this.id;
		var res = idalumno.split("-");
		var id = res[1];
		console.log(idalumno);
		$.post("<?= base_url() ?>Dashboard/eliminarAlumno",{ idalumno: id}).done(function(data) {
			$("#rowalumnos"+id).fadeOut();
	
		});
	});
	

</script>


<script>
	$(document).ready( function () {
		$('#alumnoLista').DataTable();
	} );
</script>