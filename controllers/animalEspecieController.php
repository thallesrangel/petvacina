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
			'Espécies' => 'false',
			'Listagem' => 'false'
        ];

        $animais = new AnimalEspecie();
        
        $dados['lista'] = $animais->getAll();
        $this->setBreadCrumb($breadcrumb);
        $this->loadTemplate('animalEspecieList', $dados);
    }
    
    /*
    public function deletar($id)
    {
      if(!empty($id)) {
          $animal = new Animal();
          $animal->delete($id);
      }
      $_SESSION['msg'] = 'deletado';
      header("Location: ".BASE_URL."animal");
    }
    */
}