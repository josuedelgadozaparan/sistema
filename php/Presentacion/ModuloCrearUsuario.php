
<?php
    ob_start();
?>


<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="../../css/bootstrap.css">
        <link rel="stylesheet" href="../../css/main.css">

        <script src="../../js/vendor/modernizr-2.8.3.min.js"></script>
         <script>
        function valida(e){
        tecla = (document.all) ? e.keyCode : e.which;
        //Tecla de retroceso para borrar, siempre la permite
        if (tecla==8){
        return true;
         }
        // Patron de entrada, en este caso solo acepta numeros
        patron =/[0-9]/;
        tecla_final = String.fromCharCode(tecla);
        return patron.test(tecla_final);
         }
       </script>
    </head>
    <body>
       <?php require_once dirname(__FILE__) . '/plantilla.php';?>
<!--  FINI DEL MENU-->

            
<!--  INICIO DEL FORMULARIO-->
<br><br><br><br><br>
<div class="container">

<div class="panel panel-default">
 <div class="panel-heading">
  <h3 class="panel-title">CREACION DE  USUARIO</h3>
 </div>
  <div class="panel-body">

 <form class="form-horizontal" role="form" method="POST">
  <div class="form-group">
    <label for="name" class="col-sm-2 control-label">Usuario</label>
    <div class="col-sm-10">
        <input type="text" class="form-control"  name="login">
       
    </div>
  </div>
   
    <div class="form-group">
    <label for="password" class="col-sm-2 control-label">Contraseña</label>
    <div class="col-sm-10">
      <input type="password" class="form-control"   name="password"  >
    </div>
  </div>



    <div class="form-group">
    <label for="password" class="col-sm-2 control-label">Confirmar su contraseña
    </label>
    <div class="col-sm-10">
      <input type="password" class="form-control"  name="cpassword"  >
    </div>
  </div>
  <div class="form-group">
    <label for="password" class="col-sm-2 control-label">Nombre Usuario
    </label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  name="nom"  >
    </div>
  </div>
     <div class="form-group">
    <label for="password" class="col-sm-2 control-label">Celular Usuario
    </label>
    <div class="col-sm-10">
      <input type="text" class="form-control"    name="cel" >
    </div>
  </div>
     
  <div class="form-group">
    <label for="password" class="col-sm-2 control-label">Direccion Usuario
    </label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  name="dir">
    </div>
  </div>
  <div class="form-group">
    <label for="password" class="col-sm-2 control-label">Numero de documento
    </label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="documento" name="doc" >
    </div>
  </div>

<div class="form-group">
    <label for="password" class="col-sm-2 control-label">Perfil
    </label>
    <div class="col-sm-10">
      <select  name="opcion" class="form-control">
  <option>ADMINISTRADOR</option>
  <option>USUARIO</option>
  
</select>
    </div>
  </div>

  
<div class="panel-footer" style="overflow:hidden;text-align:right;">
    <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-success btn-sm" name="procesar">Submit</button>
      <button type="submit" class="btn btn-default btn-sm">Cancel</button>
    </div>
  </div>  
  </div>


  
</form>
  </div>
  
</div>
</div>
<?php 
              

        require_once '../Negocio/UsuarioTabla.php';
        if ( isset( $_POST['procesar']  ) ) { 
         
     
     $login= $_POST['login'];
     $pass=$_POST['password'] ;
     $nom =$_POST['nom'];
     $cel =$_POST['cel'];
     $dir =$_POST['dir'];
     $doc =$_POST['doc'];
     $per =$_POST['opcion'];

     echo $_POST['opcion'];echo $_POST['opcion'];echo $_POST['opcion'];echo $_POST['opcion'];
     
     //header ("Location:php/Presentacion/principal.php");
     $dato = new UsuarioTabla();
     $dato->ValidarInsertarUsuario($login, $pass, $nom, $cel, $dir, $doc, $per);
     //header("Location:ModuloUsusarioTabla.php");
      header ("Location:ModuloUsusarioTabla.php");
     
       }
      
?>
        <script>window.jQuery || document.write('<script src="../../js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
 <script src="../../js/vendor/bootstrap.js"></script>


        <script src="../../js/plugins.js"></script>
        <script src="../../js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
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
    session_start();
    ob_flush();
?>
