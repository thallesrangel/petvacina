<?php

class higieneController extends Controller 
{   
    public function index() 
    {
        $animais = new Animal();

        $dados['lista'] = $animais->getAllResumido();
    
        $this->loadTemplate('higieneList', $dados);
    }


    public function detalhes($id) 
    {
        $higiene = new Higiene();
        $animal = new Animal();
        $dados['animal'] = $animal->getEspecifico($id);
        $dados['lista'] = $higiene->getEspecifico($id);

        $this->loadTemplate('higieneDetalhes', $dados);
    }

    public function registrar()
    {   
        $prestador = new Prestador();
        $higiene_tipo = new HigieneTipo();
        $dados['prestador'] = $prestador->getAll();
        $dados['higiene_tipo'] = $higiene_tipo->getAll();

        $this->loadTemplate('higieneRegistrar', $dados);
    }

    public function registrar_save($idAnimal)
    {   
        $id_animal = $idAnimal;
        $id_higiene_tipo = $_POST['id_higiene_tipo'];
        $id_prestador = $_POST['id_prestador'];
        $valor_total = $_POST['valor_total'];
        $data_servico = implode('-', array_reverse(explode('/', $_POST['data_servico'])));
        $data_prox_servico = implode('-', array_reverse(explode('/', $_POST['data_prox_servico'])));

        $higiene = new Higiene();
        
        if ($higiene->add($id_animal, $id_higiene_tipo, $id_prestador, $valor_total, $data_servico, $data_prox_servico)) {
            header("Location: ".BASE_URL."higiene/detalhes/".$idAnimal);
        } 
    }

    public function deletar($id)
    {
      if (!empty($id)) {
        $higiene = new Higiene();
        $higiene->delete($id);
      }

      header("Location: ".BASE_URL."higiene");
    }
}