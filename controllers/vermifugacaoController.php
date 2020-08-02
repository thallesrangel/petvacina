<?php
class vermifugacaoController extends Controller 
{   
    public function index() 
    {   
        $breadcrumb = [
			'Início' => '',
			'Vermifugação' => 'false',
			'Listagem' => 'false'
        ];

        $dados = [];

        $animais = new Animal();

        $dados['lista'] = $animais->getAllResumido();
        
        $this->setBreadCrumb($breadcrumb);
        $this->loadTemplate('vermifugacaoList', $dados);
    }

    public function registrar()
    {   
        $breadcrumb = [
			'Início' => '',
			'Vermifugação' => 'vermifugacao',
			'Registrar' => 'false'
        ];

        $dados = [];

        $this->setBreadCrumb($breadcrumb);
        $this->loadTemplate('vermifugacaoRegistrar', $dados);
    }

    public function registrar_save($idAnimal)
    {
        $id_animal = $idAnimal;
        $nome_produto = $_POST['nome_produto'];
        $dose = $_POST['dose'];
        $peso_animal = $_POST['peso_animal'];
        $data_aplicacao = implode('-', array_reverse(explode('/', $_POST['data_aplicacao'])));
        $data_prox_dose = implode('-', array_reverse(explode('/', $_POST['data_prox_dose'])));
        $nome_veterinario = $_POST['nome_veterinario'];
        $registro_crmv = $_POST['registro_crmv'];

        $vermifugacao = new Vermifugacao();
         
        if ($vermifugacao->add($id_animal, $nome_produto, $dose, $peso_animal, $data_aplicacao, $data_prox_dose, $nome_veterinario, $registro_crmv)) {
            $_SESSION['msg'] = 'registrado';
            header("Location: ".BASE_URL."vermifugacao/detalhes/".$id_animal);
        } 
    }

    public function detalhes($id)
    {   
        $breadcrumb = [
			'Início' => '',
			'Vermifugação' => 'vermifugacao',
			'Detalhes' => 'false'
        ];
        
        $animal = new Animal();
        $vermifugacao = new Vermifugacao();
        
        $dados['animal'] = $animal->getEspecifico($id);
        $dados['lista'] = $vermifugacao->getEspecifico($id);

        $this->setBreadCrumb($breadcrumb);
        $this->loadTemplate('vermifugacaoDetalhes', $dados);
    }

    public function deletar($id)
    {
      if(!empty($id)) {
          $vermifugacao = new Vermifugacao();
          $vermifugacao->delete($id);
      }
      $_SESSION['msg'] = 'deletado';
      header("Location: ".BASE_URL."vermifugacao");
    }
}