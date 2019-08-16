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
        <script src="../../js/jquery.1.11.1.js"></script>
        <script type="text/javascript">
        $(document).ready(function(){
            $('#mostrar').click(function(){

            $('#paracrearcliente').fadeIn() 
            })    
            })
        </script>
         

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

<br><br><br>
<!--  FINI DEL MENU-->
<div class="container">
    <div class="row">
         <div class="col-xs-12 col-ms-12 col-md-12 col-lg-12  ">
              <div class="form-group">
                    
                      <img src="../../img/img_clientes.png" class="img-responsive">
                  
             </div>
        </div>
     </div>
 </div>

<!--  FORMULARIO PARA CREAR-->
 <div id="paracrearcliente" style="display:none;" >
     <div class="container">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">CREACION DE  CLIENTE</h3>
            </div>
        <div class="panel-body">

        <form class="form-horizontal" role="form" method="POST">
           <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Cedula</label>
                   <div class="col-sm-10">
                       <input type="text" class="form-control" maxlength="15" name="ced" onkeypress="return valida(event)">
       
                    </div>
           </div>
   
           <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Nombre</label>
                     <div class="col-sm-10">
                        <input type="text" class="form-control"  maxlength="20" name="nom"  >
                     </div>
          </div>



           <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Apellido</label>
                    <div class="col-sm-10">
                         <input type="text" class="form-control" maxlength="20" name="ape"  >
                    </div>
          </div>

          <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Direccion residencia</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" maxlength="20"  name="dirres"  >
                    </div>
          </div>

          <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Telefono residencia</label>
                    <div class="col-sm-10">
                           <input type="text" class="form-control"  maxlength="20"  name="telres" onkeypress="return valida(event)">
                    </div>
          </div>
     
          <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Direccion oficina</label>
                    <div class="col-sm-10">
                         <input type="text" class="form-control" maxlength="20" name="dirofi">
                    </div>
          </div>

          <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Telefono oficina</label>
                    <div class="col-sm-10">
                         <input type="text" class="form-control" id="documento" maxlength="20 " name="telofi" onkeypress="return valida(event)" >
                    </div>
          </div>

          

  
                 <div class="panel-footer" style="overflow:hidden;text-align:right;">
                    <div class="form-group">
                         <div class="col-sm-offset-2 col-sm-10">
                               <button type="submit"  class="btn btn-primary btn-md" name="crearcliente">CREAR</button>
                              <button type="submit" class="btn btn-default btn-md">CANCELAR</button>
                        </div>
                   </div>  
                </div>

            </form>
         </div>
  
         </div>
     </div>

</div>                 <!-- FIN   FORMULARIO PARA CREAR-->
           
<?php 
              

        require_once '../Negocio/Cliente.php';
        if ( isset( $_POST['crearcliente']  ) ) { 
         
     
     $ced    = $_POST['ced'];
     $nom    = $_POST['nom'] ;
     $ape    = $_POST['ape'];
     $dirres = $_POST['dirres'];
     $telres = $_POST['telres'];
     $dirofi = $_POST['dirofi'];
     $telofi = $_POST['telofi'];
     $idusu  = $_SESSION["aaa"] ;
     
     //header ("Location:php/Presentacion/principal.php");
     $dato = new Cliente();
     $dato->ValidarInsertarCliente($ced, $nom, $ape, $dirres, $dirofi, $telres, $telofi, $idusu);
     header ("Location:ModuloCliente.php");
     
       }
      
?>
           




            <div id="esquemausuario" class="container">
                 <div class="row">
                  <div class="col-xs-12 col-ms-12 col-md-12 col-lg-12 ">
                    <div class="table-responsive">
                         <table class="table table-striped"><br><br> 
                            <button  id="mostrar" class="btn btn-primary btn-md" name="procesar">CREAR CLIENTE</button>
                            <br><br><br>
                              <?php
                                   $vacio=false;
                                    require_once '../Negocio/Cliente.php'; 
                                   $dato=new Cliente();
                                   $vacio=$dato->ValidarConsultarClienteTodos();
                               ?>
                          </table>
                    </div></div>
                </div>
            </div>


     
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
