<?php

class animalController extends Controller 
{   

    public function index()
    {
        $animais = new Animal();

        $dados['lista'] = $animais->getAllResumido();
        
        $this->loadTemplate('animalList', $dados);
    }
    
    public function detalhes($id){
        $animais = new Animal();

        $dados['lista'] = $animais->getEspecifico($id);

        $this->loadTemplate('animalDetalhes', $dados);
    }

    # Retorna formulário cadastro Registrar Animal
    public function registrar()
    {
        $animalEspecies = new AnimalEspecie();
        $dados['especies'] = $animalEspecies->getAll();
        
        $this->loadTemplate('animalRegistrar', $dados);
    }

    // Action Registrar
    public function registrar_save()
    {   
        $nome_animal = $_POST['nome_animal'];
        $identificacao = $_POST['identificacao'];
        $data_nascimento = implode('-', array_reverse(explode('/', $_POST['data_nascimento'])));
        $id_especie = $_POST['id_especie'];
        $raca = $_POST['raca'];
        $sexo = $_POST['sexo'];
        $pelagem = $_POST['pelagem'];
        $proprietario = $_POST['proprietario'];

        $numero_microchip = $_POST['numero_microchip'] == "" ? null : $_POST['numero_microchip'];
        $data_microchip = $_POST['data_microchip'] == "" ? null : implode('-', array_reverse(explode('/', $_POST['data_microchip'])));
        $local_implatacao = $_POST['local_implatacao'] == "" ? null : $_POST['local_implatacao'];

        $animal = new Animal();
        
        if ($animal->add($nome_animal, $identificacao, $data_nascimento, $id_especie, $raca, $sexo, $pelagem, $proprietario, $numero_microchip, $data_microchip, $local_implatacao)) {
            header("Location: ".BASE_URL);
        } 
    }
}