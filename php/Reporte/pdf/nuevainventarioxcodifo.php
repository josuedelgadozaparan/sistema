<?php
require('fpdf.php');
class PDF extends FPDF
{
}
$c=$_GET['cod'];

$idpres=0;

$pdf = new PDF('L','mm','A4');
//$pdf = new PDF('p','mm','Letter'); verical
$pdf->SetMargins(10,10);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFillColor(0, 126, 216);
$pdf->SetFont("Arial","b",15);
$pdf->Cell(0,5,"REPORTE DE VENTA DE LA FECHA  realizado el dia ".date("d-m-Y H:i") ,0,1,'C');
$pdf->SetFont("Arial","b",9);
$pdf->Ln();
$pdf->Cell(50,5,"factura",1,0,'C')  ;
$pdf->Cell(20,5,"Cantidad",1,0,'C')  ;
$pdf->Cell(30,5,"Subtotal",1,0,'C')  ;
$pdf->Cell(30,5,"ValorIva",1,0,'C') ;
$pdf->Cell(30,5,"ValorTotal",1,0,'C')  ;
$pdf->Cell(40,5,"FechaHora",1,0,'C')  ;
$pdf->Cell(30,5,"Cedula",1,0,'C')  ;
 

$pdf->Ln();



$ced=$c; 
$id="";
$tipo='3'; 
$fecin=""; 
$fecout="";
$connection = mysqli_connect("mysql.1freehosting.com", "u129906098_pres", "a123456789", "u129906098_pres");
$result = mysqli_query($connection,
"CALL INFORME_CONSULTAR('".$tipo."','".$ced."','".$fecin."','".$fecout."');") or die("Query fail: " . mysqli_error());
while ($row = mysqli_fetch_array($result)){  

$idpres=$row['IdProducto'];
$pdf->Cell(50,5,$row['NombreProducto'],1,0,'C')	;
$pdf->Cell(20,5,$row['ValorProducto'],1,0,'C')	;
$pdf->Cell(30,5,$row['CantidadProducto'],1,0,'C');
$pdf->Cell(30,5,$row['CantidadMinima'],1,0,'C');
$pdf->Cell(30,5,$row['MarcaProducto'],1,0,'C');
$pdf->Cell(40,5,$row['CodigoProducto'],1,0,'C');
$pdf->Cell(30,5,$row['NombreLinea'],1,0,'C');


 
  $pdf->Ln();

}


  



$pdf->Ln();	
$pdf->Ln();	

$pdf->Output();
/*
SELECT a.ValorAbono,a.PendientePagar,a.FechaAabono from abono a,prestamo p, cliente c where
a.IdPrestamo=p.IdPrestamo and p.Idcliente= c.IdCliente and c.CedulaCliente=10102020 and a.IdPrestamo=20*/
	
?>