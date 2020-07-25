<?php

class HomeController extends Controller
{   
    public function index() 
    {   
        $dados = [];
        
        $this->loadTemplate('home', $dados);
    }    
}


