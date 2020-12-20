<?php

if (!isset($_SESSION['id_usuario'])) {
    header("Location:".BASE_URL."login");
    die();   
}

class pesoController extends Controller 
{   
    public function index()
    {   
        $breadcrumb = [
			'Início' => 'dashboard',
			'Peso do Animal' => 'peso',
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
        $this->loadTemplate('pesoList', $dados);
    }

    public function detalhes($id)
    {   
        $breadcrumb = [
			'Início' => '',
			'Peso do Animal' => 'peso',
			'Detalhes' => 'false'
        ];

        $peso = new Peso();
        $animal = new Animal();
        $dados['animal'] = $animal->getEspecifico($id);
        
        if (!$dados['animal']) {
            header("Location:".BASE_URL."peso");
        }

        $dados['lista'] = $peso->getEspecifico($id);

        $this->setBreadCrumb($breadcrumb);
        $this->loadTemplate('pesoDetalhes', $dados); 
    }


    public function registrar()
    {   
        $breadcrumb = [
			'Início' => '',
			'Peso do Animal' => 'peso',
			'Registrar' => 'false'
        ];

        $dados = [];
        
        $unPeso = new PesoUnidade();
        $dados['unPeso'] = $unPeso->getAll();

        $this->setBreadCrumb($breadcrumb);
        $this->loadTemplate('pesoRegistrar', $dados);
    }

    public function registrar_save($idAnimal)
    {   
        $peso_animal = str_replace(',', '.',str_replace('.', '', $_POST['peso_animal']));
        $id_peso_unidade = $_POST['id_peso_unidade'];
        $data_pesagem = implode('-', array_reverse(explode('/', $_POST['data_pesagem'])));
        $data_repesagem = $_POST['data_repesagem'] ? implode('-', array_reverse(explode('/', $_POST['data_repesagem']))) : null;
     
        $peso = new Peso();
         
        if ($peso->add($idAnimal, $peso_animal, $id_peso_unidade, $data_pesagem, $data_repesagem)) {
            $_SESSION['msg'] = 'registrado';
            header("Location: ".BASE_URL."peso/detalhes/".$idAnimal);
        } 
    }

    public function deletar($idPesoAnimal)
    {
      if (!empty($idPesoAnimal)) {
        $peso = new Peso();
        $peso->delete($idPesoAnimal);
      }
      $_SESSION['msg'] = 'deletado';
      header("Location: ".BASE_URL."peso");
    }


    public function editar($idPesoAnimal)
    {   
        $dados = array();
    
        if (!empty($idPesoAnimal)) {
            
            $peso = new Peso();
          
            // Usado para editar
            if (!empty($_POST['id_peso_animal'])) {
                
                $idPeso = $_POST['id_peso_animal'];
                $peso_animal = str_replace(',', '.',str_replace('.', '', $_POST['peso_animal']));
                $id_peso_unidade = $_POST['id_peso_unidade'];
                $data_pesagem = implode('-', array_reverse(explode('/', $_POST['data_pesagem'])));
                $data_repesagem = $_POST['data_repesagem'] ? implode('-', array_reverse(explode('/', $_POST['data_repesagem']))) : null;
        
                $peso->edit($idPeso, $peso_animal, $id_peso_unidade, $data_pesagem, $data_repesagem);
                
                $_SESSION['msg'] = "editado_sucesso";
                header("Location: ".BASE_URL."peso");

            } else {
                
                $breadcrumb = [
                    'Início' => '',
                    'Peso do Animal' => 'peso',
                    'Editar' => 'false'
                ];

                $dados['info'] = $peso->getEspecificoDado($idPesoAnimal);
                
                $unPeso = new PesoUnidade();
                $dados['unPeso'] = $unPeso->getAll();        
                
                if (isset($dados['info'][0]['id_peso_animal'])) {
                    $this->setBreadCrumb($breadcrumb);
                    $this->loadTemplate("pesoEditar",$dados);
                } else {
                    // Mostrar que não foi encontrado OU JÁ EXCLUÍDO pois não há nada no banco de dados
                }
            }
            
        } else {
            header("Location: ".BASE_URL);
        }
    }
}