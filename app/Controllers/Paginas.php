<?php

class Paginas extends Controller {

    public function index(){
        $dados = ['tituloPagina' => 'Paginas inicial'];
        $this->view('paginas/home', $dados);
    }

    public function sobre(){    
        $dados = ['tituloPagina' => 'sobre bos'];
        $this->view('paginas/sobre', $dados);   

    }

 

    


}