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
			'Raça' => 'animalraca',
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
        $id_especie = $_POST['id_especie'];
        $nome_raca = $_POST['nome_raca'];

        $animalRaca = new AnimalRaca();
         
        if ($animalRaca->add($id_especie, $nome_raca)) {
            $_SESSION['msg'] = 'registrado';
            header("Location: ".BASE_URL."animalraca");
        } 
    }

    
    public function deletar($idRaca)
    {
        if (!empty($idRaca)) {
          $animalRaca = new AnimalRaca();
          $resultado = $animalRaca->delete($idRaca);
          
          if ($resultado == true) {
            $_SESSION['msg'] = 'deletado';
          } else {
            $_SESSION['msg'] = 'deletado_sem_permissao';
          };
        }
      
      header("Location: ".BASE_URL."animalraca");
    }
    

    public function editar_salvar()
    {       
        $animalRaca = new AnimalEspecie();
          
        // Usado para editar
        if (!empty($_POST['id_raca'])) {
            
            $idRaca = $_POST['id_raca'];
            $id_especie = $_POST['id_especie'];
            $nome_raca = $_POST['nome_raca'];
    
            $animalRaca->edit($idRaca, $id_especie, $nome_raca);
            
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
