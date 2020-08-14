<?php

class cioreportController extends Controller
{   
    public function render()
    {   
        new ReportCio();
    }
    
    public function index(){
        $breadcrumb = [
			'Início' => '',
			'Relatório' => 'false',
			'Pulgas e Carrapatos' => 'false'
        ];

        $proprietarios = new Proprietario();

        $dados['proprietarios'] = $proprietarios->getAllResumido();
        $this->setBreadCrumb($breadcrumb);
        $this->loadTemplate('reportFormCio', $dados);
    }
}