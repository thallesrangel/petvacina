<?php

class proprietarioreportController extends Controller
{   
    public function __construct()
    {
        if(empty($_SESSION['id_usuario'])){
            header("Location: ".BASE_URL."login");
        }
    }
    
    public function render()
    {      
        new ReportProprietario();
    }
}