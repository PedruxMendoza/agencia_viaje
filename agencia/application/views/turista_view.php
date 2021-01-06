
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Travelocity - Turista</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Alex+Brush" rel="stylesheet">

	<link rel="stylesheet" href="<?php echo base_url('props/bootstrap/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('props/css/open-iconic-bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('props/css/animate.css') ?>">
	<link href="<?php echo base_url('props/fontawesome/css/all.css') ?>" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('props/bootstrap/css/datatables.min.css') ?>">	

	<link rel="stylesheet" href="<?php echo base_url('props/css/owl.carousel.min.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('props/css/owl.theme.default.min.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('props/css/magnific-popup.css') ?>">

	<link rel="stylesheet" href="<?php echo base_url('props/css/aos.css') ?>">
	<!-- -->
	<link rel="stylesheet" href="<?php echo base_url('props/css/ionicons.min.css') ?>">

	<link rel="stylesheet" href="<?php echo base_url('props/css/flaticon.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('props/css/icomoon.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('props/css/style.css') ?>">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="<?php echo base_url('props/js/jquery.inputmask.js') ?>"></script>
</head>
<body>

	<?php $this->load->view('utils/navbar') ?>
	<!-- END nav -->

	<div class="hero-wrap js-fullheight" style="background-image: url('<?php echo base_url("props/images/bg_6.jpg") ?>');">
		<div class="overlay"></div>
		<div class="container">
			<div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
				<div class="col-md-9 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
					<p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="<?php echo base_url('Welcome/index') ?>">Inicio</a></span> <span>Turista</span></p>
					<h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Turista</h1>
				</div>
			</div>
		</div>
	</div>

	<section class="ftco-section contact-section ftco-degree-bg">
		<center>
			<div class="container">
				<form action="<?php echo base_url('turista_controller/ingresar') ?>" method="POST">
					<div class="row">
						<div class="col-md-12"><h1 class="bg-dark text-white text-center">INGRESAR DATOS DE TURISTA</h1>
						</div>
					</div>
					<br>
					<div style = "text-align: center;"><button class="btn btn-info" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
						Desplegar menú de ingreso
					</button></div><br><br>
					<div class="collapse" id="collapseExample">
						<div class="row">
							<div class="col-md-3"></div>
							<div class="col-md-3" align="left">DUI</div>
							<div class="col-md-3"><input type="text" name="DUI" id="DUI" maxlength="10" onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" required placeholder="Digite su dui" class="form-control"></div>
							<div class="col-md-3"></div>
						</div>
						<script type="text/javascript">
							$(function () {
								var selector = document.getElementById("DUI");

								var im = new Inputmask("99999999-9");
								im.mask(selector);
							});
						</script>
						<div class="row">
							<div class="col-md-3"></div>
							<div class="col-md-3" align="left">Nombre</div>
							<div class="col-md-3"><input type="text" name="nombre" maxlength="50" required placeholder="Digite su nombre" class="form-control"></div>
							<div class="col-md-3"></div>
						</div>
						<div class="row">
							<div class="col-md-3"></div>
							<div class="col-md-3" align="left">Apellido</div>
							<div class="col-md-3"><input type="text" name="apellido" maxlength="50" required placeholder="Digite su Apellido" class="form-control"></div>
							<div class="col-md-3"></div>
						</div>
						<div class="row">
							<div class="col-md-3"></div>
							<div class="col-md-3" align="left">Direccion</div>
							<div class="col-md-3"><input type="text" name="direccion" maxlength="50" required placeholder="Digite su direccion" class="form-control"></div>
							<div class="col-md-3"></div>
						</div>
						<div class="row">
							<div class="col-md-3"></div>
							<div class="col-md-3" align="left">Telefono</div>
							<div class="col-md-3"><input type="text" name="telefono" maxlength="8" onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" required placeholder="Digite su telefono" class="form-control"></div>
							<div class="col-md-3"></div>
						</div>
						<div class="row">
							<div class="col-md-3"></div>
							<div class="col-md-3" align="left">Pasaporte</div>
							<div class="col-md-3"><input type="text" name="pasaporte" maxlength="9" onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" required placeholder="Digite su pasaporte" class="form-control"></div>
							<div class="col-md-3"></div>
						</div>
						<div class="row">
							<div class="col-md-3"></div>
							<div class="col-md-3" align="left">Sexo</div>
							<div class="col-md-3"><select name="sexo" required="" class="form-control">
								<option value="">Seleccione sexo</option>
								<?php foreach ($sexo as $se) { ?>
									<option value="<?= $se->id_sexo ?>"><?= $se->nombre_sexo ?></option>
								<?php } ?>
							</select></div>
							<div class="col-md-3"></div>
						</div>
						<div class="row">
							<div class="col-md-3"></div>
							<div class="col-md-3" align="left">Pais</div>
							<div class="col-md-3"><select name="pais" required="" class="form-control">
								<option value="">Seleccione pais</option>
								<?php foreach ($pais as $pa) { ?>
									<option value="<?= $pa->id_pais ?>"><?= $pa->nombre_pais ?></option>
								<?php } ?>
							</select></div>
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
					<div class="col-md-12"><h1 class="bg-dark text-white text-center">DATOS DE TURISTAS</h1></div>
				</div>	
				<table class="table table-dark" id="turis">
					<thead>
						<tr>
							<th>DUI</th>
							<th>Nombre</th>
							<th>Apellido</th>
							<th>Direccion</th>
							<th>Telefono</th>
							<th>Pasaporte</th>
							<th>Sexo</th>
							<th>Pais de Nacimiento</th>
							<th>Eliminar</th>
							<th>Modificar</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($turista as $tu) { ?>
							<tr>
								<td><?= $tu->dui_turista ?></td>
								<td><?= $tu->nombre ?></td>
								<td><?= $tu->apellido ?></td>
								<td><?= $tu->direccion ?></td>
								<td><?= $tu->telefono ?></td>
								<td><?= $tu->pasaporte ?></td>
								<td><?= $tu->nombre_sexo ?></td>
								<td><?= $tu->nombre_pais ?></td>
								<td><a onclick="alerta_eliminar(<?= $tu->dui_turista ?>)" class="btn btn-block btn-danger"><i class="fas fa-trash-alt"></i></a></td>

								<td><a class="btn btn-block btn-info" href="<?php echo base_url('turista_controller/get_datos/'.$tu->dui_turista) ?>"><i class="far fa-edit"></i></a></td>



							</tr>
						<?php } ?>
					</tbody>
				</table>
			</center>
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
		<?php $this->load->view('utils/alertasturistas') ?>
		<!-- <script src="<?php //echo base_url('props/bootstrap/js/jquery.min.js') ?>"></script>	 -->				
		<script src="<?php echo base_url('props/bootstrap/js/datatables.min.js') ?>"></script>
		<script type="text/javascript">
			$(document).ready(function () {
				$('#turis').DataTable();
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