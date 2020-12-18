<?php

require 'vendor/autoload.php';

class ReportHigiene extends FPDF
{  
    function header(){
        $this->SetTitle(NOME_APP . " | Report Higiene");
        $this->Image(BASE_URL."assets/img/logoLow.png",10,6);
        $this->SetFont('Arial','',12);
        $this->Cell(276,5, utf8_decode("Relatório | Higiene"),0,0,'C');
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
        $this->Cell(20,8, utf8_decode('Tipo'),1,0,'L');
        $this->Cell(35,8,'Fornecedor',1,0,'L');
        $this->Cell(20,8, utf8_decode('Data Serviço'),1,0,'L');
        $this->Cell(18,8, utf8_decode('Agendado'),1,0,'L');
        $this->Cell(18,8, utf8_decode('Registrado'),1,0,'L');
        $this->Ln();
    }

    function viewTable()
    { 
        $this->SetFont('Arial', '', 6);

        $proprietario = $_POST['proprietario'];

        $higiene = new Higiene();
        $dados = $higiene->listarReport($proprietario);
   
        foreach($dados as $value) {
            $this->Cell(30,7,$value['nome_animal'],1,0,'L');
            $this->Cell(20,7,$value['higiene_tipo'],1,0,'L');
            $this->Cell(35,7,$value['nome_fornecedor'],1,0,'L');
            $this->Cell(20,7, $value['data_servico'] ? date("d/m/Y", strtotime($value['data_servico'])) : "",1,0,'L');
            $this->Cell(18,7, $value['data_prox_servico'] ? date("d/m/Y", strtotime($value['data_prox_servico'])) : "N/D",1,0,'L');
            $this->Cell(18,7, date("d/m/Y", strtotime($value['data_registro'])),1,0,'L');

            $this->Ln();
        }
    }
}

$pdf = new ReportHigiene();
$pdf->AliasNbPages();
$pdf->AddPage('P','A4',0);
$pdf->headerTable();
$pdf->viewTable();
$pdf->Output();