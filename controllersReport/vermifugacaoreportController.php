<?php

class vermifugacaoreportController extends Controller
{   
    public function __construct()
    {
        if(empty($_SESSION['id_usuario'])){
            header("Location: ".BASE_URL."login");
        }
    }
    
    public function render()
    {   
        if(empty($_POST)){
            # Quando não há POST para gerar o relatório
            $_SESSION['msg'] = 'report_sem_post';
            header("Location: ".BASE_URL."vermifugacaoreport");
        }
        new ReportVermifugacao();
    }
    
    public function index()
    {
        $breadcrumb = [
			'Início' => '',
			'Relatório' => 'false',
			'Animal' => 'false'
        ];

        $proprietarios = new Proprietario();

        $dados['proprietarios'] = $proprietarios->getAllResumido();
        $this->setBreadCrumb($breadcrumb);
        $this->loadTemplate('reportFormVermifugacao', $dados);
    }
}