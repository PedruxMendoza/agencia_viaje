<!DOCTYPE html>
<html lang="en">
<head>
  <title>Travelocity - Agencia</title>
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

  <div class="hero-wrap js-fullheight" style="background-image: url('<?php echo base_url("props/images/6.jpg") ?>');">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
        <div class="col-md-9 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
          <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="<?php echo base_url('Welcome/index') ?>">Inicio</a></span> <span>Agencia</span></p>
          <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Agencia</h1>
        </div>
      </div>
    </div>
  </div>

  <section class="ftco-section contact-section ftco-degree-bg">
   <div class="container">
    <div class="container">
      <div class="row">
        <div class="col-md-12"><h1 class="bg-dark text-white text-center">INGRESAR NUEVA AGENCIA</h1></div>
      </div>    
      <center>
        <form action="<?php echo base_url('sucursal_controller/ingresar') ?>" method="POST">
          <br>
          <div style = "text-align: center;"><button class="btn btn-info" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
              Desplegar menú de ingreso
                </button></div><br><br>
                <div class="collapse" id="collapseExample">
          <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-3" align="left">Nombre Sucursal</div>
            <div class="col-md-3"><input type="text" name="nombre" maxlength="50" required placeholder="Escriba sucursal" class="form-control"></div>
            <div class="col-md-3"></div>
          </div>
          <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-3" align="left">Telefono</div>
            <div class="col-md-3"><input type="text" name="telefono" maxlength="8" onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" required placeholder="Digite el telefono" class="form-control"></div>
            <div class="col-md-3"></div>
          </div>
          <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-3" align="left">Departamento</div>
            <div class="col-md-3"><select name="departamento" required="" class="form-control">
              <option value="">Seleccione departamento</option>
              <?php foreach ($departamento as $de) { ?>
                <option value="<?= $de->id_departamento ?>"><?= $de->nombre_departamento ?></option>
              <?php } ?>
            </select></div>
            <div class="col-md-3"></div>
          </div>
          <br>
          <div class="row">
            <div class=col-md-3></div>
            <div class=col-md-6><button type="submit" value="ingresar" class="btn btn-block btn-success" onclick="alerta_ingresar()">Ingresar</button></div>
            <div class=col-md-3></div>

          </div>
        </form>
        <br>
          </div>
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h1 class="bg-dark text-white text-center">DATOS DE AGENCIAS</h1>
            </div>
          </div>  
          <table class="table table-dark" id="sucu">
            <thead>
              <tr>
                <th>Nombre de la Agencia</th>
                <th>Telefono</th>
                <th>Departamento</th>
                <th>Eliminar</th>
                <th>Modificar</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($agencia as $su) { ?>
                <tr>
                  <td><?= $su->nombre_agencia ?></td>
                  <td><?= $su->telefono ?></td>
                  <td><?= $su->nombre_departamento ?></td>
                  <td><a class="btn btn-block btn-danger" onclick="alerta_eliminar(<?= $su->id_agencia ?>)"><i class="fas fa-trash-alt"></i></a></td>
                  <td><a class="btn btn-block btn-info" href="<?php echo base_url('sucursal_controller/get_datos/'.$su->id_agencia) ?>"><i class="far fa-edit"></i></a></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
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
  <?php $this->load->view('utils/alertassucursales') ?>
  <script src="<?php echo base_url('props/bootstrap/js/jquery.min.js') ?>"></script>          
  <script src="<?php echo base_url('props/bootstrap/js/datatables.min.js') ?>"></script>
  <script type="text/javascript">
    $(document).ready(function () {
      $('#sucu').DataTable();
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