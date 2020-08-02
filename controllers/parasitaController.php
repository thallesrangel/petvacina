<?php

if (!isset($_SESSION['id_usuario'])) {
    header("Location:".BASE_URL."login");
    die();   
}

class parasitaController extends Controller 
{   
    public function index()
    {   
        $breadcrumb = [
			'Início' => '',
			'Pulgas e Carrapatos' => 'false',
			'Listagem' => 'false'
        ];

        $animais = new Animal();

        $dados['lista'] = $animais->getAllResumido();
        $this->setBreadCrumb($breadcrumb);
        $this->loadTemplate('parasitaList', $dados);
    }

    public function registrar()
    {   
        $breadcrumb = [
			'Início' => '',
			'Pulgas e Carrapatos' => 'parasita',
			'Registrar' => 'false'
        ];

        $dados = [];
        
        $this->setBreadCrumb($breadcrumb);
        $this->loadTemplate('parasitaRegistrar', $dados);
    }

    public function registrar_save($idAnimal)
    {   
        $id_animal = $idAnimal;
        $nome_produto = $_POST['nome_produto'];
        $dose = $_POST['dose'];
        $data_aplicacao = implode('-', array_reverse(explode('/', $_POST['data_aplicacao'])));
        $data_prox_dose = implode('-', array_reverse(explode('/', $_POST['data_prox_dose'])));
        $nome_veterinario = $_POST['nome_veterinario'];
        $registro_crmv = $_POST['registro_crmv'];

        $vacina = new Parasita();
        
        if ($vacina->add($id_animal, $nome_produto, $dose, $data_aplicacao, $data_prox_dose, $nome_veterinario, $registro_crmv)) {
            $_SESSION['msg'] = 'registrado';
            header("Location: ".BASE_URL."parasita/detalhes/".$id_animal);
        } 
    }

    public function detalhes($id)
    {   
        $breadcrumb = [
			'Início' => '',
			'Pulgas e Carrapatos' => 'parasita',
			'Detalhes' => 'false'
        ];

        $parasita = new Parasita();
        $animal = new Animal();
        $dados['animal'] = $animal->getEspecifico($id);
        $dados['lista'] = $parasita->getEspecifico($id);

        $this->setBreadCrumb($breadcrumb);
        $this->loadTemplate('parasitaDetalhes', $dados); 
    }

    public function deletar($id)
    {
      if (!empty($id)) {
        $parasita = new Parasita();
        $parasita->delete($id);
      }
      $_SESSION['msg'] = 'deletado';
      header("Location: ".BASE_URL."parasita");
    }
}