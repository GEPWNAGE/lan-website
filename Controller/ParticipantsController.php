<?php
App::uses('AppController', 'Controller');
class ParticipantsController extends AppController{

	public function beforeFilter(){
		$title_for_layout = "Deelnemers";
		$icon_for_layout = "male";
		$relations = array(
			"gepwnage" => "GEPWNAGE",
			"boom" => "B.O.O.M.",
			"athena" => "Athena",
			"deloitte" => "Deloitte.",
			"gelimbo" => "Gelimbo",
			"gewis" => "GEWIS",
			"ivv" => "IVV",
		);
		$this->set(compact(array("title_for_layout", "icon_for_layout", "relations")));
		parent::beforeFilter();
	}

    public function listing(){
        $participants = $this->Participant->find('all');
        $this->set(compact("participants"));
    }

	public function admin_index(){
		$participants = $this->Participant->find('all');

		foreach($this->request->params['named'] as $key => $value){
			$participants = array_filter($participants, function($participant) use ($key, $value){
				if(Hash::get($participant, "Participant.".$key) === null){
					return true;
				}
				return (Hash::get($participant, "Participant.".$key) == $value);
			});
		}

		$this->set(compact("participants"));
	}

	public function admin_add(){
		if($this->request->is('post')){
			if($this->Participant->save($this->request->data)){
				$this->redirect(array("controller" => "participants", "action" => "index", "admin" => true));
				return;
			}
		}
	}
	public function admin_edit($id){
		if($this->request->is('put')){
			if($this->Participant->save($this->request->data)){
				$this->redirect(array("controller" => "participants", "action" => "index", "admin" => true));
				return;
			}
		} else {
			$participant = $this->Participant->find('first', array("conditions" => array("Participant.id" => $id)));
			$this->request->data = $participant;
		}

		$this->set(compact(array("participant")));
	}

	public function admin_delete($id){
		$participant = $this->Participant->find('first', array("conditions" => array("Participant.id" => $id)));
		if(!$participant){
			throw new NotFoundException();
		}

		$this->Participant->delete($id);
		$this->redirect(array("controller" => "participants", "action" => "index", "admin" => true));
	}
}