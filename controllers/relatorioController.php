<?php

class relatorioController extends Controller 
{   
    public function index()
    {
        $breadcrumb = [
			'Início' => '',
			'Relatórios' => 'false',
        ];

        $dados = [];
        $this->setBreadCrumb($breadcrumb);
        $this->loadTemplate('relatorio', $dados);
    }
}