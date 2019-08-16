<?php ob_start(); ?> 
<?php
function asignaEdad(){
	global $vacio;


}
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
	<link rel="stylesheet" href="../../css/bootstrap.min.css">
	<script src="../../js/vendor/modernizr-2.8.3.min.js"></script>
	<script src="../../js/jquery.1.11.1.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			var sal = document.getElementById('idsaldo').value; 
			if(sal==0){
				$("#ocultar").hide();
					$("#campo_eliminar").hide();
					$(".boton2").hide();


			}


			$('#mostrar').click(function(){


            ///////////////////////////////////campo_eliminar
            $('#paracrearabono').fadeIn() 
        })  

			var today = new Date(); 
			var dd = today.getDate(); 
            var mm = today.getMonth()+1;//January is 0! 
            var yyyy = today.getFullYear(); 
            if(dd<10){dd='0'+dd} 
            	if(mm<10){mm='0'+mm} 
            		var fecha=yyyy+'-'+mm+'-'+dd;
           // alert('Today is '+mm+'/'+dd+'/'+yyyy) 
           document.frmabono.txtfecha.value =fecha;
           

       })
	</script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#btnprocesarjs").click(function(){

              //var valossaldo=document.getElementById('iddelprestamo').value;

              $("#btnprocesar").click(); 
          }) ;


		})
	</script>
	<script>
		function cargar(div, destino){
			$(div).load(destino);   
		}
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
<script type="text/javascript">
	$(document).ready(function(){
		$('#bbbb').click(function(){

             //http://localhost:8080/tarea/php/DafecglorCaja1=1&valorCaja2=3   3015487605
             var id_prestamo=document.getElementById('iddelprestamo').value;

             $.ajax({
             	type:  "GET",
             	url:   "http://localhost:8080/tarea/php/Datos/ProcesoAjax.php",
             	data: {"valorCaja1" : id_prestamo,"valorCaja2":'3'},
             	success:  function (response) {
             		if(response==null){
             			alert("vacio");
             		}else{
             			response = $.parseJSON(response)
             			$('#tableabono > tbody:last').append('<tr><td>'+response.IdAbono+'</td><td>'+response.IdPrestamo+'</td><td>'+response.ValorAbono+'</td><td>'+response.PendientePagar+'</td><td>'+response.FechaAabono'</td></tr>')

             		}
             	},  
             	error: function(objeto, quepaso, otroobj){
             		alert("Estas viendo esto por que fallé"+valor);
             	}

             });

             event.stopPropagation(); });         

})    

</script>

<script type="text/javascript">
	$(document).ready(function(){
		$(".boton2").click(function(){

			var valor = [];
			var i=0;
             // Obtenemos todos los valores contenidos en los <td> de la fila
            // seleccionada

            $(this).parents("tr").find("td").each(function(){
                //valores+=$(this).html()+"\n";
                valor[i]=$(this).html();
                i++;
                
            });
           // for(var a=0;a<=2;a++){id_modal_idprestamo_eliminar
            //alert( valor[a]);
            //}
           // alert("ggg");
           $("#id_modal_idabono_eliminar").val(valor[0]);
           $("#id_modal_idprestamo_eliminar").val(valor[1]);
           $("#id_modal_valor_eliminar").val(valor[2]);
           $("#id_modal_fecha_eliminar").val(valor[4]);


       });
	});

</script>




