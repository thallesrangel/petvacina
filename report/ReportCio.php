<?php

require 'vendor/autoload.php';

class ReportCio extends FPDF
{  
    function header(){
        $this->SetTitle("Pet Vacina | Report Anti-cio");
        $this->Image(BASE_URL."assets/img/logoLow.png",10,6);
        $this->SetFont('Arial','',12);
        $this->Cell(276,5, utf8_decode("Relatório Anti-cio"),0,0,'C');
        $this->Ln();
        $this->setFont('Arial','',10);
        $this->Cell(276,10, utf8_decode('Quem cuida, vacina.'));
        $this->Ln(15);
    }
    function footer(){
        $this->SetY(-15);
        $this->SetFont('Arial','',8);
        $this->Cell(0,10, utf8_decode('Página').$this->PageNo().'/{nb}',0,0,'C');
        $this->Cell(0,5,utf8_decode("Usuário: ".$_SESSION['nome_usuario']),0,0,'R');
        $this->Cell(0,15,"Emitido em: ".date("d/m/Y H:i:s"),0,0,'R');
    }

    function headerTable() { 
        $this->SetFont('Arial', 'B', 8);
        $this->Cell(10,8,'ID',1,0,'L');
        $this->Cell(20,8, utf8_decode('Proprietário'),1,0,'L');
        $this->Cell(20,8,'Animal',1,0,'L');
        $this->Cell(20,8,'Produto',1,0,'L');
        $this->Cell(20,8,'Dose (ml)',1,0,'L');
        $this->Cell(20,8, utf8_decode('Veterinário'),1,0,'L');
        $this->Cell(20,8,'CRMV',1,0,'L');
        $this->Cell(15,8, utf8_decode('Aplicação') ,1,0,'L');
        $this->Cell(15,8, utf8_decode('Próxima') ,1,0,'L');
        $this->Ln();
    }

    function viewTable(){
     

        $this->SetFont('Arial', '', 7);

        $data_inicial = implode('-', array_reverse(explode('/', $_POST['data_inicial'])));
        $data_final = implode('-', array_reverse(explode('/', $_POST['data_final'])));
        $proprietario = $_POST['proprietario'];

        $cio = new Anticio();
        $dados = $cio->listarReport($proprietario, $data_inicial, $data_final);

        foreach($dados as $value) {

            $this->Cell(10,7, $value['id_anticio'],1,0,'L');
            $this->Cell(20,7,$value['nome_proprietario'],1,0,'L');
            $this->Cell(20,7,$value['nome_animal'],1,0,'L');
            $this->Cell(20,7,$value['nome_produto'],1,0,'L');
            $this->Cell(20,7,$value['dose'],1,0,'L');
            $this->Cell(20,7,$value['nome_veterinario'],1,0,'L');
            $this->Cell(20,7,$value['registro_crmv'],1,0,'L');
            $this->Cell(15,7,date("d/m/Y", strtotime($value['data_aplicacao'])),1,0,'L');
            $this->Cell(15,7,date("d/m/Y", strtotime($value['data_prox_dose'])),1,0,'L');

            $this->Ln();
        } 
    }
}

$pdf = new ReportCio();
$pdf->AliasNbPages();
$pdf->AddPage('P','A4',0);
$pdf->headerTable();
$pdf->viewTable();
$pdf->Output();