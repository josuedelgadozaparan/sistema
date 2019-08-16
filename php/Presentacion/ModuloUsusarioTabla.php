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
        <link rel="stylesheet" href="../../css/bootstrap.min.css">
        <script src="../../js/vendor/modernizr-2.8.3.min.js"></script>
        <script src="../../js/jquery.1.11.1.js"></script>
        <script type="text/javascript">
         $(document).ready(function(){
            $('#mostrar').click(function(){

            $('#paracrear').fadeIn() 
            })    
           $('#mostrareliminar').click(function(){

            $('#paraeliminarcliente').fadeIn() 
            })    
            })
        </script>
        <script type="text/javascript">
         $(document).ready(function(){
            $("#btnprocesarjs").click(function(){
           $("#btnprocesar").click(); 
            }) ;
            })
        </script>
        <script>
        function valida(e){
        tecla = (document.all) ? e.keyCode : e.which;
        //Tecla de retroceso para borrar, siempre la permite$("#mostrarinfo").click();  
        if (tecla==8){
        return true;
         }
        // Patron de entrada, en este caso solo acepta numeros
        patron =/[0-9]/;
        tecla_final = String.fromCharCode(tecla);
        return patron.test(tecla_final);
         }
       </script>
       <script>
           function myFunction(fila) {
           var x = document.getElementById("tablauser").rows[fila].cells[1].innerText;
           alert(x);
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
         <div class="col-xs-12 col-ms-12 col-md-12 col-lg-12">
              <div class="form-group">
                    
                      <img src="../../img/img_usuario.png" class="img-responsive">
                  
             </div>
        </div>
     </div>
 </div>

<!--  formulario para eliminar-->
<div id="paraeliminarcliente" style="display:none;">
    <div class="container"  >
        <div class="row">
            <div class="col-xs-12 col-ms-12 col-md-12 col-lg-12 ">
               <div class="panel panel-default">
                      <div class="panel-heading">
                       <h3 class="panel-title">ADVERTENVIA</h3>
                      </div>
                   <div class="panel-body">
                     <h4>¿Esta seguro que desea eliminar el usuario?</h4>
                     <button class="btn btn-success btn-sm">ELIMINAR</button>
                     <button  type="submit" class="btn btn-success btn-sm">CANCELAR</button>
                   </div>
              </div>
           </div>
        </div> 
      </div>
</div>



                <!--  formulario para eliminar-->



<!--  FORMULARIO PARA CREAR-->
 <div id="paracrear" style="display:none;">
     <div class="container">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><b>CREACION DE  USUARIO</b></h3>
            </div>
        <div class="panel-body">

        <form class="form-horizontal" role="form" method="POST">
           <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Usuario</label>
                   <div class="col-sm-10">
                       <input type="text" class="form-control" maxlength="10" name="login">
       
                    </div>
           </div>
   
           <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Contraseña</label>
                     <div class="col-sm-10">
                        <input type="password" class="form-control"  maxlength="10" name="password"  >
                     </div>
          </div>



           <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Confirmar su contraseña</label>
                    <div class="col-sm-10">
                         <input type="password" class="form-control" maxlength="10" name="cpassword"  >
                    </div>
          </div>

          <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Nombre Usuario</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" maxlength="50"  name="nom"  >
                    </div>
          </div>

          <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Celular Usuario</label>
                    <div class="col-sm-10">
                           <input type="text" class="form-control"  maxlength="15"  name="cel" onkeypress="return valida(event)" >
                    </div>
          </div>
     
          <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Direccion Usuario</label>
                    <div class="col-sm-10">
                         <input type="text" class="form-control" maxlength="20" name="dir">
                    </div>
          </div>

          <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Numero de documento</label>
                    <div class="col-sm-10">
                         <input type="text" class="form-control" id="documento" maxlength="15" name="doc" onkeypress="return valida(event)" >
                    </div>
          </div>

          <div class="form-group">
                 <label for="password" class="col-sm-2 control-label">Perfil</label>
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
                          <button type="button"  class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModal" >
                           CREAR
                          </button>
                               <button type="submit" id="btnprocesar"  class="btn btn-primary btn-md" name="procesar" style="display:none;" >ACTUALIZAR</button>
                              <button type="submit" class="btn btn-default btn-md"><b>CANCELAR</b></button>
                        </div>
                   </div>  
                </div>

            </form>
         </div>
  
         </div>
     </div>

</div>                 <!-- FIN   FORMULARIO PARA CREAR-->









            <div id="esquemausuario" class="container">
                 <div class="row">
                  <div class="col-xs-12 col-ms-12 col-md-12 col-lg-12 ">
                    <div class="table-responsive" id="tablauser">
                         <table class="table table-striped"><br><br> 
                            <button  id="mostrar" class="btn btn-primary btn-md" name="procesar">CREAR USUARIO</button>
                            <br><br><br>
                             <?php
                                  $vacio=false;
                                   require_once '../Negocio/UsuarioTabla.php'; 
                                   $dato=new UsuarioTabla();
                                   $dato->Validar_Consultar_tabla_Usuario();
                               ?>
                          </table>
                    </div></div>
                </div>
            </div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <br><br><br>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">CONFIRMAR</h4>
      </div>
      <div class="modal-body">
      ¿Esta seguro que desea crear un nuevo usuario?
      </div>
      <div class="modal-footer">
        
       
        <button id="btnprocesarjs"  class="btn btn-primary btn-md" >CREAR</button>
        <button type="button" class="btn btn-default btn-md" data-dismiss="modal">SALIR</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="example" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <br><br><br>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><b>CONFIRMAR</b></h4>
      </div>
      <div class="modal-body">
      ¿Esta seguro que desea cancelar el usuario?
      </div>
      <div class="modal-footer">
        
       
        <button id="btnprocesarjs"  class="btn btn-success btn-md" >CREAR</button>
        <button type="button" class="btn btn-default btn-md" data-dismiss="modal">SALIR</button>
      </div>
    </div>
  </div>
</div>

<?php 
   if ( isset( $_POST['hola']  ) )
    { 
        header("Location:principal.php");
    }

    require_once '../Negocio/UsuarioTabla.php';
    if ( isset( $_POST['procesar']  ) )
     { 

     $login= $_POST['login']; 
     $pass=$_POST['password'] ;
     $cpass=$_POST['cpassword'] ;
     $nom=$_POST['nom'];
     $cel=$_POST['cel'];
     $dir=$_POST['dir'];
     $doc=$_POST['doc'];
     $per=$_POST['opcion'];

if($login==""||$pass==""||$cpass==""||$nom==""||$cel==""||$dir==""||$doc=="")
{
?>
 <script type="text/javascript">
        alert("funciona");
        </script>
<?php 
}
else
{
//$dato = new UsuarioTabla();
     //$dato->ValidarInsertarUsuario($login, $pass,$cpass, $nom, $cel, $dir, $doc, $per);
    // header ("Location:../Presentacion/ModuloUsusarioTabla.php");

}

     
     
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

