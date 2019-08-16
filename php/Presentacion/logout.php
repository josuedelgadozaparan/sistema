<?php
session_start();

unset($_SESSION['aaa']);
unset($_SESSION['bbb']);
session_unset();
session_destroy();
$parametros_cookies = session_get_cookie_params(); 
setcookie(session_name(),0,1,$parametros_cookies["path"]);


/*
<?php 
@session_start();
$_SESSION = array();
@session_unset();
@session_destroy();
@setcookie(session_name(),'',0,'/'); @session_write_close();
header("Location:../../index.php");
?>__________


<div class="container derecha">
              <div class="row">
                     <div class="col-xs-12 col-ms-12 col-md-12 col-lg-12 ">
                        <b>Bienvenido:</b>
                        <?php  
				@session_start();
			  $id__session=$_SESSION["aaa"] ;
                           if($id__session==""){
                           //header("Location: ../../index.php");
			  //echo "fallo";
				echo $_SESSION["aaa"];
                           }else{
                            echo "<b>".$_SESSION["bbb"] ."</b>";
                           }
                           ?>
                               <br>
                        <a href="logout.php"><b>Cerrar Sesión</b></a>
                     </div>
              </div>
      </div>
*/



 //header("HTTP/1.1 302 Moved Temporarily");
header("Location:../../index.php");
?>