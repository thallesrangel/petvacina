<?php

class Core
{
    public function start() {
    #RETORNA TODA URL NA ORDEM (CONTROLLER/ACTION/PARAM)
    #www.site.com.br/index.php?url=controller  do htaccess
    $url = '/';
    if (isset($_GET['url'])) {
        $url .= $_GET['url'];
    }

    # Parametros vazio
    $params = array();

    if (!empty($url) && $url != '/') {
        $url = explode('/', $url);
        
        #Remove o primeiro indice do array que não serve para nada
        array_shift($url);

        # Retorna Controller
        $currentController = $url[0].'Controller';
        
        #Remove o controller do array pois já foi usado acima
        array_shift($url); // agora passa a ser a action, action é opcional

        # Verifica se possui action
        if (isset($url[0]) && !empty($url[0])) {
            $currentAction = $url[0];
            array_shift($url);
        } else {
            $currentAction = 'index';
        }

        # Verifica se possui parametros
        if (count($url) > 0) {
             $params = $url;
        }
 
    } else {
        # Default values case no send values (HOME CONTROLLER E ACTION INDEX)
        $currentController = 'homeController';
        $currentAction = 'index';
    }

    /*---------*/
    
    if ( !(file_exists('controllers/'.$currentController.'.php') || file_exists('controllersReport/'.$currentController.'.php')) || !method_exists($currentController, $currentAction)) {
        $currentController = 'notfoundController';
        $currentAction = 'index';
    } 

    # Instancia dinamicamente
    $c = new $currentController();
    # Serve para executar a action dentro do controller e envias parametros
    call_user_func_array(array($c, $currentAction), $params);

        // echo "CONTROLLER: ".$currentController."<br>";
        // echo "ACTION: ". $currentAction."<br>";
        // echo "PARAMS: " .print_r($params,true);
    }
}