<?php
App::uses('AppController', 'Controller');

class GamersController extends AppController{

	public function beforeFilter(){
		$title_for_layout = "Gamers";
		$icon_for_layout = "gamepad";
		$this->set(compact(array("title_for_layout", "icon_for_layout")));
		parent::beforeFilter();
	}

	public function admin_index(){
		$gamers = $this->Gamer->find('all');
		$this->set(compact("gamers"));
	}

	public function add(){
		$this->set('title_for_layout', "Netwerk registratie");
		if($this->request->is('post')){
			$this->request->data['Gamer']['ip'] = $this->request->clientIp();
			$macAddress = $this->Gamer->getMacAddress($this->request->clientIp());


			if($this->Gamer->save($this->request->data)){
				$this->redirect(array("controller" => "pages", "action" => "display", "home"));
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


}