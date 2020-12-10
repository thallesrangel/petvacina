<?php

if (!isset($_SESSION['id_usuario'])) {
    header("Location:".BASE_URL."login");
    die();   
}

class animalEspecieController extends Controller 
{   

    public function index()
    {   
        $breadcrumb = [
			'Início' => '',
			'Espécie' => 'false',
			'Listagem' => 'false'
        ];

        $animais = new AnimalEspecie();
        
        $dados['lista'] = $animais->getAll();
        $this->setBreadCrumb($breadcrumb);
        $this->loadTemplate('animalEspecieList', $dados);
    }

    public function registrar()
    {
        $breadcrumb = [
			'Início' => '',
			'Espécie' => 'false',
			'Registrar' => 'false'
        ];

        $dados = [];

        $this->setBreadCrumb($breadcrumb);
        $this->loadTemplate('animalEspecieRegistrar', $dados);

    }
    
    public function registrar_save()
    {      
        $nome_especie = $_POST['nome_especie'];

        $animalEspecie = new AnimalEspecie();
         
        if ($animalEspecie->add($nome_especie)) {
            $_SESSION['msg'] = 'registrado';
            header("Location: ".BASE_URL."animalespecie");
        } 
    }

    
    public function deletar($id)
    {
      if(!empty($id)) {
          $animal = new AnimalEspecie();
          $animal->delete($id);
      }
      $_SESSION['msg'] = 'deletado';
      header("Location: ".BASE_URL."animalespecie");
    }
    

    public function editar_salvar(){

            
        $animalEspecie = new AnimalEspecie();
          
        // Usado para editar
        if (!empty($_POST['id_especie'])) {
            
            $idEspecie = $_POST['id_especie'];
            $nome_especie = $_POST['nome_especie'];
    
            $animalEspecie->edit($idEspecie, $nome_especie);
            
            $_SESSION['msg'] = "editado_sucesso";
            header("Location: ".BASE_URL."animalespecie");
        }
    }

    public function editar($idEspecie)
    {   
        $dados = array();
    
        if (!empty($idEspecie)) {
 
            $animalEspecie = new AnimalEspecie();
  
            $breadcrumb = [
                'Início' => '',
                'Espécie' => 'animalespecie',
                'Editar' => 'false'
            ];

            $dados['info'] = $animalEspecie->getEspecificoDado($idEspecie);

            
            if (isset($dados['info'][0]['id_especie'])) {
                $this->setBreadCrumb($breadcrumb);
                $this->loadTemplate('animalEspecieEditar', $dados);
            }
        
        } else {
            header("Location: ".BASE_URL);
        }
    }
}