<?php

if (!isset($_SESSION['id_usuario'])) {
    header("Location:".BASE_URL."login");
    die();   
}

class animalRacaController extends Controller 
{   
    public function index()
    {   
        $breadcrumb = [
			'Início' => '',
			'Raça' => 'false',
			'Listagem' => 'false'
        ];

        $animais = new AnimalRaca();
        
        $dados['lista'] = $animais->getAll();

        $this->setBreadCrumb($breadcrumb);
        $this->loadTemplate('animalRacaList', $dados);
    }

    public function registrar()
    {
        $breadcrumb = [
			'Início' => '',
			'Raça' => 'false',
			'Registrar' => 'false'
        ];

        $especies = new AnimalEspecie();
        $dados['especies'] = $especies->getAll();

        $this->setBreadCrumb($breadcrumb);
        $this->loadTemplate('animalRacaRegistrar', $dados);
    }
    
    public function registrar_save()
    {      
        $nome_raca = $_POST['nome_raca'];

        $animalRaca = new AnimalRaca();
         
        if ($animalRaca->add($nome_raca)) {
            $_SESSION['msg'] = 'registrado';
            header("Location: ".BASE_URL."animalraca");
        } 
    }

    
    public function deletar($idRaca)
    {
        if (!empty($idRaca)) {
          $animalRaca = new AnimalRaca();
          $animalRaca->delete($idRaca);
        }
      $_SESSION['msg'] = 'deletado';
      header("Location: ".BASE_URL."animalraca");
    }
    

    public function editar_salvar()
    {       
        $animalRaca = new AnimalEspecie();
          
        // Usado para editar
        if (!empty($_POST['id_raca'])) {
            
            $idRaca = $_POST['id_raca'];
            $nome_raca = $_POST['nome_raca'];
    
            $animalRaca->edit($idRaca, $nome_raca);
            
            $_SESSION['msg'] = "editado_sucesso";
            header("Location: ".BASE_URL."animalraca");
        }
    }

    public function editar($idRaca)
    {   
        $dados = array();
    
        if (!empty($idRaca)) {
 
            $animalRaca = new AnimalRaca();
  
            $breadcrumb = [
                'Início' => '',
                'Raça' => 'animalraca',
                'Editar' => 'false'
            ];

            $dados['info'] = $animalRaca->getEspecificoDado($idRaca);

            
            if (isset($dados['info'][0]['id_raca'])) {
                $this->setBreadCrumb($breadcrumb);
                $this->loadTemplate('animalRacaEditar', $dados);
            }
        
        } else {
            header("Location: ".BASE_URL);
        }
    }
}
