<?php

if (!isset($_SESSION['id_usuario'])) {
    header("Location:".BASE_URL."login");
    die();   
}

class animalController extends Controller 
{   

    public function index()
    {   
        $breadcrumb = [
			'Início' => 'dashboard',
			'Animais' => 'animal',
			'Listagem' => 'false'
        ];

        $animais = new Animal();
        
        # Paginação
        $offset = 0;
        $limit = 10;
        $total = $animais->getTotal();
        
        # Total Paginas
        $dados['paginas'] = ceil($total/$limit);
        
        # Pagina Atual
        $dados['paginaAtual'] = 1;

        if(!empty($_GET['p'])) {
            $dados['paginaAtual'] = $_GET['p'];
        }
 
        $offset = ($dados['paginaAtual'] * $limit) - $limit;
        
        # Limitar os link antes depois
        $dados['max_links'] = 1;
        
        $dados['lista'] = $animais->getAllResumido($offset, $limit);
        $this->setBreadCrumb($breadcrumb);
        $this->loadTemplate('animalList', $dados);
    }
    
    public function detalhes($id)
    {
        $breadcrumb = [
			'Início' => 'dashboard',
			'Animais' => 'animal',
			'Detalhes' => 'false'
        ];

        $animais = new Animal();

        $dados['lista'] = $animais->getEspecifico($id);
        
        if (!$dados['lista']) {
            header("Location:".BASE_URL."animal");
        }
        
        $this->setBreadCrumb($breadcrumb);
        $this->loadTemplate('animalDetalhes', $dados);
    }

    # Retorna formulário cadastro Registrar Animal
    public function registrar()
    {   
        $breadcrumb = [
			'Início' => 'dashboard',
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
        $data_nascimento = $_POST['data_nascimento'] == "" ? null : implode('-', array_reverse(explode('/', $_POST['data_nascimento'])));
        $id_especie = $_POST['id_especie'];
        $id_raca = $_POST['id_raca'];
        $sexo = $_POST['sexo'];
        $pelagem = $_POST['pelagem'];
        $proprietario = $_POST['proprietario'];
        $flag_castrado = $_POST['castrado'];
        $flag_filhotes =  $_POST['filhotes'];
        $numero_microchip = $_POST['numero_microchip'] == "" ? null : $_POST['numero_microchip'];
        $data_microchip = $_POST['data_microchip'] == "" ? null : implode('-', array_reverse(explode('/', $_POST['data_microchip'])));
        $local_implatacao = $_POST['local_implatacao'] == "" ? null : $_POST['local_implatacao'];

        $animal = new Animal();
        
        if ($animal->add($nome_animal, $identificacao, $data_nascimento, $id_especie, $id_raca, $sexo, $pelagem, $proprietario, $flag_castrado, $flag_filhotes, $numero_microchip, $data_microchip, $local_implatacao)) {
            $_SESSION['msg'] = 'registrado';
            header("Location: ".BASE_URL."animal");
        } 
    }

    public function deletar($id)
    {
        if (!empty($id)) {
            $animal = new Animal();
            $animal->delete($id);
        }
      $_SESSION['msg'] = 'deletado';
      header("Location: ".BASE_URL."animal");
    }

    // Retorna as raças via Ajax apos selecionar o id_raca e enviar via POST (view registrar animal)
    public function pegarracasporespecie() {
    
        if (isset($_POST['id_especie'])) {
            
            $idEspecie = $_POST['id_especie'];
            $especie = new AnimalEspecie();
            $array = $especie->getEspecie($idEspecie);

            echo json_encode($array);
            exit;
        }
    }

    public function editar($idAnimal)
    {   
        $dados = array();
    
        if (!empty($idAnimal)) {
            
            $animal = new Animal();
          
            // Usado para editar
            if (!empty($_POST['id_animal'])) {
                
                $nome_produto = $_POST['nome_produto'];
                $dose = str_replace(',', '.',str_replace('.', '', $_POST['dose']));
                $data_aplicacao = implode('-', array_reverse(explode('/', $_POST['data_aplicacao'])));
                $data_prox_dose = implode('-', array_reverse(explode('/', $_POST['data_prox_dose'])));
                $nome_veterinario = $_POST['nome_veterinario'];
                $registro_crmv = $_POST['registro_crmv'];

                $vermifugacao->edit($idAnimal, $nome_produto, $dose, $data_aplicacao, $data_prox_dose, $nome_veterinario, $registro_crmv);
                
                $_SESSION['msg'] = 'editado_sucesso';
                header("Location: ".BASE_URL."animal");

            } else {
                
                $breadcrumb = [
                    'Início' => 'dashboard',
                    'Animal' => 'animal',
                    'Editar' => 'false'
                ];

                $dados['info'] = $animal->getEspecificoDado($idAnimal);

                $proprietarios = new Proprietario();
                $dados['proprietarios'] = $proprietarios->getAll();
                
                $especies = new AnimalEspecie();
                $dados['especies'] = $especies->getAll();

                if (isset($dados['info'][0]['id_animal'])) {
                    $this->setBreadCrumb($breadcrumb);
                    $this->loadTemplate('animalEditar',$dados);
                }
            }
            
        } else {
            header("Location: ".BASE_URL);
        }
    }
}