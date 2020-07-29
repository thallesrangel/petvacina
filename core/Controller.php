<?php

class Controller 
{   

    private $breadcrumb;

    public function getBreadCrumb(){ return $this->breadcrumb;}
    public function setBreadCrumb($breadcrumb){$this->breadcrumb = $breadcrumb;}

    # Carrega o view
    public function loadView($viewName, $dados = array())
    {   
        extract($dados);
    // Extract passa a key do array $variavel = $value para usar na view
        require_once "views/".$viewName.'.php';
    }

    public function loadTemplate($viewName, $dados = array(), $breadcrumb = false)
    {
        require "views/template.php";
    }
    
    # Retorna template padrao (USADO DENTRO DO TEMPLATE PARA IMPORTAR)
    public function loadViewInTemplate($viewName, $dados = array()) {
        extract($dados);
        require_once "views/".$viewName.'.php';
    }



    public function addBreadCrumb(){
        $pegarBread = $this->getBreadCrumb();

        foreach ($pegarBread as $key => $value) {
            
        if($value == 'false'){
            echo "<span>".$key."</span>";
        } else{
            echo "<a href=".BASE_URL.$value." > ".$key ."</a>";
        }
        
        echo " / ";
        }
    }
}