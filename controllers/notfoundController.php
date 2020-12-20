<?php

class notfoundController extends Controller
{   
    public function index() 
    {
        $this->loadview('404', array());
    }    
}
