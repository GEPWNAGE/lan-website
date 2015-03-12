<?php
App::uses('AppController', 'Controller');

class CompetitionsController extends AppController{

	public function beforeFilter(){
		$title_for_layout = "Competitions";
		$icon_for_layout = "trophy";
		$this->set(compact(array("title_for_layout", "icon_for_layout")));
		parent::beforeFilter();
	}

	public function admin_index(){
		$competitions = $this->Competition->find('all');
		$this->set(compact("competitions"));
	}

	public function admin_add(){
		if($this->request->is('post')){
			if($this->Competition->save($this->request->data)){
				$this->redirect(array("controller" => "competitions", "action" => "index", "admin" => true));
				return;
			}
		}
	}
	public function admin_edit($id){
		if($this->request->is('put')){
			if($this->Competition->save($this->request->data)){
				$this->redirect(array("controller" => "competitions", "action" => "index", "admin" => true));
				return;
			}
		} else {
			$competition = $this->Competition->find('first', array("conditions" => array("Competition.id" => $id)));
			$this->request->data = $competition;
		}

		$this->set(compact(array("competition")));
	}
	public function admin_delete($id){
		$participant = $this->Competition->find('first', array("conditions" => array("Competition.id" => $id)));
		if(!$participant){
			throw new NotFoundException();
		}

		$this->Competition->delete($id);
		$this->redirect(array("controller" => "competitions", "action" => "index", "admin" => true));
	}
}