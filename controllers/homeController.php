<?php

if(!isset($_SESSION['id_usuario'])) {
    header("Location:".BASE_URL."login");
    die();   
}

class HomeController extends Controller
{   
    public function index() 
    {   
        $dados = [];
        
        $this->loadTemplate('home', $dados);
    }    
}


