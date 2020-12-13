<?php

if(!isset($_SESSION['id_usuario'])) {
    header("Location:".BASE_URL."login");
    die();   
}

class vacinaController extends Controller 
{   
    public function index()
    {      
        $breadcrumb = [
			'Início' => '',
			'Vacinas' => 'false',
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
        $this->loadTemplate('vacinaList', $dados);

    }   

    public function detalhes($id) 
    {
        $breadcrumb = [
			'Início' => '',
			'Vacinas' => 'vacina',
			'Detalhes' => 'false'
        ];

        $vacinas = new Vacina();
        $animal = new Animal();
        $dados['animal'] = $animal->getEspecifico($id);

        if (!$dados['animal']) {
            header("Location:".BASE_URL."vacina");
        }

        $dados['lista'] = $vacinas->getEspecifico($id);

        $this->setBreadCrumb($breadcrumb);
        $this->loadTemplate('vacinaDetalhes', $dados);
    }
    
    public function registrar($idAnimal)
    {   
        $breadcrumb = [
			'Início' => '',
			'Vacinas' => 'vacina',
			'Registrar' => 'false'
        ];

        $dados = [];
        
        $this->setBreadCrumb($breadcrumb);
        $this->loadTemplate('vacinaRegistrar', $dados);
    }

    
    public function registrar_save($idAnimal)
    {   
        $id_animal = $idAnimal;
        $nome_vacina = $_POST['nome_vacina'];
        $dose = str_replace(',', '.',str_replace('.', '', $_POST['dose'])); 
        $data_aplicacao = implode('-', array_reverse(explode('/', $_POST['data_aplicacao'])));
        $data_revacinacao = $_POST['data_revacinacao'] ? implode('-', array_reverse(explode('/', $_POST['data_revacinacao']))) : null;
        $nome_veterinario = $_POST['nome_veterinario'];
        $registro_crmv = $_POST['registro_crmv'];

        $vacina = new Vacina();
        
        if ($vacina->add($id_animal, $nome_vacina, $dose, $data_aplicacao, $data_revacinacao, $nome_veterinario, $registro_crmv)) {
            $_SESSION['msg'] = 'registrado';
            header("Location: ".BASE_URL."vacina/detalhes/".$id_animal);
        } 
    }

    public function deletar($id)
    {
      if(!empty($id)) {
          $vacina = new Vacina();
          $vacina->delete($id);
      }
      $_SESSION['msg'] = 'deletado';
      header("Location: ".BASE_URL."vacina/detalhes/");
    }

    public function editar($idVacina)
    {   
        $dados = array();
    
        if (!empty($idVacina)) {
            
            $vacina = new Vacina();
          
            // Usado para editar
            if (!empty($_POST['id_vacina'])) {
                
                $idVacina = $_POST['id_vacina'];
                $titulo_vacina = $_POST['titulo_vacina'];
                $dose = str_replace(',', '.',str_replace('.', '', $_POST['dose']));
                $data_aplicacao = implode('-', array_reverse(explode('/', $_POST['data_aplicacao'])));
                $data_revacinacao = implode('-', array_reverse(explode('/', $_POST['data_revacinacao'])));
                $nome_veterinario = $_POST['nome_veterinario'];
                $registro_crmv = $_POST['registro_crmv'];

                $vacina->edit($idVacina, $titulo_vacina, $dose, $data_aplicacao, $data_revacinacao, $nome_veterinario, $registro_crmv);
                
                $_SESSION['msg'] = 'editado_sucesso';
                header("Location: ".BASE_URL."vacina");

            } else {
                
                $breadcrumb = [
                    'Início' => '',
                    'Vacina' => 'animal',
                    'Editar' => 'false'
                ];

                $dados['info'] = $vacina->getEspecificoDado($idVacina);
                
                if (isset($dados['info'][0]['id_vacina'])) {
                    $this->setBreadCrumb($breadcrumb);
                    $this->loadTemplate('vacinaEditar',$dados);
                }
            }
            
        } else {
            header("Location: ".BASE_URL);
        }
    }
}