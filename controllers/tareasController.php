<?php

class tareasController extends AppController{

	
	public function __construct(){

		parent::__construct();

		$this->_view = new View(new Request);
		$this->_messages = new \Plasticbrain\flashMessages\flashMessages();

	}

	public function index(){

		$tareas = $this->loadmodel("tarea");
		$this->_view->tareas = $tareas->getTareas();
		
		$this->_view->titulo = "Listado de tareas";
		$this->_view->renderizar("index");
	
	}

	public function Agregar(){

		if($_POST){

			$tareas = $this->loadModel("tarea");

				if ($tareas->guardar($_POST)){

					$this->_messages->success(

						'Tarea guardada correctamente', 
						$this->redirect(array("controller"=>"tareas"))

					);

				}

		}

		$categorias = $this->loadModel("categoria");
		$this->_view->categorias = $categorias->listarTodo();

		$this->_view->titulo = "Agregar tarea";
		$this->_view->renderizar("agregar");


	}

	public function editar($id=null){

		if($_POST){

			$tarea = $this->loadModel("tarea");

			if($tarea->actualizar($_POST)){

				$this->_messages->success(
				
					'Tarea editada correctamente', 
					$this->redirect(array("controller"=>"tareas"))

				);

			}else{


				$this->_messages->error(
				
					'Error al editar la tarea', 
					$this->redirect(array("controller"=>"tareas"))

				);

			}
			

		}

		$tarea = $this->loadModel("tarea");
		$this->_view->tarea = $tarea->buscarPorId($id);

		$categorias = $this->loadModel("categoria");
		$this->_view->categorias = $categorias->listarTodo();

		$this->_view->titulo = "Editar tarea";
		$this->_view->renderizar("editar");

	}

	public function eliminar ($id){

		$tarea = $this->loadModel("tarea");
		$registro = $tarea->buscarPorId($id);

		if(!empty($registro)){

			$tarea->eliminarPorId($id);
			
			$this->_messages->success(
				
				'Tarea eliminada correctamente', 
				$this->redirect(array("controller"=>"tareas"))

			);

		}

	}

	public function cambiarEstado($id, $status){

		$tarea = $this->loadModel("tarea");
	
		if($status=="off"){

			$status = 1;

		}elseif($status=="on"){

			$status = 0;

		}

		$tarea->status($id, $status);
		
			$this->_messages->success(
					
				'Cambio de estado realizado', 
				$this->redirect(array("controller"=>"tareas"))

			);

	}

}
