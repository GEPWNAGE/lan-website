<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

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

	private function filterParticipants($participants = array()){
		foreach($this->request->params['named'] as $key => $value){
			$participants = array_filter($participants, function($participant) use ($key, $value){
				if(Hash::get($participant, "Participant.".$key) === null){
					return true;
				}
				return (Hash::get($participant, "Participant.".$key) == $value);
			});
		}
		return $participants;
	}

    public function listing(){
        $participants = $this->Participant->find('all');
        $this->set(compact("participants"));
    }

	public function admin_index(){
		$participants = $this->filterParticipants($this->Participant->find('all'));

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

	public function admin_mail(){

		if($this->request->is('post')){
			$email = new CakeEmail();
			$email->from(array('lan@gepwnage.nl' => 'GEPWNAGE'));
			$email->subject($this->request->data("Email.Subject"));
			$email->emailFormat('html');
			$count = 0;
			$fail = array();
			foreach($this->request->data("Email.participant") as $id => $val){
				if($val == 0) continue;

				$participant = $this->Participant->findById($id);
				$content = wordwrap(nl2br(str_replace(array("[name]"), $participant['Participant']['name'], $this->request->data("Email.Content"))), 70);
				$email->to($participant['Participant']['email']);
				if($email->send($content)){
					$count ++;
				} else {
					$fail[] = $participant['Participant']['name'];
				}
			}
			$flash = 'Mail verstuurd naar '.$count.' deelnemer(s).';
			if(count($fail) > 0){
				$flash .= "<br> Niet gelukt om naar de volgende e-mail adressen iets te sturen:<br>".implode("<br>", $fail);
			}

			$this->Session->setFlash($flash);
			$this->redirect(array("controller" => "participants", "action" => "index", "admin" => true));
			return;
		}

		$participants = $this->filterParticipants($this->Participant->find('all'));
		$title_for_layout = "Deelnemers mailen";
		$icon_for_layout = "envelope-o";
		$this->set(compact("participants", "title_for_layout", "icon_for_layout"));


	}
}