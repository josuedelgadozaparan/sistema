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
        <script src="../../js/jquery.1.11.1.js"></script>
        
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
            </div>

            

      <div class="container derecha">
              <div class="row">
                     <div class="col-xs-12 col-ms-12 col-md-12 col-lg-12 ">
                        Bienvenido:
                        <?php  
                           session_start();
                           $cel=$_SESSION["aaa"] ;
                           $cel14=$_SESSION["bbb"] ;
                           if($cel==""||$cel14==""){
                      header("Location: ../../index.php");
                           }else{
                            echo $cel14;
                           }
                           
                               ?>
                               <br>
                        <a href="logout.php">Cerrar Sesión</a>
                     </div>
              </div>
      </div>
            
            
            


<!--  INICIO DEL MENU-->
 <div class="container">
       <nav class="navbar navbar-default" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Desplegar navegaciÃ³n</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
               </button>
               <a class="navbar-brand" href="#">MENU</a>
            </div>
 
  
             <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                  <li class="dropdown">
                       <a href="#" class="dropdown-toggle" data-toggle="dropdown">PRINCIPAL <b class="caret"></b></a>
                         <ul class="dropdown-menu">
                            <li><a href="http://localhost:8080/tarea/php/Presentacion/principal.php">Princpal</a></li>
                         </ul>
                   </li>
                      <li class="dropdown">
                       <a href="#" class="dropdown-toggle" data-toggle="dropdown">ROLES <b class="caret"></b></a>
                         <ul class="dropdown-menu">
                            <li><a href="http://localhost:8080/tarea/php/Presentacion/ModuloUsusarioTabla.php">Ususario</a></li>
                         </ul>
                   </li>

                   <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">BUSQUEDA<b class="caret"></b>  </a>
                         <ul class="dropdown-menu">
                            <li><a href="http://localhost:8080/tarea/php/Presentacion/ModuloCedula.php">Cedula</a></li>
                            <li class="divider"></li>
                            <li><a href="http://localhost:8080/tarea/php/Presentacion/ModuloCliente.php">Clientes</a></li>
                         </ul>
                  </li>

                 <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">PROCESO<b class="caret"></b>  </a>
                         <ul class="dropdown-menu">
                            <li><a href="http://localhost:8080/tarea/php/Presentacion/ModuloPrestamo.php">Prestamo</a></li>
                           
                         </ul>
                  </li>

                  <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown"> FACTURACION  <b class="caret"></b> </a>
                         <ul class="dropdown-menu">
                           <li><a href="http://localhost:8080/tarea/php/Presentacion/ModuloLinea.php">LINEA</a></li>
                            <li class="divider"></li>
                           <li><a href="http://localhost:8080/tarea/php/Presentacion/ModuloFactura.php">Factura</a></li>
                            <li class="divider"></li>
                           <li><a href="http://localhost:8080/tarea/php/Presentacion/ModuloInventario.php">Inventario</a></li>
                         </ul>
                 </li>

                  <li class="dropdown">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown">INFORME<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="http://localhost:8080/tarea/php/Presentacion/ModuloInforme.php">Informe/a></li>
                            
                       </ul>
                  </li>

            </ul>
          </div>
       </nav>
 </div>
<!--  FINI DEL MENU-->

<!--  FORMULARIO PARA CREAR-->
 <div id="paracrearcliente"  >
     <div class="container">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title" style="text-align: center;">FACTURA</h3>
            </div>
        <div class="panel-body">

        <form class="form-horizontal" role="form" method="POST">
           <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Digite Codigo</label>
                   <div class="col-sm-4">
                       <input type="text" id="someTextBox"  class="form-control" maxlength="15" name="codigo"  onkeypress="return valida(event)">
                        <script type="text/javascript">
            //Bind keypress event to textbox
            $('#someTextBox').keypress(function(event){
                var keycode = (event.keyCode ? event.keyCode : event.which);
                if(keycode == '13'){
                  var parametros =$('#someTextBox').val();
                    
                   

                    var valor =$('#someTextBox').val();
                    var parametros = {"valorCaja1" : valor}
                    $.ajax({
                            type:  "GET",
                            url:   "http://localhost:8080/tarea/php/Datos/ProcesoFactura.php",
                            data: {"valorCaja1" : valor},
                            success:  function (response) {
                            if(response==null){
                            alert("vacio");
                            }else{

                      

                            }


                                    },  
                             error: function(objeto, quepaso, otroobj){
                            alert("Estas viendo esto por que fallé"+valor);
            
        }

});



                }
                //Stop the event from propogation to other handlers
                //If this line will be removed, then keypress event handler attached
                //at document level will also be triggered
                event.stopPropagation();
            });
             
            //Bind keypress event to document
           
        </script>
       
                    </div>
           </div>
   
           <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Nombre</label>
                     <div class="col-sm-4">
                        <input type="text"   class="form-control"  maxlength="20" name="nombre" readonly="readonly" >
                     </div>
                     <label for="password" class="col-sm-2 control-label">Valor</label>
                    <div class="col-sm-4">
                         <input type="text" class="form-control" maxlength="10" name="valor" readonly="readonly" >
                    </div>
          </div>



           

          <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Doc Cliente</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" maxlength="20"  name="dirres" onkeypress="return valida(event)"  >
                    </div>
                     <label for="password" class="col-sm-2 control-label">Cantidad</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" maxlength="20"  name="cantidad" onkeypress="return valida(event)"  >
                    </div>
          </div>

          <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Descripcion</label>
                    <div class="col-sm-10">
                          <textarea class="form-control" rows="3" id="nomm" 
                           ></textarea>
                    </div>
          </div>

     
         

          <div class="form-group">
    <label for="password" class="col-sm-2 control-label">Medio de pago
    </label>
    <div class="col-sm-4">
      <select  name="opcion" class="form-control">
          <option select>EFECTIVO</option>
          <option>DEBITO</option>
          <option>CRETIDO</option>
          <option>EFECTIVO - DEBITO</option>
          <option>EFECTIVO - CREDITO</option>
          <option>DEBITO   - CREDITO</option>
          
   
</select>
    </div>
  </div>

          <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Total</label>
                    <div class="col-sm-4">
                         <input type="text" class="form-control" id="documento" maxlength="20 " name="telofi" onkeypress="return valida(event)" 
                         readonly="readonly">
                    </div>
                    <label for="password" class="col-sm-2 control-label">Recibido</label>
                    <div class="col-sm-4">
                         <input type="text" class="form-control" id="documento" maxlength="20 " name="telofi" onkeypress="return valida(event)" 
                         >

                    </div>
          </div>

          
                <button type="submit"  class="btn btn-success btn-sm" name="crearcliente">Submit</button>
                  

                  <div class="col-xs-12 col-ms-12 col-md-12 col-lg-12 ">
                    <div class="table-responsive">
                         <table class="table table-striped"><br><br> 
                            
                            <tr><td>NOMBRE</td><td>VALOR</td><td>CANTIDAD</td><td>SUBTOTAL</td><td></td></tr>


                          </table>
                    </div></div>
           
                

            </form>
         </div>
  
         </div>
     </div>

</div>                 <!-- FIN   FORMULARIO PARA CREAR-->


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
