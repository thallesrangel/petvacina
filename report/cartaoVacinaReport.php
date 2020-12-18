<?php

use setasign\Fpdi\Fpdi;

require_once 'vendor/autoload.php';

$pdf = new Fpdi();

$pdf->AddPage('L');
$pdf->setSourceFile("report/cartaoFront.pdf");
$tplIdx = $pdf->importPage(1);
$pdf->useTemplate($tplIdx, 5, 5, 290);

/**
 * Dados animal
 * 
*/


$pdf->addPage('L');
$pdf->setSourceFile("report/cartaoVerso.pdf");

$tplId = $pdf->importPage(1);
$pdf->useTemplate($tplId, 5, 5, 290);

$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(255, 0, 0);

foreach ($vacinas as $item) 
{
    // Nome Vacina
    $pdf->SetXY(12, 20 + ($pdf->getY()));
    $pdf->Cell(5,0,$item['titulo_vacina'],0,1,"L");

    // Nome Méd Veterinário
    $pdf->SetXY(54, $pdf->getY());
    $pdf->Cell(5,0,utf8_decode($item['nome_veterinario']),0,1,"L");

    // Data Aplicação
    $pdf->SetXY(54, 10 + ($pdf->getY()));
    $pdf->Cell(5,0, $item['data_aplicacao'],0,1,"L");
}

$pdf->Output();  