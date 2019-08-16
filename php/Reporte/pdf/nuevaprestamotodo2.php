<?php
require('fpdf.php');
class PDF extends FPDF
{
}

    $host="localhost";
    $user="root";
    $pass="";
    $database="sistemaprestamo";
    /*
    $host="mysql.1freehosting.com";
    $user="u129906098_pr";
    $pass="a123456789";
    $database="u129906098_pr";
    */
$idpres=0;
$aco_debe=0;
$aco_valor=0;
$aco_abonado=0;
$aco_valor_in=0;

$pdf = new PDF('L','mm','A4');
//$pdf = new PDF('p','mm','Letter'); verical
$pdf->SetMargins(10,10);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFillColor(0, 126, 216);
$pdf->SetFont("Arial","b",15);
$pdf->Cell(0,5,"REPORTE DE LA CEDULA -----".date("d-m-Y H:i") ,0,1,'C');

$pdf->Ln();
$pdf->SetFont("Arial","b",9);
$pdf->Ln();





//$pdf->Cell(25,5,"Cedula",1,0,'C')  ;
$pdf->Cell(20,5,"Nombre",1,0,'C')  ;
$pdf->Cell(30,5,"Apellido",1,0,'C')  ;
//$pdf->Cell(50,5,"COD",1,0,'C')	;
$pdf->Cell(20,5,"Fecha",1,0,'C')	;
$pdf->Cell(20,5,"Estado",1,0,'C')	;
$pdf->Cell(7,5,"%%",1,0,'C')	;
$pdf->Cell(25,5,"Valor",1,0,'C')	;

$pdf->Cell(30,5,"TOTAL",1,0,'C')	;
$pdf->Cell(30,5,"DEBE",1,0,'C')	;
$pdf->Cell(30,5,"ABONADO",1,0,'C')	;
$pdf->Cell(12,5,"Cuotas",1,0,'C')	;  //  
$pdf->Cell(12,5,"Abono",1,0,'C')	;  // 
//$pdf->Cell(20,5,"Tipo",1,0,'C')	;  // 
//$pdf->Cell(15,5,"CxU",1,0,'C')	;  //
//$pdf->Cell(15,5,"CxU",1,0,'C')  ;  //

$connection = mysqli_connect($host, $user ,  $pass,$database );
$result = mysqli_query($connection,
 "CALL REPORTE_PRESTAMOS_TODOS();") or die("Query fail: " . mysqli_error());
while ($row = mysqli_fetch_array($result)){  
$pdf->SetFont("Arial","b",9);
$pdf->Ln();
/*
if($row['SaldoPrestamo']==0){
$abonado=0;
}else{
$abonado=$row['ValorTotalprestamo']-$row['SaldoPrestamo'];

}*/

$abonado=$row['ValorTotalprestamo']-$row['SaldoPrestamo'];

$idpres=$row['IdPrestamo'];
//$pdf->Cell(25,5,$row['CedulaCliente'],1,0,'C') ;
$pdf->Cell(20,5,$row['NombreCliente'],1,0,'C')  ;
$pdf->Cell(30,5,$row['ApellidoCliente'],1,0,'C');//CantidadProducto   MarcaProducto
//$pdf->Cell(50,5,$row['CodigoPrestamo'],1,0,'C')	;
$pdf->Cell(20,5,$row['FechaPrestamo'],1,0,'C')	;
$pdf->Cell(20,5,$row['EstadoPrestamo'],1,0,'C');
$pdf->Cell(7,5,$row['PorcentajePrestamo'],1,0,'C');
$pdf->Cell(25,5,$row['ValorPrestamo'],1,0,'C');//CantidadProducto   MarcaProducto

$pdf->Cell(30,5,$row['ValorTotalprestamo'],1,0,'C');
$pdf->Cell(30,5,$row['SaldoPrestamo'],1,0,'C');
$pdf->Cell(30,5,$abonado,1,0,'C');
$pdf->Cell(12,5,$row['CuotasPrestamo'],1,0,'C');
$pdf->Cell(12,5,$row['CuotasAbonadas'],1,0,'C');
//	$pdf->Cell(20,5,$row['Tipo'],1,0,'C');
//$pdf->Cell(15,5,$row['CxU'],1,0,'C');
//$pdf->Cell(15,5,$row['IdPrestamo'],1,0,'C')  ;  //

$aco_valor=$aco_valor+$row['ValorPrestamo'];
$aco_valor_in=$aco_valor_in+$row['ValorTotalprestamo'];

$aco_debe=$aco_debe+$row['SaldoPrestamo'];


$aco_abonado=$aco_abonado+$abonado;




  

}

$pdf->Ln();	
$pdf->Ln();	
$pdf->SetFont("Arial","b",9);
$pdf->SetDrawColor(255,0,0);
$pdf->SettextColor(255,0,0);
$pdf->Cell(50,5,"TOTAL",1,0,'C')  ;
$pdf->Cell(20,5,"",0,0,'C')  ;
$pdf->Cell(27,5,"",0,0,'C')  ;
$pdf->Cell(25,5,$aco_valor,1,0,'C')  ;
$pdf->Cell(30,5,$aco_abonado,1,0,'C')  ;
$pdf->Cell(30,5,$aco_debe,1,0,'C')  ;
$pdf->Cell(30,5,$aco_abonado,1,0,'C')  ;






$pdf->Output();
/*
SELECT a.ValorAbono,a.PendientePagar,a.FechaAabono from abono a,prestamo p, cliente c where
a.IdPrestamo=p.IdPrestamo and p.Idcliente= c.IdCliente and c.CedulaCliente=10102020 and a.IdPrestamo=20*/
	
?>