<?php

class vacinaController extends Controller 
{   
    public function index()
    {
        $animais = new Animal();

        $dados['lista'] = $animais->getAllResumido();
        
        $this->loadTemplate('vacinaList', $dados);
    }   

    public function detalhes($id) 
    {
        $vacinas = new Vacina();
        $animal = new Animal();
        $dados['animal'] = $animal->getEspecifico($id);
        $dados['lista'] = $vacinas->getEspecifico($id);

        $this->loadTemplate('vacinaDetalhes', $dados);
    }
    
    public function registrar($idAnimal)
    {
        $dados = [];
        
        $this->loadTemplate('vacinaRegistrar', $dados);
    }

    
     public function registrar_save($idAnimal)
     {   
        $id_animal = $idAnimal;
        $nome_vacina = $_POST['nome_vacina'];
        $data_aplicacao = implode('-', array_reverse(explode('/', $_POST['data_aplicacao'])));
        $data_revacinacao = implode('-', array_reverse(explode('/', $_POST['data_revacinacao'])));
        $nome_veterinario = $_POST['nome_veterinario'];
        $registro_crmv = $_POST['registro_crmv'];
    
        $vacina = new Vacina();
         
        if ($vacina->add($id_animal, $nome_vacina, $data_aplicacao, $data_revacinacao, $nome_veterinario, $registro_crmv)) {
            header("Location: ".BASE_URL."vacina/detalhes/".$id_animal);
        } 
     }
}