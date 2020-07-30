<?php

if(!isset($_SESSION['id_usuario'])) {
    header("Location:".BASE_URL."login");
    die();   
}

class proprietarioController extends Controller 
{   
    public function index() {

        $breadcrumb = [
			'Início' => '',
			'Proprietários' => 'false',
			'Listagem' => 'false'
        ];

        $proprietario = new Proprietario();
        $dados['proprietario'] = $proprietario->getAllResumido();

        $this->setBreadCrumb($breadcrumb);
        $this->loadTemplate('proprietarioList', $dados);
    }

    // Retorna a view formulário registrar
    public function registrar()
    {   
        $breadcrumb = [
			'Início' => '',
			'Proprietários' => 'proprietario',
			'Registrar' => 'false'
        ];

        $dados = [];

        $this->setBreadCrumb($breadcrumb);
        $this->loadTemplate('proprietarioRegistrar', $dados);
    }

    public function registrar_save()
    {      
        $nome_proprietario = $_POST['nome_proprietario'];
        $sobrenome_proprietario = $_POST['sobrenome_proprietario'];
        $data_nascimento = implode('-', array_reverse(explode('/', $_POST['data_nascimento'])));
        $contato = $_POST['contato'];
        $email = $_POST['email'];
        $endereco_estado = $_POST['endereco_estado'];
        $endereco_cidade = $_POST['endereco_cidade'];
        $endereco_bairro = $_POST['endereco_bairro'];
        $endereco_rua = $_POST['endereco_rua'];
        $endereco_numero = $_POST['endereco_numero'];
        $endereco_complemento = $_POST['endereco_complemento'];
        $endereco_referencia = $_POST['endereco_referencia'];

        $proprietario = new Proprietario();
         
        if ($proprietario->add($nome_proprietario, $sobrenome_proprietario, $data_nascimento, $contato, $email, $endereco_estado, $endereco_cidade, $endereco_bairro, $endereco_rua, $endereco_numero, $endereco_complemento, $endereco_referencia)) {
            header("Location: ".BASE_URL."proprietario");
        } 
    }

    public function deletar($id)
    {
      if(!empty($id)) {
          $proprietario = new Proprietario();
          $proprietario->delete($id);
      }

      header("Location: ".BASE_URL."proprietario");
    }
    
}