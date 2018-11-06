<?php

class categoriasController extends AppController{

    	public function __construct(){

		parent::__construct();

		$this->_view = new View(new Request);
		$this->_messages = new \Plasticbrain\flashMessages\flashMessages();

    }
    
    
	public function index(){

		$categorias = $this->loadmodel("categoria");
		$this->_view->categorias = $categorias->listarTodo();
		
		$this->_view->titulo = "Listado de categorías";
		$this->_view->renderizar("index");
	
	}

}