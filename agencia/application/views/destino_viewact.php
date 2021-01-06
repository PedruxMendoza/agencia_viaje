
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Travelocity - Destino | Actualizar</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Alex+Brush" rel="stylesheet">

  <link rel="stylesheet" href="<?php echo base_url('props/bootstrap/css/bootstrap.min.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('props/css/open-iconic-bootstrap.min.css') ?>">
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
</head>
<body>

	<?php $this->load->view('utils/navbar') ?>
  <!-- END nav -->

  <div class="hero-wrap js-fullheight" style="background-image: url('<?php echo base_url("props/images/bg_9.jpg") ?>');">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
        <div class="col-md-9 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
          <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="<?php echo base_url('Welcome/index') ?>">Inicio</a></span> <span class="mr-2"><a href="<?php echo base_url('destino_controller/index') ?>">Destino</a></span> <span>Actualizar</span></p>
          <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Actualizar</h1>
        </div>
      </div>
    </div>
  </div>

  <section class="ftco-section contact-section ftco-degree-bg">
    <div class="container">
      <?php foreach ($destino as $valor) { ?>
        <form action="<?php echo base_url("destino_controller/actualizar")?>" method="POST">

          <input type="hidden" name="id" value="<?= $valor->id_destino?>">

          <div class="row">
            <div class="col-md-12"><h1 class="bg-dark text-white text-center">ACTUALIZAR DESTINO</h1></div>
          </div>
          <br>
          <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-3" align="left">Nombre de ciudad</div>
            <div class="col-md-3"><input type="text" name="nombre_ciudad" maxlength="50" required="" value="<?= $valor->nombre_destino?>" class="form-control"></div>
            <div class="col-md-3"></div>
          </div>
          <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-3" align="left">Nombre de país</div>
            <div class="col-md-3"><select name="nombre_pais" id="" required="" class="form-control">
              <option value="">seleccione el pais</option>
              <?php foreach ($nombre_pais as $pais) { ?>
                <option value="<?= $pais->id_pais?>"<?php if ($pais->id_pais == $valor->id_pais) {
                  echo "selected";} ?>><?= $pais->nombre_pais?></option>
                <?php } ?>
              </select></div>
              <div class="col-md-3"></div>
            </div>
            <br>
            <div class="row">
              <div class="col-md-3"></div>
              <div class="col-md-6"><input type="submit" name="action" value="Actualizar" class="btn btn-block btn-success"></div>
              <div class="col-md-3"></div>
            </div>
          <?php } ?>
        </form>
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
  <script src="<?php echo base_url('props/js/jquery.min.js') ?>"></script>
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



