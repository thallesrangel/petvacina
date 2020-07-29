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

        $dados['lista'] = $animais->getAllResumido();
        
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
        $dose = $_POST['dose'];
        $data_aplicacao = implode('-', array_reverse(explode('/', $_POST['data_aplicacao'])));
        $data_revacinacao = implode('-', array_reverse(explode('/', $_POST['data_revacinacao'])));
        $nome_veterinario = $_POST['nome_veterinario'];
        $registro_crmv = $_POST['registro_crmv'];

        $vacina = new Vacina();
        
        if ($vacina->add($id_animal, $nome_vacina, $data_aplicacao, $data_revacinacao, $nome_veterinario, $registro_crmv)) {
            header("Location: ".BASE_URL."vacina/detalhes/".$id_animal);
        } 
    }

    public function deletar($id)
    {
      if(!empty($id)) {
          $vacina = new Vacina();
          $vacina->delete($id);
      }

      header("Location: ".BASE_URL."vacina/detalhes/");
    }
}