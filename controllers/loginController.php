<?php

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
        # Verifica se retornou algo do banco de dados
        if(!empty($dados)) {
            $id_usuario = $dados['id_usuario'];
            $email = $dados['email_usuario'];
            $senha = $dados['senha'];
        } else {
            $_SESSION["msg"] = "email_ou_senha_incorreto";
            header("Location:".BASE_URL."login");
        }
  
        if (!empty($email)) {
  
            if($senha == md5($senhaPost)){
                $_SESSION['id_usuario'] = $dados['id_usuario'];
                $_SESSION['nome_usuario'] = $dados['nome_usuario'];
                $_SESSION['url_img_perfil'] = $dados['url_img_perfil'];
                header("Location:".BASE_URL."dashboard");
            } else {
                $_SESSION["msg"] = "email_ou_senha_incorreto";
                header("Location:".BASE_URL."login");
            }
        }
    
    }

    public function logout() {
        
        unset($_SESSION);

        if(empty($_SESSION['id_usuario'])) {
            header("Location:".BASE_URL."login");
        }
    }
}
