
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Travelocity - Avion</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Alex+Brush" rel="stylesheet">

  <link rel="stylesheet" href="<?php echo base_url('props/bootstrap/css/bootstrap.min.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('props/css/open-iconic-bootstrap.min.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('props/bootstrap/css/datatables.min.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('props/css/animate.css') ?>">
  <link href="<?php echo base_url('props/fontawesome/css/all.css') ?>" rel="stylesheet">

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
</head>
<body>

	<?php $this->load->view('utils/navbar') ?>
  <!-- END nav -->

  <div class="hero-wrap js-fullheight" style="background-image: url('<?php echo base_url("props/images/bg_10.jpg") ?>');">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
        <div class="col-md-9 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
          <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="<?php echo base_url('Welcome/index') ?>">Inicio</a></span> <span>Avion</span></p>
          <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Avion</h1>
        </div>
      </div>
    </div>
  </div>

  <section class="ftco-section contact-section ftco-degree-bg">
    <div class="container">
      <form action="<?php echo base_url("avion_controller/ingresar")?>" method="POST">
        <div class="row">
          <div class="col-md-12"><h1 class="bg-dark text-white text-center">INGRESAR DATOS DE AVIÓN</h1></div>
        </div>
        <br>
        <div style = "text-align: center;"><button class="btn btn-info" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
              Desplegar menú de ingreso
                </button></div><br><br>
                <div class="collapse" id="collapseExample">
        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-3" align="left">Codigo de avión</div>
          <div class="col-md-3"><input type="text" name="nombre_cod_avion" maxlength="11" class="form-control" required placeholder="ingrese codigo de avion" =""></div>
          <div class="col-md-3"></div>
        </div>
        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-3" align="left">Capacidad</div>
          <div class="col-md-3"><input type="text" name="capacidad" maxlength="2" onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" class="form-control" required placeholder="ingrese la capacidad" =""></div>
          <div class="col-md-3"></div>
        </div>
        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-3" align="left">Número de asientos</div>
          <div class="col-md-3"><input type="number" name="num_asientos" maxlength="2" onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" class="form-control" required placeholder="ingrese el numero de asientos" =""></div>
          <div class="col-md-3"></div>
        </div>
        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-3" align="left">Nombre de aeropuerto</div>
          <div class="col-md-3"><select name="nombre_aeropuerto" required="" class="form-control">
            <option value="">selecione aeropuerto</option>
            <?php foreach ($nombre_aeropuerto as $av) { ?>
              <option value="<?= $av->id_aeropuerto ?>"><?= $av->nombre_aeropuerto ?></option>
            <?php } ?>
          </select></div>
          <div class="col-md-3"></div>
        </div>
        <br>
        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-6"><input type="submit" name="actualizar" class="btn btn-block btn-success" value="Ingresar"></div>
          <div class="col-md-3"></div>
        </div>
      </form> 
      <br>
        </div>
      <div class="row">
        <div class="col-md-12">
          <h1 class="bg-dark text-white text-center">DATOS DE AVIONES</h1>
        </div>
      </div>  
      <table class="table table-dark" id="avion">
        <thead>
          <tr>
            <th>nombre_cod_avion</th>
            <th>capacidad</th>
            <th>num_asientos</th>
            <th>nombre_aeropuerto</th>
            <th>eliminar</th>
            <th>modificar</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($avion as $av) { ?>
            <tr>
              <td><?= $av->nombre_cod_avion?></td>
              <td><?= $av->capacidad?></td>
              <td><?= $av->num_asientos?></td>
              <td><?= $av->nombre_aeropuerto?></td>
              <td><a class="btn btn-block btn-danger" onclick="alerta_eliminar(<?= $av->cod_avion ?>)"><i class="fas fa-trash-alt"></i></a></td>


              <td><a href="<?php echo base_url("avion_controller/get_datos/".$av->cod_avion)?>" class="btn btn-block btn-info"><i class="far fa-edit"></i></a></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
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
<?php $this->load->view('utils/alertasavion') ?>
<script src="<?php echo base_url('props/bootstrap/js/jquery.min.js') ?>"></script>          
<script src="<?php echo base_url('props/bootstrap/js/datatables.min.js') ?>"></script>
<script type="text/javascript">
  $(document).ready(function () {
    $('#avion').DataTable();
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


