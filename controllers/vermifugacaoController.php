<?php
class vermifugacaoController extends Controller 
{   
    public function index() 
    {
        $dados = [];

        $animais = new Animal();

        $dados['lista'] = $animais->getAllResumido();
        
        $this->loadTemplate('vermifugacaoList', $dados);
    }

    public function registrar()
    {
        $dados = [];
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
            header("Location: ".BASE_URL."vermifugacao/detalhes/".$id_animal);
        } 
    }

    public function detalhes($id)
    {
        $animal = new Animal();
        $vermifugacao = new Vermifugacao();
        
        $dados['animal'] = $animal->getEspecifico($id);
        $dados['lista'] = $vermifugacao->getEspecifico($id);

        $this->loadTemplate('vermifugacaoDetalhes', $dados);
    }
}