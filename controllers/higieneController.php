<?php

class higieneController extends Controller 
{   
    public function index() 
    {   
        $breadcrumb = [
			'Início' => '',
			'Higiene' => 'false',
			'Listagem' => 'false'
        ];
        
        $animais = new Animal();

        // Paginação
        $offset = 0;
        $limit = 10;
        $total = $animais->getTotal();
        // total Paginas
        $dados['paginas'] = ceil($total/$limit);
        // Pagina Atual
        $dados['paginaAtual'] = 1;

        if(!empty($_GET['p'])) {
            $dados['paginaAtual'] = $_GET['p'];
        }

        $offset = ($dados['paginaAtual'] * $limit) - $limit;
        
        //Limitar os link antes depois
        $dados['max_links'] = 1;
        
        $dados['lista'] = $animais->getAllResumido($offset, $limit);

        $this->setBreadCrumb($breadcrumb);
        $this->loadTemplate('higieneList', $dados);
    }


    public function detalhes($id) 
    {   
        $breadcrumb = [
			'Início' => '',
			'Higiene' => 'higiene',
			'Detalhes' => 'false'
        ];
        
        $higiene = new Higiene();
        $animal = new Animal();

        $dados['animal'] = $animal->getEspecifico($id);
        $dados['lista'] = $higiene->getEspecifico($id);

        $this->setBreadCrumb($breadcrumb);
        $this->loadTemplate('higieneDetalhes', $dados);
    }

    public function registrar()
    {   
        $breadcrumb = [
			'Início' => '',
			'Higiene' => 'higiene',
			'Registrar' => 'false'
        ];

        $fornecedor = new Fornecedor();
        $higiene_tipo = new HigieneTipo();
        $dados['fornecedor'] = $fornecedor->getAll();
        $dados['higiene_tipo'] = $higiene_tipo->getAll();

        $this->setBreadCrumb($breadcrumb);
        $this->loadTemplate('higieneRegistrar', $dados);
    }

    public function registrar_save($idAnimal)
    {   
        $id_animal = $idAnimal;
        $id_higiene_tipo = $_POST['id_higiene_tipo'];
        $id_fornecedor = $_POST['id_fornecedor'];
        $data_servico = implode('-', array_reverse(explode('/', $_POST['data_servico'])));
        $data_prox_servico =  $_POST['data_prox_servico'] ? implode('-', array_reverse(explode('/', $_POST['data_prox_servico']))) : null;

        $higiene = new Higiene();
        
        if ($higiene->add($id_animal, $id_higiene_tipo, $id_fornecedor, $data_servico, $data_prox_servico)) {
            $_SESSION['msg'] = 'registrado';
            header("Location: ".BASE_URL."higiene/detalhes/".$idAnimal);
        } 
    }

    public function deletar($id)
    {
      if (!empty($id)) {
        $higiene = new Higiene();
        $higiene->delete($id);
      }
      $_SESSION['msg'] = 'deletado';
      header("Location: ".BASE_URL."higiene");
    }


    
    public function editar($idHigiene)
    {   
        $dados = array();
    
        if (!empty($idHigiene)) {
 
            $higiene = new Higiene();
            $higiene_tipo = new HigieneTipo();
          
            $fornecedor = new Fornecedor();
       
        

            $breadcrumb = [
                'Início' => '',
                'Higiene' => 'higiene',
                'Editar' => 'false'
            ];

            $dados['info'] = $higiene->getEspecificoDado($idHigiene);
            $dados['higiene_tipo'] = $higiene_tipo->getAll();
            
            if (isset($dados['info'][0]['id_higiene'])) {
                $this->setBreadCrumb($breadcrumb);
                $this->loadTemplate('higieneEditar', $dados);
            }
        
        } else {
            header("Location: ".BASE_URL);
        }
    }
}
