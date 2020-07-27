<?php

if(isset($_SESSION['id_usuario'])) {
    header("Location:".BASE_URL."");
}

class loginController extends Controller 
{   
    public function index() {
        $this->loadView('login');
    }
    
    public function logar()
    {   
        if (isset($_POST['email']) && !empty($_POST['email'])) {
            $emailPost = trim($_POST['email']);
            $senhaPost = trim($_POST['senha']);
        } 

        $usuario = new Usuario();
        $resultado = $usuario->buscarUsuario($emailPost);

        $dados = [];
    
        foreach($resultado as $item ){
            $dados = $item;
        }
    
        $id_usuario = $dados['id_usuario'];
        $email = $dados['email_usuario'];
        $senha = $dados['senha'];
  
        if (!empty($email)) {
  
            if($senha == md5($senhaPost)){
                $_SESSION['id_usuario'] = $dados['id_usuario'];
                $_SESSION['nome_usuario'] = $dados['nome_usuario'];
                header("Location:".BASE_URL."");
            } else {
                $_SESSION["mensagem"] = "email_senha_incorreto";
                header("Location:".BASE_URL."login");
            }
        }
    
    }


    public function logout() {
        
        session_destroy();

        if( isset($_SESSION['id_usuario'])){
            header("Location:".BASE_URL."login");
        }
    }
}
