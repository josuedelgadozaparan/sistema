<?php ob_start(); ?> 




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
    </head>
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
    <body>
      <?php require_once dirname(__FILE__) . '/plantilla.php';?>
<!--  FINI DEL MENU-->
<?php

  
    $d = $_GET['d1'];
  //  echo "hola   ".$id;
   require_once '../Negocio/UsuarioTabla.php'; 
   $dato=new UsuarioTabla();
   $info_json=$dato->Validar_Consultar_Usuario_por_id($d);
   $decode= json_decode($info_json);
   //$codigo=$decode->CodigoPrestamo;
   $login=$decode->LoginUsuario; 
   $nom=$decode->NombreUsuario;
   $pass=$decode->ContraseniaUsuario;
   $cel=$decode->CelularUsuario;
   $dir=$decode->DireccionUsuario; 
   $doc=$decode->DocumentoUsuario;
   $per=$decode->IdPerfil;
   echo $info_json;

/*
   $login=$_SESSION["login"]; 
   $nom=$_SESSION["nom"]; 
   $pass=$_SESSION["pass"]; 
   $cel=$_SESSION["cel"]; 
   $dir=$_SESSION["dir"]; 
   $per=$_SESSION["per"];
   $doc=$_SESSION["doc"];
  */ 
   
   
   
 

  ?>

            
<!--  INICIO DEL FORMULARIO-->
<br><br><br><br><br>
<div class="container">

<div class="panel panel-default">
 <div class="panel-heading">
  <h3 class="panel-title"><b>EDITAR UN USUARIO</b></h3>
 </div>
  <div class="panel-body">

 <form class="form-horizontal" role="form" method="POST">
  <div class="form-group">
    <label for="name" class="col-sm-2 control-label">Usuario</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="nombrelogin" name="login"
       value=<?php  echo $login; ?> >
    </div>
  </div>
   
    <div class="form-group">
    <label for="password" class="col-sm-2 control-label">Contraseña</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="pass" name="password"  value="<?php  echo $pass; ?>" >
    </div>
  </div>



    <div class="form-group">
    <label for="password" class="col-sm-2 control-label">Confirmar su contraseña
    </label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="confirmpass"   name="cpassword" value="<?php  echo $pass; ?>" >
    </div>
  </div>
  <div class="form-group">
    <label for="password" class="col-sm-2 control-label">Nombre Usuario
    </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="nombreusuario" name="nom"  value="<?php  echo $nom; ?>" >
    </div>
  </div>
     <div class="form-group">
    <label for="password" class="col-sm-2 control-label">Celular Usuario
    </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="celularusuario"  name="cel"  value="<?php  echo $cel; ?>" >
    </div>
  </div>
     
  <div class="form-group">
    <label for="password" class="col-sm-2 control-label">Direccion Usuario
    </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="direccion"  name="dir" value="<?php echo $dir; ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="password" class="col-sm-2 control-label">Numero de documento
    </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="documento"  name="doc"  value="<?php  echo $doc;?>">
    </div>
  </div>


<div class="form-group">
    <label for="password" class="col-sm-2 control-label">Perfil
    </label>
    <div class="col-sm-10">
      <select class="form-control">
   <?php  $opcion= $per;
  
   if($_SESSION["per"]=='1'){
       echo '<option selected>ADMINISTRADOR</option>';   
       echo '<option>USUARIO</option>'; 
     
       
   }else
   {
        echo '<option >ADMINISTRADOR</option>';   
       echo '<option selected>USUARIO</option>'; 
     
   }
?>
          
          
  
 
 
  
</select>
    </div>
  </div>

  <div class="panel-footer" style="overflow:hidden;text-align:right;">
    <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary btn-md" name="procesar">ACTUALIZAR</button>
      <button type="submit" class="btn btn-default btn-MD"><b>CANCELAR</b></button>
    </div>
  </div>  
  </div>



  
</form>
  </div>
  
</div>
</div><!--  FIN DEL FORMULARIO-->
<?php 
              

        require_once '../Negocio/UsuarioTabla.php';
        if ( isset( $_POST['procesar']  ) ) { 
       //  $login= $_POST['login'];
     //$pass=$_POST['password'] ;
     //$nom=$_POST['nom'];
     //$cel=$_POST['cel'];
     //$dir=$_POST['dir'];
     //$doc=$_POST['doc'];
     //$per="USUARIO";
     
     
     
     //header ("Location:php/Presentacion/principal.php");
     $dato = new UsuarioTabla();
     $dato->ValidarActualizarUsuario($_POST['login'], $_POST['password'] , $_POST['nom'], $_POST['cel'], $_POST['dir'], $_POST['doc'], "USUARIO", $d);
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
<?php ob_end_flush(); ?> 
