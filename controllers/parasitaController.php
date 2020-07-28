<?php

if (!isset($_SESSION['id_usuario'])) {
    header("Location:".BASE_URL."login");
    die();   
}

class parasitaController extends Controller 
{   
    public function index()
    {
        $animais = new Animal();

        $dados['lista'] = $animais->getAllResumido();
    
        $this->loadTemplate('parasitaList', $dados);
    }

    public function registrar()
    {
        $dados = [];
        
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
            header("Location: ".BASE_URL."parasita/detalhes/".$id_animal);
        } 
    }

    public function detalhes($id)
    {
        $parasita = new Parasita();
        $animal = new Animal();
        $dados['animal'] = $animal->getEspecifico($id);
        $dados['lista'] = $parasita->getEspecifico($id);

        $this->loadTemplate('parasitaDetalhes', $dados); 
    }

    public function deletar($id)
    {
      if (!empty($id)) {
        $parasita = new Parasita();
        $parasita->delete($id);
      }

      header("Location: ".BASE_URL."parasita");
    }
}