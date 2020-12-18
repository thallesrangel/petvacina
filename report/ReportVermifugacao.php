<?php

require 'vendor/autoload.php';

class ReportVermifugacao extends FPDF
{  
    function header(){
        $this->SetTitle(utf8_decode("Pet Gestor | Report Vermifugação"));
        $this->Image(BASE_URL."assets/img/logoLow.png",10,6);
        $this->SetFont('Arial','',12);
        $this->Cell(276,5, utf8_decode("Relatório Vermifugação"),0,0,'C');
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
        $this->Cell(20,8, utf8_decode('Proprietário'),1,0,'L');
        $this->Cell(20,8, 'Produto',1,0,'L');
        $this->Cell(20,8,'Dose',1,0,'L');
        $this->Cell(20,8, 'Peso',1,0,'L');

        $this->Cell(20,8, utf8_decode('Veterinário'),1,0,'L');
        $this->Cell(20,8, utf8_decode('CRMV') ,1,0,'L');
        $this->Cell(20,8, utf8_decode('Aplicação') ,1,0,'L');
        $this->Cell(20,8, utf8_decode('Reaplicação') ,1,0,'L');
        $this->Ln();
    }

    function viewTable()
    { 
        $this->SetFont('Arial', '', 6);

        $proprietario = $_POST['proprietario'];

        $vermifugacao = new Vermifugacao();
        $dados = $vermifugacao->listarReport($proprietario);

        foreach($dados as $value) {

            $this->Cell(20,7, utf8_decode($value['nome_proprietario']),1,0,'L');
            $this->Cell(20,7,utf8_decode($value['nome_produto']),1,0,'L');
            $this->Cell(20,7, utf8_decode($value['dose']),1,0,'L');
            $this->Cell(20,7 ,$value['peso'],1,0,'L');
            $this->Cell(20,7, utf8_decode($value['nome_veterinario']),1,0,'L');
            $this->Cell(20,7, utf8_decode($value['registro_crmv']),1,0,'L');
            $this->Cell(20,7, date("d/m/Y", strtotime($value['data_aplicacao'])),1,0,'L');
            $this->Cell(20,7, date("d/m/Y", strtotime($value['data_prox_dose'])),1,0,'L');

            $this->Ln();
        }
        
    }
}

$pdf = new ReportVermifugacao();
$pdf->AliasNbPages();
$pdf->AddPage('P','A4',0);
$pdf->headerTable();
$pdf->viewTable();
$pdf->Output();