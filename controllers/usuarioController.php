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
        $nome_usuario = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $email = $_POST['email'];
        $senha = md5($_POST['senha']);
        $id_estado = $_POST['id_estado'];
        $id_cidade = $_POST['id_cidade'];

        $usuario = new Usuario();
        
        if ($usuario->add($nome_usuario, $sobrenome, $email, $senha, $id_estado, $id_cidade)) {
            header("Location: ".BASE_URL."login");
        } 
    }
}
