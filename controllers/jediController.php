<?php

class jediController extends Controller {
	
	public function index() {
		$examples=$this->model->load();
        $this->setResponce($examples);
	}
	
	public function view($data) {
		$example=$this->model->load($data['id']);
        $this->setResponce($example);
	}
	
	public function add() {
		
        $_POST=json_decode(file_get_contents('php://input'),true);
        
		if( (isset($_POST['id'])) && (isset($_POST['name'])) && (isset($_POST['image'])) 
			&& (isset($_POST['power'])) && (isset($_POST['speed'])) ) {
				
				$dataToSave=array(
					'id'=>$_POST['id'], 
					'name'=>$_POST['name'],
					'image'=>$_POST['image'],
					'power'=>$_POST['power'],
					'speed'=>$_POST['speed']);
				
				$addedItem=$this->model->create($dataToSave);
				$this->setResponce($addedItem);
			}
	}
	
	public function edit($data) {
		
		$_PUT=json_decode(file_get_contents('php://input'),true);
		
		if( (isset($_POST['id'])) && (isset($_POST['name'])) && (isset($_POST['image'])) 
			&& (isset($_POST['power'])) && (isset($_POST['speed'])) ){
			
			$dataToUpdate=array(
					'id'=>$_POST['id'], 
					'name'=>$_POST['name'],
					'image'=>$_POST['image'],
					'power'=>$_POST['power'],
					'speed'=>$_POST['speed']);            
			
            $updatedItem=$this->model->save($data['id'], $dataToUpdate);
			$this->setResponce($updatedItem);
			}
	}
	
	public function delete($data) {
		$example = $this->model->delete($data['id']);
        $this->setResponce($example);
	}
}