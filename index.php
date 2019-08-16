<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
        <script type="text/javascript" src="js/vendor/jquery-1.11.2.min.js"></script>
    </head>
<script type="text/javascript">
$(document).ready(function() {   
    setTimeout(function() {
        $(".content1").fadeIn(2500);
    },400);
});

//$(document).ready(function() {
 //   setTimeout(function() {
   //     $(".content").fadeOut(1500);
   // },3000);
//});
</script>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

           <header>
                <div class="container">
                   <div class="row">
                      <div class="col-xs-12 col-ms-12 col-md-12 col-lg-12 ">
                          <h1>SISTEMA DE VENTAS</h1>
                          <h5>Software inventarios</h5>
                      </div>
                   </div> 
                </div>
           </header> 
           <br>
           <br>
           <br>

<div class="container">
   <form class="form-inline" method="POST" >
      <div class="form-group">
        <label class="sr-only"  for="inputEmail">Usuario</label>
        <input type="text" name="usuario" class="form-control" placeholder="Usuario">
      </div>
      <div class="form-group">
       <label class="sr-only"  for="inputPassword">Password</label>
       <input type="password" name="pass" class="form-control"  placeholder="Password">
      </div>
      <button type="submit" class="btn btn-primary">Acceder</button>
  </form>
</div>

<br><br><br>
     
<!--[if lt IE 8]><div class="content">Hola, voy a desaparecer en 3 segundos!</div>!-->
<div class="container" align="center">
    <div class="row">
         <div class="col-xs-12 col-ms-12 col-md-12 col-lg-12">
              <div class="form-group">
                   
                       <div class="content1" style="display:none;">
                             <img src="img/iniciofinal.png" class="img-responsive">

                       </div>
                
                 
             </div>
        </div>
     </div>
 </div>




        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
    </body>
</html>
<?php
 $vacio=false;
require_once './php/Datos/Conexion.php';
require_once './php/Negocio/Login.php'; 
$cone = new Conexion();
$cone->conectar();
if ( isset( $_POST['usuario'] )&&isset( $_POST['pass'] ) ) { 
     $user= $_POST['usuario']; 
     $pass= $_POST['pass']; 
     $datologin = new Login($user,$pass);
     $vacio=$datologin->ValidarLogin($user, $pass);
     if($vacio=="")
     {
       echo '<div class="container">';
       echo '<h5>Usuario y/o contraseña incorrectos.</h5>';
       echo '</div>';
     }
     else
     {
      echo 'si puede'.$vacio;
    //  header ("Location:php/Presentacion/principal.php?idp=".$vacio."");
echo ("<script> location.href='php/Presentacion/principal.php'</script>");
     }
}
?>