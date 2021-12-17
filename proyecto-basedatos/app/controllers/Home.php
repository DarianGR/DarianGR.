<?php

# Carga Inicial

class Home extends Controller{
    public function __construct()    {
        // TODO
    }

    public function index(){
        $data=[
            'bienvenida' => 'Bienvenido/a'
        ];
        $this->view('index',$data);
    }
}