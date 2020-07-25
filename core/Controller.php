<?php

class Controller 
{   
    # Carrega o view
    public function loadView($viewName, $dados = array())
    {   
        extract($dados);
    // Extract passa a key do array $variavel = $value para usar na view
        require_once "views/".$viewName.'.php';
    }

    public function loadTemplate($viewName, $dados = array())
    {
        require "views/template.php";
    }
    
    # Retorna template padrao (USADO DENTRO DO TEMPLATE PARA IMPORTAR)
    public function loadViewInTemplate($viewName, $dados = array()) {
        extract($dados);
        require_once "views/".$viewName.'.php';
    }
}