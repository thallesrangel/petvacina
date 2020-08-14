<?php

require 'vendor/autoload.php';

class ReportAnimal extends FPDF
{  
    function header(){
        $this->SetTitle("Pet Vacina | Report Animal");
        $this->Image(BASE_URL."assets/img/logoLow.png",10,6);
        $this->SetFont('Arial','',12);
        $this->Cell(276,5, utf8_decode("Relatório Animal"),0,0,'C');
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
        $this->Cell(20,8,'Animal',1,0,'L');
        $this->Cell(20,8, utf8_decode('Raça'),1,0,'L');
        $this->Cell(12,8, utf8_decode('Sexo'),1,0,'L');
        $this->Cell(20,8,'Pelagem',1,0,'L');
        $this->Cell(20,8, utf8_decode('Nascimento') ,1,0,'L');
        $this->Cell(20,8, utf8_decode('Microchip') ,1,0,'L');
        $this->Cell(20,8, utf8_decode('Local') ,1,0,'L');
        $this->Cell(20,8, utf8_decode('Implantado') ,1,0,'L');
        $this->Cell(20,8, utf8_decode('Registro') ,1,0,'L');
        $this->Ln();
    }

    function viewTable()
    { 
        $this->SetFont('Arial', '', 6);

        $proprietario = $_POST['proprietario'];

        $animal = new Animal();
        $dados = $animal->listarReport($proprietario);
   
        foreach($dados as $value) {

            $this->Cell(20,7,$value['nome_proprietario'],1,0,'L');
            $this->Cell(20,7,$value['nome_animal'],1,0,'L');
            $this->Cell(20,7, utf8_decode($value['raca']),1,0,'L');
            $this->Cell(12,7, utf8_decode($value['sexo'] == 1 ? 'Macho' : 'Fêmea'),1,0,'L');  
            $this->Cell(20,7,$value['pelagem'],1,0,'L');
            $this->Cell(20,7,date("d/m/Y", strtotime($value['data_nascimento'])),1,0,'L');
            $this->Cell(20,7, utf8_decode($value['microchip']),1,0,'L');
            $this->Cell(20,7, utf8_decode($value['local_implementacao']),1,0,'L');
            $this->Cell(20,7, date("d/m/Y", strtotime($value['data_implementacao'])),1,0,'L');
            $this->Cell(20,7, date("d/m/Y", strtotime($value['data_registro'])),1,0,'L');

            $this->Ln();
        }
    }
}

$pdf = new ReportAnimal();
$pdf->AliasNbPages();
$pdf->AddPage('P','A4',0);
$pdf->headerTable();
$pdf->viewTable();
$pdf->Output();