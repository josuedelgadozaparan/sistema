<?php
require('fpdf.php');
class PDF extends FPDF
{
}
$i=$_GET['id'];



$pdf = new PDF('L','mm','A4');
//$pdf = new PDF('p','mm','Letter'); verical
$pdf->SetMargins(20,20);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFillColor(0, 126, 216);
$pdf->SetFont("Arial","b",15);
$pdf->Cell(0,5,"INFORME DE FACTURA \n".date("d-m-Y H:i") ,0,1,'C');
$pdf->SetFont("Arial","b",9);
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(0,5,"INFORME DE FACTURA ".date("d-m-Y H:i") ,0,0,'C');
$pdf->Ln();
$pdf->Cell(0,5,"INFORME DE FACTURA ".date("d-m-Y H:i") ,0,0,'C');
$pdf->Ln();
$pdf->Cell(0,5,"INFORME DE FACTURA ".date("d-m-Y H:i") ,0,0,'C');
$pdf->Ln();
$pdf->Cell(0,5,"INFORME DE FACTURA ".date("d-m-Y H:i") ,0,0,'C');
$pdf->Ln();
$pdf->Cell(0,5,"INFORME DE FACTURA ".date("d-m-Y H:i") ,0,0,'C');
$pdf->Ln();
$pdf->Cell(0,5,"FACTURA DE VENTA " ,0,0,'L');
$pdf->Ln();
$pdf->Cell(0,5,"NEGOCIO: " ,0,0,'L');
$pdf->Ln();
$pdf->Cell(0,5,"NIT " ,0,0,'L');
$pdf->Ln();
$pdf->Cell(0,5,"TELEFONO ",0,0,'L');
$pdf->Ln();
$pdf->Cell(0,5,"TELEFONO ",0,0,'L');
$pdf->Ln();
$pdf->Ln();





$pdf->Cell(70,5,"DESCRIPCION ",1,0,'C')  ;
$pdf->Cell(70,5,"CANTIDAD",1,0,'C')  ;
$pdf->Cell(70,5,"VALOR",1,0,'C')  ;
$pdf->Ln();



$cod=""; 
$id=$i;
$tipo='0'; 
$fecin=""; 
$fecout="";
$cantidadtotal=0;
$subtotal=0;
$bruto=0;
$iva=0;
$recibido=0;
$Entregado=0;
$nombrecliente="";
$cedulacliente=0;
$Nombreusuario="";
usleep(2000000);

$connection = mysqli_connect("mysql.1freehosting.com", "u129906098_pres", "a123456789", "u129906098_pres");
$result = mysqli_query($connection,
"CALL TIQUETE_CONSULTAR('".$tipo."','".$cod."','".$id."');") or die("Query fail: " . mysqli_error());
while ($row = mysqli_fetch_array($result)){  


$pdf->Cell(70,5,$row['NombreProducto'],1,0,'C');
$pdf->Cell(70,5,$row['Cantidad'],1,0,'C');
$pdf->Cell(70,5,$row['Subtotal'],1,0,'C');
$cantidadtotal=$cantidadtotal+$row['Cantidad'];
$subtotal=$subtotal+$row['Subtotal'];
$recibido=$row['Recibido'];
$Entregado=$row['Entregado'];
$nombrecliente=$row['NombreCliente'];
$cedulacliente=$row['CedulaCliente'];
$Nombreusuario=$row['NombreUsuario'];


 
  $pdf->Ln();

}
$pdf->Ln();
$pdf->Ln();
$bruto=$subtotal*0.84;
$iva=$subtotal*0.16;

$pdf->SetFont("Arial","b",12);
$pdf->Cell(0,5,"Bruto: $".$bruto ,0,0,'L');
$pdf->Ln();
$pdf->Cell(0,5,"Iva: $".$iva ,0,0,'L');
$pdf->Ln();
$pdf->Cell(0,5,"Total: $".$subtotal ,0,0,'L');
$pdf->Ln();
$pdf->Cell(0,5,"Recibido: $".$recibido ,0,0,'L');
$pdf->Ln();
$pdf->Cell(0,5,"Cliente: $".$Entregado ,0,0,'L');
$pdf->Ln();
$pdf->Cell(0,5,"Cambio: $".$nombrecliente ,0,0,'L');
$pdf->Ln();
$pdf->Cell(0,5,"Cedula: $".$cedulacliente ,0,0,'L');
$pdf->Ln();
$pdf->Cell(0,5,"Vendedor: $".$Nombreusuario ,0,0,'L');


  



$pdf->Ln();	
$pdf->Ln();	

$pdf->Output();
/*
SELECT a.ValorAbono,a.PendientePagar,a.FechaAabono from abono a,prestamo p, cliente c where
a.IdPrestamo=p.IdPrestamo and p.Idcliente= c.IdCliente and c.CedulaCliente=10102020 and a.IdPrestamo=20*/
	
?>