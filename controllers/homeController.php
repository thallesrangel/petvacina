<?php

if(!isset($_SESSION['id_usuario'])) {
    header("Location:".BASE_URL."login");
    die();   
}

class HomeController extends Controller
{   
    public function index() 
    {   
        $lista = [];
        $qtd_animais = new Animal();
        $qtd_vacinas = new Vacina();
        $qtd_vermifigos = new Vermifugacao();

        $lista['qtd_animais'] = $qtd_animais->count();
        $lista['qtd_vacinas'] = $qtd_vacinas->count();
        $lista['qtd_vermifugacao'] = $qtd_vermifigos->count();
        
        $this->loadTemplate('home', $lista);
    }    
}


