<?php

class contatosController extends Controller 
{   
    public function index() {}

    // Retorna a view formulário registrar
    public function registrar()
    {
        $dados = [];

        $this->loadTemplate('registrar', $dados);
    }
    
    // Salva
    public function registrar_save()
    {   
       $nome = $_POST['nome'];
       $email = $_POST['email'];

       $contatos = new Contatos();
       if( $contatos->add($nome,$email)) {
            header("Location: ".BASE_URL);
       } else {
            header("Location: ".BASE_URL.'contatos/add?error=exist');
       }   
    }
    // P/ VIEW
    public function edit($id)
    {   
        $dados = array();
    
        if(!empty($id)) {

            $contatos = new Contatos();
            
            // Usado para editar
            if(!empty($_POST['nome'])) {
            
                $nome = $_POST['nome'];
                $contatos->edit($nome,$id);

                header("Location: ".BASE_URL);
            } else {
                $dados['dados'] = $contatos->get($id);

                if (isset($dados['dados']['id'])) {
                    $this->loadTemplate('edit',$dados);
                }
            }
        } else {
            header("Location: ".BASE_URL);
        }
    }

    public function deletar($id)
    {
      if(!empty($id)) {
          $contatos = new Contatos();
          $contatos->delete($id);
      }

      header("Location: ".BASE_URL);
    }
}