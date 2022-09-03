<?php
$rol_de_usuario_id = Auth::user()->rol_de_usuario_id;
?>


@extends('layouts.backend')



@section('contenido')

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo env('PATH_PUBLIC')?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo env('PATH_PUBLIC')?>bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo env('PATH_PUBLIC')?>bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo env('PATH_PUBLIC')?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo env('PATH_PUBLIC')?>dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo env('PATH_PUBLIC')?>dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        VIP Pass 
        <small>Enviar</small>
      </h1>
      <ol class="breadcrumb">
        <li class="active"><?php echo __('Inicio') ?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">

        <div id="app-enviar" class="col-xs-12 col-lg-6">
          <a v-bind:href="url_mensaje_extra('<?php echo $celular_wa ?>')" target="_blank">
            <button type="button" class="btn btn-lg btn-primary"><i class="fa fa-whatsapp"></i> Enviar VIP Pass <?php echo $Tarjeta->nombre ?></button>
          </a>
        </div>
      

        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

<!-- DataTables -->
<script src="<?php echo env('PATH_PUBLIC')?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo env('PATH_PUBLIC')?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>



<!-- vue.js -->
  <script src="<?php echo env('PATH_PUBLIC')?>js/vue/vue.js"></script>
  <script src="<?php echo env('PATH_PUBLIC')?>js/vee-validate/dist/vee-validate.js"></script>
  <script src="<?php echo env('PATH_PUBLIC')?>js/vee-validate/dist/locale/es.js"></script>
  <script type="text/javascript" src="<?php echo env('PATH_PUBLIC')?>js/vue-form-generator/vfg.js"></script>
  <link rel="stylesheet" type="text/css" href="<?php echo env('PATH_PUBLIC')?>js/vue-form-generator/vfg.css">

  <script src="https://cdn.jsdelivr.net/vue.resource/1.3.1/vue-resource.min.js"></script>


<!-- INICIO APP app-solicitud -->
    <script type="text/javascript">
        const config = {
          locale: 'es', 
        };
        //moment.locale('es');
        //console.log(moment());
        Vue.use(VeeValidate, config);

        var app = new Vue({
          el: '#app-enviar',

          data: {
            mensaje_extra: ''
          },

          methods: {                


            

            url_mensaje_extra: function (celular) {
              mensaje = 'Hola *<?php echo $Tarjeta->nombre ?>* aquí te enviamos tu *VIP PASS* electrónico:\n\n'
              mensaje = mensaje +'<?php echo $Tarjeta->url_vip_pass() ?> \n\n'
              url_mensaje_extra = 'https://api.whatsapp.com/send?phone='+celular+'&text='+mensaje;
              url_mensaje_extra = encodeURI(url_mensaje_extra)
              return url_mensaje_extra
            }
              
          },


        })
    </script>
<!-- FIN APP app-solicitud -->




@endsection
