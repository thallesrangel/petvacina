<?php

if (!isset($_SESSION['id_usuario'])) {
    header("Location:".BASE_URL."login");
    die();   
}

class anticioController extends Controller 
{   
    public function index()
    {   
        $breadcrumb = [
			'Início' => '',
			'Anti-cio' => 'peso',
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
        $this->loadTemplate('antiCioList', $dados);
    }

    public function registrar()
    {   
        $breadcrumb = [
			'Início' => '',
			'Anti-cio' => 'anticio',
			'Registrar' => 'false'
        ];

        $dados = [];

        $this->setBreadCrumb($breadcrumb);
        $this->loadTemplate('antiCioRegistrar', $dados);
    }

    public function registrar_save($idAnimal)
    {   
        $id_animal = $idAnimal;
        $nome_produto = $_POST['nome_produto'];
        $dose = str_replace(',', '.',str_replace('.', '', $_POST['dose']));
        $data_aplicacao = implode('-', array_reverse(explode('/', $_POST['data_aplicacao'])));
        $data_prox_dose = $_POST['data_prox_dose'] ? implode('-', array_reverse(explode('/', $_POST['data_prox_dose']))) : null;
        $nome_veterinario = $_POST['nome_veterinario'];
        $registro_crmv = $_POST['registro_crmv'];

        $anticio = new Anticio();
        
        if ($anticio->add($id_animal, $nome_produto, $dose, $data_aplicacao, $data_prox_dose, $nome_veterinario, $registro_crmv)) {
            $_SESSION['msg'] = 'registrado';
            header("Location: ".BASE_URL."anticio/detalhes/".$id_animal);
        } 
    }

    public function detalhes($id)
    {   
        $breadcrumb = [
			'Início' => '',
			'Anti-cio' => 'anticio',
			'Detalhes' => 'false'
        ];

        $anticio = new Anticio();
        $animal = new Animal();
        $dados['animal'] = $animal->getEspecifico($id);

        if (!$dados['animal']) {
            header("Location:".BASE_URL."anticio");
        }

        $dados['lista'] = $anticio->getEspecifico($id);

        $this->setBreadCrumb($breadcrumb);
        $this->loadTemplate('antiCioDetalhes', $dados); 
       
    }

    public function deletar($id)
    {
      if (!empty($id)) {
        $anticio = new Anticio();
        $anticio->delete($id);
      }
      $_SESSION['msg'] = 'deletado';
      header("Location: ".BASE_URL."anticio");
    }


    public function editar($idAnticio)
    {   
        $dados = array();
    
        if (!empty($idAnticio)) {
 
            $anticio = new Anticio();
          
            // Usado para editar
            if(!empty($_POST['id_anticio'])) {
        
                $nome_produto = $_POST['nome_produto'];
                $dose = str_replace(',', '.',str_replace('.', '', $_POST['dose']));
                $data_aplicacao = implode('-', array_reverse(explode('/', $_POST['data_aplicacao'])));
                $data_prox_dose = $_POST['data_prox_dose'] ? implode('-', array_reverse(explode('/', $_POST['data_prox_dose']))) : null;
                $nome_veterinario = $_POST['nome_veterinario'];
                $registro_crmv = $_POST['registro_crmv'];

                $anticio->edit($idAnticio, $nome_produto, $dose, $data_aplicacao, $data_prox_dose, $nome_veterinario, $registro_crmv);

                $_SESSION['msg'] = 'editado_sucesso';
                header("Location: ".BASE_URL."anticio");
            } else {

                $breadcrumb = [
                    'Início' => '',
                    'Anti-cio' => 'anticio',
                    'Editar' => 'false'
                ];

                $dados['info'] = $anticio->getEspecificoDado($idAnticio);
              
                if (isset($dados['info'][0]['id_anticio'])) {
                    $this->setBreadCrumb($breadcrumb);
                    $this->loadTemplate('antiCioEditar',$dados);
                }
            }
        } else {
            header("Location: ".BASE_URL);
        }
    }
}