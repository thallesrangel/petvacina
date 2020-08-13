<?php

class vacinarelatorioController extends Controller 
{   
    public function index()
    {   
        $dados = [];

        $vacinas = new Vacina();
        $dados['vacinas'] = $vacinas->getAll();
        $this->loadViewReport('cartaoVacinaReport', $dados);
    }
}