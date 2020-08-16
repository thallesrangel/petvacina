<?php

if(!isset($_SESSION['id_usuario'])) {
    header("Location:".BASE_URL."login");
    die();   
}

class animalController extends Controller 
{   

    public function index()
    {   
        $breadcrumb = [
			'Início' => '',
			'Animais' => 'false',
			'Listagem' => 'false'
        ];

        $animais = new Animal();
        // Paginação
        $offset = 0;
        $limit = 10;
        $total = $animais->getTotal();
        $dados['paginas'] = ceil($total/$limit);
        $dados['paginaAtual'] = 1;

        if(!empty($_GET['p'])) {
            $dados['paginaAtual'] = $_GET['p'];
        }

        $offset = ($dados['paginaAtual'] * $limit)- $limit;
       
        $dados['lista'] = $animais->getAllResumido($offset, $limit);

        $this->setBreadCrumb($breadcrumb);
        $this->loadTemplate('animalList', $dados);
    }
    
    public function detalhes($id)
    {
        $breadcrumb = [
			'Início' => '',
			'Animais' => 'animal',
			'Detalhes' => 'false'
        ];

        $animais = new Animal();

        $dados['lista'] = $animais->getEspecifico($id);

        $this->setBreadCrumb($breadcrumb);
        $this->loadTemplate('animalDetalhes', $dados);
    }

    # Retorna formulário cadastro Registrar Animal
    public function registrar()
    {   
        $breadcrumb = [
			'Início' => '',
			'Animais' => 'animal',
			'Registrar' => 'false'
        ];
        
        $animalEspecies = new AnimalEspecie();
        $proprietarios = new Proprietario();
        $dados['proprietario'] = $proprietarios->getAllResumido();
        $dados['especies'] = $animalEspecies->getAll();

        $this->setBreadCrumb($breadcrumb);
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
            $_SESSION['msg'] = 'registrado';
            header("Location: ".BASE_URL."animal");
        } 
    }

    public function deletar($id)
    {
      if(!empty($id)) {
          $animal = new Animal();
          $animal->delete($id);
      }
      $_SESSION['msg'] = 'deletado';
      header("Location: ".BASE_URL."animal");
    }
}