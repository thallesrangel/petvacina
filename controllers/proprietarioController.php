<?php

if (!isset($_SESSION['id_usuario'])) {
    header("Location:".BASE_URL."login");
    die();   
}

class proprietarioController extends Controller 
{   
    public function index() {

        $breadcrumb = [
			'Início' => 'dashboard',
			'Proprietários' => 'peso',
			'Listagem' => 'false'
        ];

        $proprietario = new Proprietario();
        $dados['proprietario'] = $proprietario->getAllResumido();

        if (!$dados['proprietario']) {
            header("Location:".BASE_URL."proprietario");
        }

        $this->setBreadCrumb($breadcrumb);
        $this->loadTemplate('proprietarioList', $dados);
    }

    // Retorna a view formulário registrar
    public function registrar()
    {   
        $breadcrumb = [
			'Início' => 'dashboard',
			'Proprietários' => 'proprietario',
			'Registrar' => 'false'
        ];

        $dados = [];
        $estado = new Estado();
        $dados['estado'] = $estado->getAll();

        $this->setBreadCrumb($breadcrumb);
        $this->loadTemplate('proprietarioRegistrar', $dados);
    }

    // Retorna as cidades via Ajax apos selecionar o id_estado e enviar via POST (view registrar usuario)
    public function pegarcidades() {
    
        if (isset($_POST['id_estado'])) {
            $idEstado = $_POST['id_estado'];
            $cidade = new Cidade();
            $array = $cidade->getCidades($idEstado);
            echo json_encode($array);
            exit;
        }

    }

    public function registrar_save()
    {      
        $id_usuario = $_SESSION['id_usuario'];
        $nome_proprietario = $_POST['nome_proprietario'];
        $sobrenome_proprietario = $_POST['sobrenome_proprietario'];
        $data_nascimento = $_POST['data_nascimento'] ? implode('-', array_reverse(explode('/', $_POST['data_nascimento']))) : null;
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
         
        if ($proprietario->add($id_usuario, $nome_proprietario, $sobrenome_proprietario, $data_nascimento, $contato, $email, $endereco_estado, $endereco_cidade, $endereco_bairro, $endereco_rua, $endereco_numero, $endereco_complemento, $endereco_referencia)) {
            $_SESSION['msg'] = 'registrado';
            header("Location: ".BASE_URL."proprietario");
        } 
    }

    public function deletar($id)
    {
      if(!empty($id)) {
          $proprietario = new Proprietario();
          $proprietario->delete($id);
      }
      $_SESSION['msg'] = 'deletado';
      header("Location: ".BASE_URL."proprietario");
    }


    public function editar($idProprietario)
    {   
        $dados = array();
    
        if (!empty($idProprietario)) {
            
            $proprietario = new Proprietario();
          
            // Usado para editar
            if (!empty($_POST['id_proprietario'])) {
                
                    $nome_proprietario = $_POST['nome_proprietario'];
                    $sobrenome_proprietario = $_POST['sobrenome_proprietario'];
                    $data_nascimento = $_POST['data_nascimento'] ? implode('-', array_reverse(explode('/', $_POST['data_nascimento']))) : null;
                    $contato = $_POST['contato'];
                    $email = $_POST['email'];
                    $endereco_estado = $_POST['endereco_estado'];
                    $endereco_cidade = $_POST['endereco_cidade'];
                    $endereco_bairro = $_POST['endereco_bairro'];
                    $endereco_rua = $_POST['endereco_rua'];
                    $endereco_numero = $_POST['endereco_numero'];
                    $endereco_complemento = $_POST['endereco_complemento'];
                    $endereco_referencia = $_POST['endereco_referencia'];

                $proprietario->edit($idParasita, $nome_proprietario, $sobrenome_proprietario, $data_nascimento, $contato, $email, $endereco_estado, $endereco_cidade, $endereco_bairro, $endereco_rua, $endereco_numero, $endereco_complemento, $endereco_referencia);
                
                $_SESSION['msg'] = 'editado_sucesso';
                header("Location: ".BASE_URL."proprietario");

            } else {
                
                $breadcrumb = [
                    'Início' => 'dashboard',
                    'Proprietário' => 'proprietario',
                    'Editar' => 'false'
                ];

                $dados['info'] = $proprietario->getEspecificoDado($idProprietario);
                
                $dados['id_estado'] = $proprietario->getAll();
                
                $estado = new Estado();
                $dados['estado'] = $estado->getAll();

                if (isset($dados['info'][0]['id_proprietario'])) {
                    $this->setBreadCrumb($breadcrumb);
                    $this->loadTemplate('proprietarioEditar',$dados);
                }
            }
            
        } else {
            header("Location: ".BASE_URL);
        }
    }
    
}