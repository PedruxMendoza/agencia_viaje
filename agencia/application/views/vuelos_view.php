
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Travelocity - Vuelos</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Alex+Brush" rel="stylesheet">

	<link rel="stylesheet" href="<?php echo base_url('props/bootstrap/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('props/css/open-iconic-bootstrap.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('props/bootstrap/css/datatables.min.css') ?>">	
	<link rel="stylesheet" href="<?php echo base_url('props/css/animate.css') ?>">
	<link href="<?php echo base_url('props/fontawesome/css/all.css') ?>" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

	<link rel="stylesheet" href="<?php echo base_url('props/css/owl.carousel.min.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('props/css/owl.theme.default.min.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('props/css/magnific-popup.css') ?>">

	<link rel="stylesheet" href="<?php echo base_url('props/css/aos.css') ?>">
	<!-- -->
	<link rel="stylesheet" href="<?php echo base_url('props/css/ionicons.min.css') ?>">

	<link rel="stylesheet" href="<?php echo base_url('props/css/flaticon.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('props/css/icomoon.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('props/css/style.css') ?>">
</head>
<body>

	<?php $this->load->view('utils/navbar') ?>
	<!-- END nav -->

	<div class="hero-wrap js-fullheight" style="background-image: url('<?php echo base_url("props/images/bg_7.jpg") ?>');">
		<div class="overlay"></div>
		<div class="container">
			<div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
				<div class="col-md-9 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
					<p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="<?php echo base_url('Welcome/index') ?>">Inicio</a></span> <span>Vuelos</span></p>
					<h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Vuelos</h1>
				</div>
			</div>
		</div>
	</div>

	<section class="ftco-section contact-section ftco-degree-bg">
		<div class="container">
			<div class="container">
				<form action="<?php echo base_url('vuelos_controller/insertar') ?>" method="POST">
					<br>
					<center><h1 class="bg-dark text-white text-center">INGRESAR VUELOS</h1></center>
					<br>
					<div style = "text-align: center;"><button class="btn btn-info" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
         			 Desplegar menú de ingreso
          			</button></div><br><br>
           			<div class="collapse" id="collapseExample">
					<div class="row">
						<div class="col-md-3"></div>
						<div class="col-md-3" align="left">Origen</div>
						<div class="col-md-3"><select name="origen" required="" class="form-control">
							<option value="">seleccione origen</option>
							<?php foreach($origen as $o) { ?>
								<option value="<?= $o->id_origen ?>"><?= $o->nombre_origen ?></option>
							<?php } ?>
						</select></div>
						<div class="col-md-3"></div>
					</div>
					<div class="row">
						<div class="col-md-3"></div>
						<div class="col-md-3" align="left">Destino</div>
						<div class="col-md-3"><select name="destino" required="" class="form-control">
							<option value="">seleccione destino</option>
							<?php foreach($destino as $d) { ?>
								<option value="<?= $d->id_destino ?>"><?= $d->nombre_destino ?></option>
							<?php } ?>
						</select></div>
						<div class="col-md-3"></div>
					</div>
					<div class="row">
						<div class="col-md-3"></div>
						<div class="col-md-3" align="left">Fecha de salida</div>
						<div class="col-md-3"><input type="date" name="fecha_salida" required="" class="form-control"></div>
						<div class="col-md-3"></div>
					</div>
					<div class="row">
						<div class="col-md-3"></div>
						<div class="col-md-3" align="left">Hora de salida</div>
						<div class="col-md-3"><input type="time" name="hora_salida" required="" class="form-control"></div>
						<div class="col-md-3"></div>
					</div>
					<div class="row">
						<div class="col-md-3"></div>
						<div class="col-md-3" align="left">Fecha de llegada</div>
						<div class="col-md-3"><input type="date" name="fecha_llegada" required="" class="form-control"></div>
						<div class="col-md-3"></div>
					</div>
					<div class="row">
						<div class="col-md-3"></div>
						<div class="col-md-3" align="left">Hora de llegada</div>
						<div class="col-md-3"><input type="time" name="hora_llegada" required="" class="form-control"></div>
						<div class="col-md-3"></div>
					</div>
					<div class="row">
						<div class="col-md-3"></div>
						<div class="col-md-3" align="left">Asientos totales</div>
						<div class="col-md-3"><input type="text" name="asientos_totales" maxlength="2" onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" required placeholder="digite asientos totales" class="form-control"></div>
						<div class="col-md-3"></div>
					</div>
					<div class="row">
						<div class="col-md-3"></div>
						<div class="col-md-3" align="left">Codigo de avión</div>
						<div class="col-md-3"><select name="cod_avion" required="" class="form-control">
							<option value="">--seleccione una opcion--</option>
							<?php foreach($avion as $ca) { ?>
								<option value="<?= $ca->cod_avion ?>"><?= $ca->nombre_cod_avion ?></option>
							<?php } ?>
						</select></div>
						<div class="col-md-3"></div>
					</div>
					<div class="row">
						<div class="col-md-3"></div>
						<div class="col-md-3" align="left">Precio</div>
						<div class="col-md-3">
							<div class="input-group mb-2">
       						<div class="input-group-prepend">
        					 <div class="input-group-text">$</div>
       						</div>
       						<input type="text" class="form-control" name="precio" id="inlineFormInputGroup" placeholder="digite precio">
     						</div></div>
						<div class="col-md-3"></div>
					</div>
					<br>
					<div class="row">
						<div class="col-md-3"></div>
						<div class="col-md-6"><button type="submit" value="ingresar" class="btn btn-block btn-success">Ingresar</button></div>
						<div class="col-md-3"></div>
					</div>
					<br>
				</div>
				</form>
				<div class="row">
					<div class="col-md-12">
						<h1 class="bg-dark text-white text-center">DATOS DE VUELOS</h1>
					</div>
				</div>	
				<div>
					<table class="table table-dark" id="fly">
						<thead>
							<tr>
								<th>Origen</th>
								<th>Destino</th>
								<th>Fecha desalida</th>
								<th>Hora salida</th>
								<th>fecha llegada</th>
								<th>hora llegada</th>
								<th>Asientos totales</th>
								<th>Codigo de avion</th>
								<th>Precio</th>
								<th>Eliminar</th>
								<th>Modificar</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							foreach ($vuelos as $valor) { ?>
								<tr>
									<td><?= $valor->nombre_origen ?></td>
									<td><?= $valor->nombre_destino ?></td>
									<td><?= $valor->fecha_salida ?></td>
									<td><?= $valor->hora_salida ?></td>
									<td><?= $valor->fecha_llegada ?></td>
									<td><?= $valor->hora_llegada ?></td>
									<td><?= $valor->asientos_disponibles ?></td>
									<td><?= $valor->nombre_cod_avion ?></td>
									<td><?= "$".$valor->precio ?></td>
									<td><a class="btn btn-block btn-danger" onclick="alerta_eliminar(<?= $valor->id_vuelo ?>)"><i class="fas fa-trash-alt"></i></a></td>
									<td><a class="btn btn-block btn-info"  href="<?php echo base_url('vuelos_controller/get_datos/' .$valor->id_vuelo) ?>"><i class="far fa-edit"></i></a></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</center>
			</form>
		</div>
	</div>
</section>


<footer class="ftco-footer ftco-bg-dark ftco-section">
	<div class="container">
		<div class="row mb-5">
			<div class="col-md">
				<div class="ftco-footer-widget mb-4">
					<h2 class="ftco-heading-2">dirEngine</h2>
					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
					<ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
						<li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
						<li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
						<li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
					</ul>
				</div>
			</div>
			<div class="col-md">
				<div class="ftco-footer-widget mb-4 ml-md-5">
					<h2 class="ftco-heading-2">Information</h2>
					<ul class="list-unstyled">
						<li><a href="#" class="py-2 d-block">About</a></li>
						<li><a href="#" class="py-2 d-block">Service</a></li>
						<li><a href="#" class="py-2 d-block">Terms and Conditions</a></li>
						<li><a href="#" class="py-2 d-block">Become a partner</a></li>
						<li><a href="#" class="py-2 d-block">Best Price Guarantee</a></li>
						<li><a href="#" class="py-2 d-block">Privacy and Policy</a></li>
					</ul>
				</div>
			</div>
			<div class="col-md">
				<div class="ftco-footer-widget mb-4">
					<h2 class="ftco-heading-2">Customer Support</h2>
					<ul class="list-unstyled">
						<li><a href="#" class="py-2 d-block">FAQ</a></li>
						<li><a href="#" class="py-2 d-block">Payment Option</a></li>
						<li><a href="#" class="py-2 d-block">Booking Tips</a></li>
						<li><a href="#" class="py-2 d-block">How it works</a></li>
						<li><a href="#" class="py-2 d-block">Contact Us</a></li>
					</ul>
				</div>
			</div>
			<div class="col-md">
				<div class="ftco-footer-widget mb-4">
					<h2 class="ftco-heading-2">Have a Questions?</h2>
					<div class="block-23 mb-3">
						<ul>
							<li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
							<li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
							<li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 text-center">

				<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					Copyright &copy; 2019 All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
				</div>
			</div>
		</div>
	</footer>



	<!-- loader -->
	<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


	<!-- <script src="../props/js/jquery.min.js"></script> -->  
	<?php $this->load->view('utils/alertasvuelos') ?>
	<script src="<?php echo base_url('props/bootstrap/js/jquery.min.js') ?>"></script>					
	<script src="<?php echo base_url('props/bootstrap/js/datatables.min.js') ?>"></script>
	<script type="text/javascript">
		$(document).ready(function () {
			$('#fly').DataTable();
			$('.dataTables_length').addClass('bs-select');
		});
	</script> 
	<script src="<?php echo base_url('props/js/jquery-migrate-3.0.1.min.js') ?>"></script>
	<script src="<?php echo base_url('props/js/popper.min.js') ?>"></script>
	<script src="<?php echo base_url('props/js/bootstrap.min.js') ?>"></script>
	<script src="<?php echo base_url('props/js/jquery.easing.1.3.js') ?>"></script>
	<script src="<?php echo base_url('props/js/jquery.waypoints.min.js') ?>"></script>
	<script src="<?php echo base_url('props/js/jquery.stellar.min.js') ?>"></script>
	<script src="<?php echo base_url('props/js/owl.carousel.min.js') ?>"></script>
	<script src="<?php echo base_url('props/js/jquery.magnific-popup.min.js') ?>"></script>
	<script src="<?php echo base_url('props/js/aos.js') ?>"></script>
	<script src="<?php echo base_url('props/js/jquery.animateNumber.min.js') ?>"></script>
	<script src="<?php echo base_url('props/js/scrollax.min.js') ?>"></script>
	<script src="<?php echo base_url('props/js/main.js') ?>"></script>

</body>
</html>