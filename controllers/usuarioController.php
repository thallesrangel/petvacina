<?php


class usuarioController extends Controller 
{   
    public function registrar() {
       
                
        $dados = [];

        $estado = new Estado();
        $dados['estado'] = $estado->getAll();
        
        $this->loadView('usuarioRegistrar', $dados);
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
        if ($this->existeEmail($_POST['email']) == false) {
            $nome_usuario = $_POST['nome'];
            $sobrenome = $_POST['sobrenome'];
            $email = $_POST['email'];
            $senha = md5($_POST['senha']);
            $id_estado = $_POST['id_estado'];
            $id_cidade = $_POST['id_cidade'];

            $usuario = new Usuario();
            $proprietario = new Proprietario();
            $idUsuarioGerado = $usuario->add($nome_usuario, $sobrenome, $email, $senha, $id_estado, $id_cidade);
           
            if ($idUsuarioGerado > 0) {
                $proprietario->add($idUsuarioGerado, $nome_usuario, $sobrenome,$data_nascimento = null, $contato  = null, $email, $id_estado, $id_cidade, $endereco_bairro = null, $endereco_rua = null, $endereco_numero  = null, $endereco_complemento  = null, $endereco_referencia  = null);
                header("Location: ".BASE_URL."login");
            } 
        } else {
            $_SESSION['msg'] = "email_utilizado";
            header("Location: ".BASE_URL."usuario/registrar");
        }
    }

    public function existeEmail($email)
    {   
        $usuario = new Usuario();
        return $usuario->getExisteEmail($email);
    }

    public function perfil()
    {

        $breadcrumb = [
			'Início' => '',
			'Usuário' => 'false',
			'Perfil' => 'false'
        ];

        $usuario = new Usuario();
        $dados['usuario'] = $usuario->getUsuario();;
       
        $this->setBreadCrumb($breadcrumb);
        $this->loadTemplate('perfil', $dados);
    }
}
