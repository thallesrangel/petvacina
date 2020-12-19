<?php

class vacinarelatorioController extends Controller 
{   
    public function __construct()
    {
        if(empty($_SESSION['id_usuario'])){
            header("Location: ".BASE_URL."login");
        }
    }

    public function index()
    {   
        $dados = [];

        $vacinas = new Vacina();
        $dados['vacinas'] = $vacinas->getAll();
        $this->loadViewReport('cartaoVacinaReport', $dados);
    }
}