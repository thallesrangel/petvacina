<?php

if (!isset($_SESSION['id_usuario'])) {
    header("Location:".BASE_URL."login");
    die();   
}

class fornecedorController extends Controller 
{   
    public function index()
    {   
        $breadcrumb = [
			'Início' => '',
			'Fornecedores' => 'false',
			'Listagem' => 'false'
        ];

        $fornecedor = new Fornecedor();
        $dados['fornecedor'] = $fornecedor->getAllResumido();

        $this->setBreadCrumb($breadcrumb);
        $this->loadTemplate('fornecedorList', $dados);
    }

    public function registrar()
    {   
        $breadcrumb = [
			'Início' => '',
			'Fornecedor' => 'fornecedor',
			'Registrar' => 'false'
        ];

        $dados = [];
        $fornecedorTipo = new FornecedorTipo();
        $dados['fornecedor_tipo'] = $fornecedorTipo->getAll();
        
        $this->setBreadCrumb($breadcrumb);
        $this->loadTemplate('fornecedorRegistrar', $dados);
    }

    public function registrar_save()
    {      
        $nome_fornecedor = $_POST['nome_fornecedor'];
        $tipo_fornecedor = $_POST['id_fornecedor_tipo'];

        $fornecedor = new Fornecedor();
         
        if ($fornecedor->add($nome_fornecedor, $tipo_fornecedor)) {
            $_SESSION['msg'] = 'registrado';
            header("Location: ".BASE_URL."fornecedor");
        } 
    }

    public function deletar($idFornecedor)
    {
      if(!empty($idFornecedor)) {
          $fornecedor = new Fornecedor();
          $fornecedor->delete($idFornecedor);
      }
      $_SESSION['msg'] = 'deletado';
      header("Location: ".BASE_URL."fornecedor");
    }
}