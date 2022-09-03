<!DOCTYPE html>
<html lang="es">

<head>
  
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-46601315-3"></script>

    <!-- Title Page-->
    <title>VIP PASS</title>

    <!-- Icons font CSS-->
    <link href="<?php echo env('PATH_PUBLIC')?>templates/2/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="<?php echo env('PATH_PUBLIC')?>templates/2/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="<?php echo env('PATH_PUBLIC')?>templates/2/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="<?php echo env('PATH_PUBLIC')?>templates/2/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="<?php echo env('PATH_PUBLIC')?>templates/2/css/main.css" rel="stylesheet" media="all">

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo env('PATH_PUBLIC')?>bower_components/bootstrap/dist/css/bootstrap.min.css">

    <!-- vue.js -->
    <script src="<?php echo env('PATH_PUBLIC')?>js/vue/vue.js"></script>
    <script src="<?php echo env('PATH_PUBLIC')?>js/vee-validate/dist/vee-validate.js"></script>
    <script src="<?php echo env('PATH_PUBLIC')?>js/vee-validate/dist/locale/es.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo env('PATH_PUBLIC')?>js/vue-form-generator/vfg.css">



</head>

<body>
    <div class="page-wrapper bg-gra-02 p-t-20 p-b-100 font-poppins">
      <center> <img class="sol-de-acuario-top img-responsive" src="<?php echo env('PATH_PUBLIC')?>/img/vippass-top.png" alt="GNOSIS" title="GNOSIS" style ="width: 200px"></center>
        <div class="wrapper wrapper--w550">
            <div class="card card-4">
                <div class="card-body">

                  <div class="row">

                    <div class="col-xs-12 col-md-6 col-lg-6">
                      <center>
                        <h2>VIP PASS CHECK</h2>
                        <p class="tit1_voucher">{{ $Tarjeta->nombre }} </p>
                        <p class="tit3_voucher">Cantidad de Personas: {{ $Tarjeta->cantidad_de_personas }} </p>
                      </center>
                    </div>

                    <div class="col-xs-12 col-md-6 col-lg-6">
                      <center>
                        <img src="<?php echo env('PATH_PUBLIC')?>/img/check_<?php echo $sino ?>.png" style="width: 200px">
                        <?php if ($mensaje <> '') { ?>
                        <br><br><p class="tit1_voucher" style="color: {{ $color_mensaje }}">{{ $mensaje }} </p>
                        <?php } ?>
                      </center>
                    </div>


                  </div>


                </div>

                    
                    

                            

              </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="<?php echo env('PATH_PUBLIC')?>templates/2/vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="<?php echo env('PATH_PUBLIC')?>templates/2/vendor/select2/select2.min.js"></script>
    <script src="<?php echo env('PATH_PUBLIC')?>templates/2/vendor/datepicker/moment.min.js"></script>
    <script src="<?php echo env('PATH_PUBLIC')?>templates/2/vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="<?php echo env('PATH_PUBLIC')?>templates/2/js/global.js"></script>

    <!-- Bootstrap 3.3.7 -->
    <script src="<?php echo env('PATH_PUBLIC')?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->