<?php session_start();?>
<!doctype html>
<html class="no-js" lang="">
    <head>
    </head>
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
     <div class="container derecha">
              <div class="row">
                     <div class="col-xs-12 col-ms-12 col-md-12 col-lg-12 ">
                        <b>Bienvenido:</b>
                        <?php  
                           $id__session=$_SESSION["aaa"] ;
                           if($id__session==""){
                           header("Location: ../../index.php");
                           }else{
                            echo "<b>".$id__session."</b>";
                           }
                           ?>
                               <br>
                        <a href="logout.php"><b>Cerrar Sesión</b></a>
                     </div>
              </div>
      </div>
       

<!--  INICIO DEL @ MENU-->
 <div class="container">
       <nav class="navbar navbar-default" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Desplegar navegaciÃ³n</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
               </button>
               <a class="navbar-brand" href="#"><b>MENU</b></a>
            </div>
 
          
             <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                  <li class="dropdown">
                       <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>PRINCIPAL</b> <b class="caret"></b></a>
                         <ul class="dropdown-menu">
                            <li><a href="principal.php">Princpal</a></li>
                         </ul>
                   </li>

                      <li class="dropdown" style="display:none;">
                       <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>USUARIO</b><b class="caret"></b></a>
                         <ul class="dropdown-menu">
                            <li id="block_usuario"><a class="off_usuario" href="ModuloUsusarioTabla.php">Usuario</a></li>
                         </ul>
                   </li>

                   <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>CLIENTE</b><b class="caret"></b>  </a>
                         <ul class="dropdown-menu">
                            <li><a href="ModuloCliente.php">Clientes</a></li>
                            <li class="divider"></li>
                            <li><a href="ModuloCedula.php">Cedula</a></li>
                             
                         </ul>
                  </li>

                 <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>PRESTAMO</b><b class="caret"></b>  </a>
                         <ul class="dropdown-menu">
                            <li><a href="ModuloPrestamo.php">Prestamo</a></li>
                           
                         </ul>
                  </li>
                   <li class="dropdown" style="display:none;">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>INVENTARIO</b><b class="caret"></b>  </a>
                         <ul class="dropdown-menu">
                            <li><a href="ModuloInventario.php">Inventario</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Busqueda</a></li>
                             
                         </ul>
                  </li>

                  <li class="dropdown" style="display:none;">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b> FACTURACION </b> <b class="caret"></b> </a>
                         <ul class="dropdown-menu">
                          <li><a href="ModuloLinea.php">Linea</a></li>
                            <li class="divider"></li>
                            <li><a href="ModuloFactura.php">Factura</a></li>
                            <li class="divider"></li>
                            <li><a href="ModuloConsecutivo.php">Consecutivo</a></li>
                       </ul>
                 </li>

                  <li class="dropdown">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>INFORME</b><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="ModuloInforme.php">Informe</a></li>
                            
                       </ul>
                  </li>

            </ul>
          </div>
       </nav>
 </div>
<!--  FINI DEL MENU-->
  </body>
</html>

