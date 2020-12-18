<?php

require 'vendor/autoload.php';

class ReportFornecedor extends FPDF
{  
    function header(){
        $this->SetTitle(NOME_APP . " | Report Fornecedor");
        $this->Image(BASE_URL."assets/img/logoLow.png",10,6);
        $this->SetFont('Arial','',12);
        $this->Cell(276,5, utf8_decode("Relatório | Fornecedor"),0,0,'C');
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
        $this->Cell(70,8, utf8_decode('Fornecedor'),1,0,'L');
        $this->Cell(25,8, utf8_decode('Tipo de Atividade'),1,0,'L');
        $this->Ln();
    }

    function viewTable()
    { 
        $this->SetFont('Arial', '', 6);

        $FornecedorTipos = $_POST['fornecedor_tipo'];

        $fornecedores = new Fornecedor();
        $dados = $fornecedores->listarReport($FornecedorTipos);
   
        foreach($dados as $value) {
            $this->Cell(70,7, utf8_decode($value['nome_fornecedor']),1,0,'L');
            $this->Cell(25,7, utf8_decode($value['fornecedor_tipo']),1,0,'L');
            $this->Ln();
        }
    }
}

$pdf = new ReportFornecedor();
$pdf->AliasNbPages();
$pdf->AddPage('P','A4',0);
$pdf->headerTable();
$pdf->viewTable();
$pdf->Output();