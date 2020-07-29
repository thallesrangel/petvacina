<?php


class relatorioController extends Controller 
{   
    public function index() {
        $dados = [];
        $this->loadTemplate('relatorio', $dados);
    }
}
