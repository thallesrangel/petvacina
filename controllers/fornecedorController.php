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
			'Início' => 'dashboard',
			'Fornecedores' => 'fornecedor',
			'Listagem' => 'false'
        ];

        $fornecedor = new Fornecedor();
        $dados['fornecedor'] = $fornecedor->getAllResumido();

        if (!$dados['fornecedor']) {
            header("Location:".BASE_URL."fornecedor");
        }


        $this->setBreadCrumb($breadcrumb);
        $this->loadTemplate('fornecedorList', $dados);
    }

    public function registrar()
    {   
        $breadcrumb = [
			'Início' => 'dashboard',
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


    public function editar_salvar(){

            
        $peso = new Fornecedor();
          
        // Usado para editar
        if (!empty($_POST['id_fornecedor'])) {
            
            $idFornecedor = $_POST['id_fornecedor'];
            $nome_fornecedor = $_POST['nome_fornecedor'];
            $id_fornecedor_tipo = $_POST['id_fornecedor_tipo'];

    
            $peso->edit($idFornecedor, $nome_fornecedor, $id_fornecedor_tipo);
            
            $_SESSION['msg'] = "editado_sucesso";
            header("Location: ".BASE_URL."fornecedor");
        }
    }

    public function editar($idFornecedor)
    {   
        $dados = array();
    
        if (!empty($idFornecedor)) {
 
            $fornecedor = new Fornecedor();
            $fornecedor_tipo = new FornecedorTipo();
            $breadcrumb = [
                'Início' => 'dashboard',
                'Fornecedor' => 'fornecedor',
                'Editar' => 'false'
            ];

            $dados['info'] = $fornecedor->getEspecificoDado($idFornecedor);

            $dados['fornecedorTipo'] = $fornecedor_tipo->getAll(); 
            
            if (isset($dados['info'][0]['id_fornecedor'])) {
                $this->setBreadCrumb($breadcrumb);
                $this->loadTemplate('fornecedorEditar', $dados);
            }
        
        } else {
            header("Location: ".BASE_URL);
        }
    }
}