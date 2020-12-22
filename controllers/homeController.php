<?php


class HomeController extends Controller
{   
    public function index() 
    {   
        $this->loadViewPublic('public_home');
    }    
}


