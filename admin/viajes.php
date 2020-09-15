<?php include("head.php");?>


		<!-- *************
			************ Vendor Css Files *************
		************ -->
		<!-- DateRange css -->
		<link rel="stylesheet" href="vendor/daterange/daterange.css" />

		<!-- Data Tables -->
		<link rel="stylesheet" href="vendor/datatables/dataTables.bs4.css" />
		<link rel="stylesheet" href="vendor/datatables/dataTables.bs4-custom.css" />
		<link href="vendor/datatables/buttons.bs.css" rel="stylesheet" />

	</head>

	<body>

		<!-- Page wrapper start -->
		<div class="page-wrapper">
			
			<!-- Sidebar wrapper start -->
			<?php include("menu.php");?>
			<!-- Sidebar wrapper end -->

			<!-- Page content start  -->
			<div class="page-content">

				<!-- Header start -->
				<?php include("header.php");?>
				<!-- Header end -->

				<!-- Page header start -->
				<div class="page-header">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.php">Escritorio</a></li>
						<li class="breadcrumb-item active">viajes</li>
					</ol>
				</div>
				<!-- Page header end -->
				
				<!-- Main container start -->
				<div class="main-container">

					<!-- Row start -->
					<div class="row gutters">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							
							<?php if(isset($_GET["msg"]) && $_GET["msg"]==1){?>
								<p class="mt-2">
									<div class="alert alert-primary alert-dismissible fade show" role="alert">
										El registro fue añadido correctamente.
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">×</span>
										</button>
									</div>
								</p>
								<?php }?>
						
							<?php if(isset($_GET["msg"]) && $_GET["msg"]==2){?>
								<p class="mt-2">
									<div class="alert alert-primary alert-dismissible fade show" role="alert">
										El registro fue eliminado correctamente.
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">×</span>
										</button>
									</div>
								</p>
								<?php }?>
					
					<?php if(isset($_GET["msg"]) && $_GET["msg"]==3){?>
								<p class="mt-2">
									<div class="alert alert-primary alert-dismissible fade show" role="alert">
										El registro fue actualizado correctamente.
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">×</span>
										</button>
									</div>
								</p>
								<?php }?>
							
							
							<div class="table-container">

								
								<div class="t-header">viajes</div>
								
								<a href="viajes-agregar.php" class="btn btn-primary btn-lg"><span class="icon-add_circle"></span> AGREGAR NUEVO VIAJE</a>
								
								<div class="table-responsive">
									<table id="basicExample" class="table custom-table">
										<thead>
											<tr>
												<th>ID</th>
												<th>Fecha y hora</th>
												<th>Origen</th>
												<th>Destino</th>
												<th>Vehículo</th>
												<th>Conductor</th>
												<th>Tarifa</th>
												<th>Costo</th>
												<th>Utilidad</th>
												<th>Acciones</th>
											</tr>
										</thead>
										
										<tbody>
											<?php
											$utilidad = 0;
											
											$consulta = $pdo->prepare("SELECT * FROM viajes
											INNER JOIN usuarios ON usr_id=via_conductor
											INNER JOIN rutas_vehiculos ON rutv_id=via_trayecto
											INNER JOIN rutas ON rut_id=rutv_ruta
											INNER JOIN vehiculos ON veh_id=rutv_vehiculo
											INNER JOIN localidad_ciudades ON ciu_id=rut_destino
											");
											$consulta->execute();
											$res = $consulta->fetchAll();
											foreach($res as $datos){
												
												$origenC = $pdo->prepare("SELECT * FROM localidad_ciudades WHERE ciu_id='".$datos['rut_origen']."'");
												$origenC->execute();
												$origen = $origenC->fetch();
												
												$fondoResaltado = '';
												if(isset($_GET["idR"]) && $datos['via_id'] == $_GET["idR"]) {$fondoResaltado = 'style="background-color: aquamarine;"';}
												
												$utilidad = ($datos['via_tarifa'] - $datos['via_costo']);
											?>
											<tr>
												<td <?=$fondoResaltado;?>><?=$datos['via_id'];?></td>
												<td><?=$datos['via_inicio'];?></td>
												<td><?=$origen['ciu_nombre'];?></td>
												<td><?=$datos['ciu_nombre'];?></td>
												<td><?=$datos['veh_nombre'];?></td>
												<td><?=$datos['usr_nombre'];?></td>
												<td>$<?=number_format($datos['via_tarifa'],0,".",".");?></td>
												<td>$<?=number_format($datos['via_costo'],0,".",".");?></td>
												<td style="font-weight: bold;">$<?=number_format($utilidad,0,".",".");?></td>
												
												<td>
													<a href="viajes-editar.php?idR=<?=$datos['via_id'];?>" class="btn btn-info btn-sm">Editar</a>
													<a href="viajes-eliminar.php?idR=<?=$datos['via_id'];?>" class="btn btn-danger btn-sm" onClick="if(!confirm('Está a punto de eliminar este registro. Esta opción es irreversible. Desea continuar?')){return false;}">Eliminar</a>
												</td>
												
											</tr>
											<?php }?>
											
										</tbody>
									</table>
								</div>
							</div>
							
						</div>
					</div>
					<!-- Row end -->

				</div>
				<!-- Main container end -->

			</div>
			<!-- Page content end -->

		</div>
		<!-- Page wrapper end -->

		<!--**************************
			**************************
				**************************
							Required JavaScript Files
				**************************
			**************************
		**************************-->
		<!-- Required jQuery first, then Bootstrap Bundle JS -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.bundle.min.js"></script>
		<script src="js/moment.js"></script>


		<!-- *************
			************ Vendor Js Files *************
		************* -->
		<!-- Slimscroll JS -->
		<script src="vendor/slimscroll/slimscroll.min.js"></script>
		<script src="vendor/slimscroll/custom-scrollbar.js"></script>

		<!-- Daterange -->
		<script src="vendor/daterange/daterange.js"></script>
		<script src="vendor/daterange/custom-daterange.js"></script>

		<!-- Data Tables -->
		<script src="vendor/datatables/dataTables.min.js"></script>
		<script src="vendor/datatables/dataTables.bootstrap.min.js"></script>
		
		<!-- Custom Data tables -->
		<script src="vendor/datatables/custom/custom-datatables.js"></script>
		<script src="vendor/datatables/custom/fixedHeader.js"></script>

		<!-- Download / CSV / Copy / Print -->
		<script src="vendor/datatables/buttons.min.js"></script>
		<script src="vendor/datatables/jszip.min.js"></script>
		<script src="vendor/datatables/pdfmake.min.js"></script>
		<script src="vendor/datatables/vfs_fonts.js"></script>
		<script src="vendor/datatables/html5.min.js"></script>
		<script src="vendor/datatables/buttons.print.min.js"></script>


		<!-- Main JS -->
		<script src="js/main.js"></script>

	</body>

<!-- Mirrored from bootstrap.gallery/le-rouge/design-green/data-tables.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Apr 2020 22:38:54 GMT -->
</html>