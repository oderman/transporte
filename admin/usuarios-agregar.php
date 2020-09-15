<?php include("head.php");?>



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
						<li class="breadcrumb-item"><a href="usuarios.php">Usuarios</a></li>
						<li class="breadcrumb-item active">Agregar</li>
					</ol>
				</div>
				<!-- Page header end -->
				
				<!-- Main container start -->
				<div class="main-container">
					
					<form id="form_subir" action="usuarios-guardar.php" method="post" enctype="multipart/form-data">

					<!-- Row start -->
					<div class="row gutters">

						

						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="card">
								<div class="card-body">
									
									
									<div class="form-group row">
										<label for="usuario" class="col-sm-2 col-form-label col-form-label-sm">Usuario/Documento</label>
										<div class="col-sm-6">
											<input type="text" class="form-control form-control-sm" id="usuario" name="usuario" required>
										</div>
									</div>
									
									<div class="form-group row">
										<label for="nombres" class="col-sm-2 col-form-label col-form-label-sm">Nombres</label>
										<div class="col-sm-6">
											<input type="text" class="form-control form-control-sm" id="nombre" name="nombre" required>
										</div>
									</div>
									
									<div class="form-group row">
										<label for="email" class="col-sm-2 col-form-label col-form-label-sm">Contraseña</label>
										<div class="col-sm-6">
											<input type="password" class="form-control form-control-sm" id="clave" name="clave" required>
										</div>
									</div>
									
									<div class="form-group row">
										<label for="email" class="col-sm-2 col-form-label col-form-label-sm">Tipo de usuario</label>
										<div class="col-sm-6">
											<select class="form-control selectpicker" data-live-search="true" name="tipo">
													<option value="1">Administrador</option>
													<option value="2">Conductor</option>
											</select>
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