</head>   
<body>
	<?php require_once dirname(__FILE__) . '/plantilla.php';?>


	<?php


	require_once '../Negocio/Prestamo.php';

	$dato = new Prestamo();
	$d = $_GET['d1'];
	$info_json=$dato->ValidarConsultarClienteP_id($d);
	$decode= json_decode($info_json);
	$codigo=$decode->CodigoPrestamo;
	$fecha=$decode->FechaPrestamo;
	$valor=$decode->ValorPrestamo;
	$estado=$decode->EstadoPrestamo;
	$porcentaje=$decode->PorcentajePrestamo;
	$valortotal=$decode->ValorTotalprestamo;
	$saldo=$decode->SaldoPrestamo;
	$cuota=$decode->CuotasPrestamo;
	$abonadas=$decode->CuotasAbonadas;
	$Tipo=$decode->Tipo;
	$CxU=$decode->CxU;
	$descripcion=$decode->DescripcionPrestamo;

                                            /* if($saldo==0){
                                              //mostrar    ocultar
                                              ?>
                                               <script>
                                                $('#mostrar').fadeOut() 
                                             //  var elDiv = document.getElementById('mostrar'); //se define la variable "elDiv" igual a nuestro div
                                               // elDiv.style.display='block'; //damos un atributo display:none que oculta el div   
                                              alert("yoyo");
                                               </script>
                                              <?php

                                          }*/







                                          ?>; 

                                          <!--  FINI DEL MENU-->
                                          <div id="paracrearcliente"  >
                                          	<div class="container">

                                          		<div class="panel panel-danger">
                                          			<div class="panel-heading">
                                          				<h3 class="panel-title"><b>DETALLES DEL PRESTAMO</b></h3>
                                          			</div>
                                          			<div class="panel-body">

                                          				<form class="form-horizontal" role="form" method="POST">
                                          					<div class="form-group">
                                          						<label for="name" class="col-sm-2 control-label">id</label>
                                          						<div class="col-sm-10">
                                          							<input type="text" id="iddelprestamo" class="form-control" maxlength="15" name="ced" readonly="readonly"
                                          							value= <?php  echo $d  ?> >

                                          						</div>
                                          					</div>

                                          					<form class="form-horizontal" role="form" method="POST">
                                          						<div class="form-group">
                                          							<label for="name" class="col-sm-2 control-label">Codigo</label>
                                          							<div class="col-sm-10">
                                          								<input type="text" class="form-control" maxlength="15" name="ced" readonly="readonly"
                                          								value= <?php  echo $codigo    ?> >

                                          							</div>
                                          						</div>

                                          						<div class="form-group">
                                          							<label for="password" class="col-sm-2 control-label">Fecha</label>
                                          							<div class="col-sm-10">
                                          								<input type="text" class="form-control"  maxlength="20" name="nom" readonly="readonly"
                                          								value= <?php  echo $fecha   ?> >
                                          							</div>
                                          						</div>



                                          						<div class="form-group">
                                          							<label for="password" class="col-sm-2 control-label">Valor </label>
                                          							<div class="col-sm-10">
                                          								<input type="text" class="form-control" maxlength="20" name="ape" readonly="readonly"
                                          								value= <?php  echo $valor    ?> >
                                          							</div>
                                          						</div>

                                          						<div class="form-group">
                                          							<label for="password" class="col-sm-2 control-label">Estado </label>
                                          							<div class="col-sm-10">
                                          								<input type="text" class="form-control" maxlength="20"  name="dirres" readonly="readonly"
                                          								value= <?php  echo $estado   ?> >
                                          							</div>
                                          						</div>

                                          						<div class="form-group">
                                          							<label for="password" class="col-sm-2 control-label">Porcentaje</label>
                                          							<div class="col-sm-10">
                                          								<input type="text" class="form-control"  maxlength="20"  name="telres" readonly="readonly"
                                          								value= <?php  echo $porcentaje   ?> >
                                          							</div>
                                          						</div>

                                          						<div class="form-group">
                                          							<label for="password" class="col-sm-2 control-label">Valor Total</label>
                                          							<div class="col-sm-10">
                                          								<input type="text" class="form-control" maxlength="20" name="dirofi" readonly="readonly"
                                          								value= <?php  echo $valortotal    ?> >
                                          							</div>
                                          						</div>

                                          						<div class="form-group">
                                          							<label for="password" class="col-sm-2 control-label">Saldo</label>
                                          							<div class="col-sm-10"> 
                                          								<input type="text" class="form-control" id="idsaldo" maxlength="20 " name="telofi"  readonly="readonly"
                                          								value= <?php  echo $saldo   ?> >
                                          							</div>
                                          						</div>
                                          						<div class="form-group">
                                          							<label for="password" class="col-sm-2 control-label">Cuotas</label>
                                          							<div class="col-sm-10">
                                          								<input type="text" class="form-control" id="documento" maxlength="20 " name="telofi" readonly="readonly"
                                          								value= <?php  echo $cuota   ?> >
                                          							</div>
                                          						</div>
                                          						<div class="form-group">
                                          							<label for="password" class="col-sm-2 control-label">Abonadas</label>
                                          							<div class="col-sm-10">
                                          								<input type="text" class="form-control" id="documento" maxlength="20 " name="telofi" readonly="readonly"
                                          								value= <?php  echo $abonadas   ?> >
                                          							</div>
                                          						</div>
                                          						<div class="form-group">
                                          							<label for="password" class="col-sm-2 control-label">Tipo</label>
                                          							<div class="col-sm-10">
                                          								<input type="text" class="form-control" id="tipo" maxlength="20 " name="telofi" readonly="readonly"
                                          								value= <?php  echo $Tipo   ?> >
                                          							</div>
                                          						</div>

                                          						<div class="form-group">
                                          							<label for="password" class="col-sm-2 control-label">Cuota x unidad</label>
                                          							<div class="col-sm-10">
                                          								<input type="text" class="form-control" id="cxu" maxlength="20 " name="telofi" readonly="readonly"
                                          								value= <?php  echo $CxU   ?> >
                                          							</div>
                                          						</div><div class="form-group">
                                          						<label for="password" class="col-sm-2 control-label">Descripcion</label>
                                          						<div class="col-sm-10">
                                          							<textarea class="form-control" rows="5" id="comment" readonly="readonly"
                                          							><?php  echo $descripcion   ?></textarea>
                                          						</div>
                                          					</div>





                                          				</form>
                                          			</div>

                                          		</div>
                                          	</div>

                                          </div>   
                                          <!-- FIN   FORMULARIO PARA CREAR-->
                                          <div class="container">
                                          	<div class="row">
                                          		<div class="col-xs-12 col-ms-12 col-md-12 col-lg-12 ">
                                          			<a class="btn btn-danger " href="ModuloPrestamo.php">REGRESAR</a>
                                          		</div>
                                          	</div>
                                          </div>
                                          <br>
                                          <div id="ocultar" class="container">
                                          	<div class="row">
                                          		<div class="col-xs-12 col-ms-12 col-md-12 col-lg-12 ">
                                          			<div class="table-responsive">

                                          				<button  id="mostrar" class="btn btn-success " name="procesar">CREAR ABONO</button>


                                          			</div></div>
                                          			<div class="col-xs-12 col-ms-12 col-md-12 col-lg-12 ">
                                          				<div class="table-responsive">
                                          					<br>




                                          				</div></div>
                                          			</div>
                                          		</div>

                                          		<!--  FORMULARIO PARA CREAR-->
                                          		<div id="paracrearabono" style="display:none;">
                                          			<div class="container">

                                          				<div class="panel panel-default">
                                          					<div class="panel-heading">
                                          						<h3 class="panel-title">CREACION DE ABONO</h3>
                                          					</div>
                                          					<div class="panel-body">

                                          						<form class="form-horizontal" name="frmabono" role="form" method="POST">
                                          							<div class="form-group">
                                          								<label for="name" class="col-sm-2 control-label">Id prestamo</label>
                                          								<div class="col-sm-10">
                                          									<input type="text"  id="txtidprestamo" class="form-control" maxlength="10" name="idprestamo" readonly="readonly"
                                          									value=<?php  echo $d;   ?>>

                                          								</div>
                                          							</div>

                                          							<div class="form-group">
                                          								<label for="password" class="col-sm-2 control-label">Valor sugerido</label>
                                          								<div class="col-sm-10">
                                          									<input type="text" class="form-control"  maxlength="10" name="password" readonly="readonly"
                                          									value= <?php  echo $CxU   ?> >
                                          								</div>
                                          							</div>



                                          							<div class="form-group">
                                          								<label for="password" class="col-sm-2 control-label">valor abonar</label>
                                          								<div class="col-sm-10">
                                          									<input type="text" class="form-control" maxlength="10" name="valorabonar" onkeypress="return valida(event)" >
                                          								</div>
                                          							</div>

                                          							<div class="form-group">
                                          								<label for="password" class="col-sm-2 control-label">fecha</label>
                                          								<div class="col-sm-10">
                                          									<input type="text" id="txtfecha" class="form-control" maxlength="50"  name="fecha" readonly="readonly" >
                                          								</div>
                                          							</div>




                                          							<div class="panel-footer" style="overflow:hidden;text-align:right;">
                                          								<div class="form-group">
                                          									<div class="col-sm-offset-2 col-sm-10">
                                          										<button type="button"  class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal" >
                                          											CREAR
                                          										</button>
                                          										<button type="submit" id="btnprocesar"  class="btn btn-success btn-sm" name="procesarabono" style="display:none;" >Submit</button>

                                          										<button type="submit" class="btn btn-default btn-sm">Cancelar</button>
                                          									</div>
                                          								</div>  
                                          							</div>

                                          						</form>
                                          					</div>

                                          				</div>
                                          			</div>

                                          		</div>                 <!-- FIN   FORMULARIO PARA CREAR-->

                                          		

                                          		<div id="infoabonos"  >
                                          			<div id="esquemausuario" class="container">
                                          				<div class="row">
                                          					<div class="col-xs-12 col-ms-12 col-md-12 col-lg-12 ">
                                          						<div class="panel panel-success">
                                          							<div class="panel-heading"><h4>INFORMACION DE LOS ABONOS</h4>
                                          							</div>
                                          							<div class="table-responsive">
                                          								<table  id="tableabono" class="table" >
                                          									<tr><th style="display:none;">ID</th ><th style="display:none;">IdPrestamo</th><th>Valor__Abono</th><th>PendientePagar</th><th>FechaAabono</th><th  id="campo_editar">Editar</th><th  id="campo_eliminar">Eliminar</th></tr>
                                          									<?php
                                          									require_once '../Negocio/Abono.php';
                                          									$datoprestamo = new Abono();
                                          									$datoprestamo->ValidarConsultarAbonos($d);


                                          									?>


                                          								</table>
                                          							</div>
                                          						</div>
                                          					</div>
                                          				</div>
                                          			</div>     






                                          			<!-- Modal -->
                                          			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                          				<div class="modal-dialog">
                                          					<div class="modal-content">
                                          						<div class="modal-header">
                                          							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                          							<h4 class="modal-title" id="myModalLabel">CONFIRMAR</h4>
                                          						</div>
                                          						<div class="modal-body">
                                          							¿Esta seguro que desea crear un nuevo abono?
                                          						</div>
                                          						<div class="modal-footer">
                                          							<button type="button" class="btn btn-default" data-dismiss="modal">SALIR</button>

                                          							<button id="btnprocesarjs"  class="btn btn-success btn-sm" >CREAR</button>
                                          						</div>
                                          					</div>
                                          				</div>
                                          			</div>

                                          			<!-- /.MODAL ELIMINAR ABONO --> 
                                          			<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
                                          				<div class="modal-dialog">
                                          					<div class="modal-content">
                                          						<div class="modal-header">
                                          							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                          							<h4 class="modal-title custom_align" id="Heading">ELIMINAR ABONO</h4>
                                          						</div>
                                          						<div class="modal-body">
                                          							<form class="form-horizontal" role="form" method="POST">
                                          							<div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Esta seguro que desea eliminar el abono?
                                          							</div>
                                          							<input id="id_modal_idprestamo_eliminar" type="text"  class="form-control" maxlength="10" name="modal_idprestamo_eliminar" readonly="readonly"/>
                                          							<input id="id_modal_idabono_eliminar" type="text"  class="form-control" maxlength="10"  name="modal_idabono_eliminar" readonly="readonly"/>
                                          							<label for="text" class="col-sm-12" control-label>Abono</label>
                                          							<input id="id_modal_valor_eliminar" type="text" class="form-control" maxlength="10" name="modal_valor_eliminar" readonly="readonly"/>
                                          							<label for="text" class="col-sm-12" control-label>Fecha</label>
                                          							<input id="id_modal_fecha_eliminar" type="text"  class="form-control" maxlength="10" readonly="readonly"/>

                                          						</div>
                                          						<div class="modal-footer ">
                                          							<button type="submit" class="btn btn-success" name="modalBtnEliminar"><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
                                          							<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
                                          						</div>
                                          						</form>
                                          					</div>

                                          				</div>
                                          				<!-- /.fin --> 


                                          				
                                          					<?php 


                                          					require_once '../Negocio/Abono.php';
                                          					require_once '../Negocio/Prestamo.php';
                                          					if ( isset( $_POST['procesarabono']  ) ) {

                                          						$valorabonar    = $_POST['valorabonar'] ;

                                          						if($saldo<$valorabonar){
                                          							?>
                                          							<script>
                                          								alert("VERIFIQUE EL VALOR A ABONAR. PROCESO FALLO");
                                          							</script>
                                          							<?php 
                                          						}
                                          						else{

                                          							$idprestamo      = $_POST['idprestamo'];
                                          							$valorabonar    = $_POST['valorabonar'] ;
                                          							$fechaabono     = $_POST['fecha'];
                                          							$pendiente = $saldo - $valorabonar;

                                          							if($pendiente==0){
                                          								$datoactualizarcuota= new Prestamo();
                                          								$datoactualizarcuota->ValidarActualizarEstadoPrestamo($idprestamo,"TERMINADO");
                                          							}


                                          							$datoabono =new Abono();
                                          							$datoabono->ValidarInsertarAbono($idprestamo, $valorabonar,$pendiente ,$fechaabono);
     //  mando el insert de abono
                                          							$datoactualizarsaldoprestamo= new Prestamo();
                                          							$datoactualizarsaldoprestamo->ValidarActualizarPrestamosaldo($pendiente, $idprestamo);

                                          							$datoactualizarcuota= new Prestamo();
                                          							$datoactualizarcuota->ValidarActualizarRegistroCuota($idprestamo);




                                          							header ("Location:../Presentacion/ModuloDetallePrestamo.php?d1=".$idprestamo);


                                          						}







                                          					}
                                          					if ( isset( $_POST['modalBtnEliminar']  ) ) {
                                          						$abono_eliminar=new Abono();
                                          						$abono_eliminar->ValidarEliminarAbono($_POST['modal_idabono_eliminar'],$_POST['modal_idprestamo_eliminar'],$_POST['modal_valor_eliminar']);
                                          					
                                          						header ("Location:../Presentacion/ModuloDetallePrestamo.php?d1=".$_POST['modal_idprestamo_eliminar']);
                                          						}



                                          					?>
                                          					<button id="bbbb" style="display:none;"  class="btn btn-success btn-sm" >actualizar</button>





                                          					<script>window.jQuery || document.write('<script src="../../js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
                                          					<script src="../../js/vendor/bootstrap.js"></script>
                                          					<script src="../../js/plugins.js"></script>
                                          					
                                          					<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. <script src="../../js/main.js"></script> -->
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