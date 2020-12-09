<?php

require 'vendor/autoload.php';

class ReportProprietario extends FPDF
{  
    function header()
    {   
        
        $this->SetTitle(utf8_decode("Pet Gestor| Report Proprietário"));
        $this->Image(BASE_URL."assets/img/logoLow.png",10,6);
        $this->SetFont('Arial','',12);
        $this->Cell(276,5, utf8_decode("Relatório | Proprietário"),0,0,'C');
        $this->Ln();
        $this->setFont('Arial','',10);
        $this->Cell(276,10, utf8_decode('Quem cuida, vacina.'));
        $this->Ln(15);
    }
    function footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial','',8);
        $this->Cell(0,10, utf8_decode('Página').$this->PageNo().'/{nb}',0,0,'C');
        $this->Cell(0,5,utf8_decode("Usuário: ".$_SESSION['nome_usuario']),0,0,'R');
        $this->Cell(0,15,"Emitido em: ".date("d/m/Y H:i:s"),0,0,'R');
    }

    function headerTable() 
    { 
        $this->SetFont('Arial', 'B', 8);
        $this->Cell(40,8, utf8_decode('Proprietário'),1,0,'L');
        $this->Cell(20,8,'Nascimento',1,0,'L');
        $this->Cell(20,8,'Contato',1,0,'L');
        $this->Cell(40,8,'E-mail',1,0,'L');
        $this->Cell(25,8,'Estado',1,0,'L');
        $this->Cell(30,8,'Cidade',1,0,'L');

        $this->Ln();
    }

    function viewTable()
    {
        $this->SetFont('Arial', '', 7);

        $proprietario = new Proprietario();
        $dados = $proprietario->getAll();

        foreach($dados as $value) {
            $this->Cell(40,7,$value['nome_proprietario'] . " " . $value['sobrenome_proprietario'] ,1,0,'L');
            $this->Cell(20,7, date("d/m/Y", strtotime($value['data_nascimento'])),1,0,'L');
            $this->Cell(20,7, $value['contato'],1,0,'L');
            $this->Cell(40,7, $value['email'],1,0,'L');
            $this->Cell(25,7, utf8_decode($value['nome_estado']),1,0,'L');
            $this->Cell(30,7, utf8_decode($value['nome_cidade']),1,0,'L');
            $this->Ln();
        }
        
    }
}

$pdf = new ReportProprietario();
$pdf->AliasNbPages();
$pdf->AddPage('P','A4',0);
$pdf->headerTable();
$pdf->viewTable();
$pdf->Output();