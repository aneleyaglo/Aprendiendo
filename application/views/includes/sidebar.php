 <!-- **********************************************************************************************************************************************************
MAIN SIDEBAR MENU
*********************************************************************************************************************************************************** -->
<!--sidebar start-->
<aside>
	<div id="sidebar"  class="nav-collapse ">
		<!-- sidebar menu start-->
		<ul class="sidebar-menu" id="nav-accordion">

			<p class="centered">
				<a href="profile.html"><img src="<?= base_url() ?>assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
			<h5 class="centered">
				<?php
				if (isset($_SESSION['nombre']) && isset($_SESSION['apellido'])) {
					echo $_SESSION['nombre'].''.$_SESSION['apellido'];
				}
					 ?>
				
			</h5>

			<li class="mt">
				<a class="active" href="index.html">
					<i class="fa fa-dashboard"></i>
					<span>Dashboard</span>
				</a>
			</li>

			<?php
				if($_SESSION['tipo']=='profesor'){
			?>
			<li class="sub-menu">
				<a href="javascript:;" >
					<i class="fa fa-th"></i>
					<span>Gestion de Alumnos</span>
				</a>

			</li>
			<li class="sub-menu">
				<a href="<?= base_url() ?>Dashboard/crearTareas" >
					<i class="fa fa-desktop"></i>
					<span>Crear Tareas</span>
				</a>
				
			</li>
			<?php } 
			
			?>
			
			
			<li class="sub-menu">
				<a href="javascript:;" >
					<i class="fa fa-book"></i>
					<span>Mis Tareas</span>
				</a>
		
			</li>
			<li class="sub-menu">
				<a href="javascript:;" >
					<i class="fa fa-tasks"></i>
					<span>Mensajes</span>
				</a>
				<ul class="sub">
					<li>
						<a  href="form_component.html">Form Components</a></li>
				</ul>
			</li>
		
				
			
			<li class="sub-menu">
				<a href="javascript:;" >
					<i class=" fa fa-bar-chart-o"></i>
					<span>Charts</span>
				</a>
				<ul class="sub">
					<li>
						<a  href="morris.html">Morris</a></li>
					<li>
						<a  href="chartjs.html">Chartjs</a></li>
				</ul>
			</li>

		</ul>
		<!-- sidebar menu end-->
	</div>
</aside>
<!--sidebar end-->