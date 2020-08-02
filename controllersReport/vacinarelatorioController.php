<?php

class vacinarelatorioController extends Controller 
{   
    public function index()
    {   
        $dados = [];
        $this->loadViewReport('cartaoVacinaReport', $dados);
    }
}