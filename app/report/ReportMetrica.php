<?php

require 'vendor/autoload.php';

class ReportMetrica extends FPDF
{  
    function header(){
        $this->SetTitle(utf8_decode(NOME_APP . " | Report Métrica"));
        $this->Image(BASE_URL."assets/img/logoLow.png",10,6);
        $this->SetFont('Arial','',12);
        $this->Cell(276,5, utf8_decode("Relatório | Métrica"),0,0,'C');
        $this->Ln();
        $this->setFont('Arial','',10);
        $this->Cell(276,10, utf8_decode('Quem cuida, vacina.'));
        $this->Ln(15);
    }
    function footer(){
        $this->SetY(-15);
        $this->SetFont('Arial','',8);
        $this->Cell(0,10, utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
        $this->Cell(0,5,utf8_decode("Usuário: ".$_SESSION['nome_usuario']),0,0,'R');
        $this->Cell(0,15,"Emitido em: ".date("d/m/Y H:i:s"),0,0,'R');
    }

    function headerTable() { 
        $this->SetFont('Arial', 'B', 8);
        $this->Cell(30,8, utf8_decode('Animal'),1,0,'L');
        $this->Cell(13,8, 'Altura',1,0,'L');
        $this->Cell(20,8,'Comprimento',1,0,'L');
        $this->Cell(20,8, utf8_decode('Data Medida'),1,0,'L');
        $this->Cell(18,8, utf8_decode('Remedida'),1,0,'L');
        $this->Ln();
    }

    function viewTable()
    { 
        $this->SetFont('Arial', '', 6);

        $proprietario = $_POST['proprietario'];

        $metrica = new Metrica();
        $dados = $metrica->listarReport($proprietario);
   
        foreach($dados as $value) {
            $this->Cell(30,7,$value['nome_animal'],1,0,'L');
            $this->Cell(13,7,$value['altura'] . " - " . $value['alturaUnidade'],1,0,'L');
            $this->Cell(20,7,$value['comprimento'] . " - " . $value['comprimentoUnidade'],1,0,'L');
            $this->Cell(20,7, $value['data_medida'] ? date("d/m/Y", strtotime($value['data_medida'])) : "N/D",1,0,'L');
            $this->Cell(18,7, $value['data_remedida'] != '0000-00-00' ? date("d/m/Y", strtotime($value['data_remedida'])) : "N/D",1,0,'L');
            $this->Ln();
        }
    }
}

$pdf = new ReportMetrica;
$pdf->AliasNbPages();
$pdf->AddPage('P','A4',0);
$pdf->headerTable();
$pdf->viewTable();
$pdf->Output();