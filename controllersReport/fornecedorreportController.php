<?php

class fornecedorreportController extends Controller
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
            header("Location: ".BASE_URL."fornecedorreport");
        }
        new ReportFornecedor();
    }
    
    public function index()
    {
        $breadcrumb = [
			'Início' => '',
			'Relatórios' => 'relatorio',
			'Higiene' => 'false'
        ];

        $FornecedorTipo = new FornecedorTipo();

        $dados['fornecedor_tipo'] = $FornecedorTipo->getAll();

        $this->setBreadCrumb($breadcrumb);
        $this->loadTemplate('reportFormFornecedor', $dados);
    }
}