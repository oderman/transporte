<?php include("head.php");?>

<?php
$consultaPpal = $pdo->prepare("SELECT * FROM viajes WHERE via_id='".$_GET["idR"]."'");
$consultaPpal->execute();
$datosPpal = $consultaPpal->fetch();
?>



		<!-- *************
			************ Vendor Css Files *************
		************ -->
		<!-- DateRange css -->
		<link rel="stylesheet" href="vendor/daterange/daterange.css" />

		<!-- Input Tags css -->
		<link rel="stylesheet" href="vendor/input-tags/tagsinput.css" />

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
						<li class="breadcrumb-item"><a href="rutas.php">Viajes</a></li>
						<li class="breadcrumb-item active">Editar</li>
					</ol>
				</div>
				<!-- Page header end -->
				
				<!-- Main container start -->
				<div class="main-container">
					
					<form id="form_subir" action="viajes-actualizar.php" method="post" enctype="multipart/form-data">
						<input type="hidden" name="idR" value="<?=$_GET["idR"];?>">

					<!-- Row start -->
					<div class="row gutters">

						

						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="card">
								<div class="card-body">
									
									<div class="form-group row">
										<label for="fechaInicio" class="col-sm-2 col-form-label col-form-label-sm">Fecha y hora de inicio</label>
										<div class="col-sm-6">
											<?=$datosPpal['via_inicio'];?>
										</div>
									</div>
									
									<div class="form-group row">
										<label for="trayecto" class="col-sm-2 col-form-label col-form-label-sm">Vehículo y trayecto</label>
										<div class="col-sm-6">
											<select class="form-control selectpicker" data-live-search="true" id="trayecto" name="trayecto" required>
												<option value="">--Seleccionar--</option>
												<?php
												$consulta = $pdo->prepare("SELECT * FROM rutas_vehiculos
												INNER JOIN rutas ON rut_id=rutv_ruta
												INNER JOIN localidad_ciudades ON ciu_id=rut_destino
												INNER JOIN vehiculos ON veh_id=rutv_vehiculo
												ORDER BY rutv_vehiculo
												");
												$consulta->execute();
												$res = $consulta->fetchAll();
												foreach($res as $datos){
													$origenC = $pdo->prepare("SELECT * FROM localidad_ciudades WHERE ciu_id='".$datos['rut_origen']."'");
													$origenC->execute();
													$origen = $origenC->fetch();
												?>
													<option value="<?=$datos['rutv_id'];?>" <?php if($datosPpal['via_trayecto'] == $datos['rutv_id']) {echo "selected";}?>><?=$datos['veh_nombre'];?> - DE <?=$origen['ciu_nombre']." A ".$datos['ciu_nombre']." ($".number_format($datos['rutv_tarifa'],0,".",".").")";?></option>
												<?php }?>
											</select>
										</div>
									</div>
									
									<div class="form-group row">
										<label for="conductor" class="col-sm-2 col-form-label col-form-label-sm">Conductor</label>
										<div class="col-sm-6">
											<select class="form-control selectpicker" data-live-search="true" id="conductor" name="conductor" required>
												<option value="">--Seleccionar--</option>
													<?php
													$consulta = $pdo->prepare("SELECT * FROM usuarios WHERE usr_tipo=2");
													$consulta->execute();
													$res = $consulta->fetchAll();
													foreach($res as $datos){
													?>
														<option value="<?=$datos['usr_id'];?>" <?php if($datosPpal['via_conductor'] == $datos['usr_id']) {echo "selected";}?>><?=$datos['usr_nombre'];?></option>
													<?php }?>
											</select>
										</div>
									</div>
									
									
									
									<div class="form-group row">
										<label for="tarifa" class="col-sm-2 col-form-label col-form-label-sm">Tarifa</label>
										<div class="col-sm-6">
											<input type="text" class="form-control form-control-sm" id="tarifa" name="tarifa" value="<?=$datosPpal['via_tarifa'];?>" required>
										</div>
									</div>
									
									
									
									
								</div>
							</div>
						</div>

						
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-right">
							<button type="submit" class="btn btn-outline-primary btn-lg"><span class="icon-save1"></span> GUARDAR CAMBIOS</button>
						</div>


					</div>
					<!-- Row end -->
						
					</form>	
					

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
		
		<!-- Input Tags JS -->
		<script src="vendor/input-tags/tagsinput.min.js"></script>
		<script src="vendor/input-tags/typeahead.js"></script>
		<script src="vendor/input-tags/tagsinput-custom.js"></script>


		<!-- Main JS -->
		<script src="js/main.js"></script>

	</body>

<!-- Mirrored from bootstrap.gallery/le-rouge/design-green/form-inputs.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Apr 2020 22:37:23 GMT -->
</html>