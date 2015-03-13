<?php
class CompetitionRegistrationsController extends AppController {
	public function add(){
		if($this->request->is('post')){
			$this->request->data['CompetitionRegistration']['gamer_id'] = Configure::read("currentGamer.Gamer.id");

			if ( $this->CompetitionRegistration->hasAny( array(
				"CompetitionRegistration.gamer_id"       => $this->request->data['CompetitionRegistration']['gamer_id'],
				"CompetitionRegistration.competition_id" => $this->request->data['CompetitionRegistration']['competition_id'],
			) )
			) {
				$this->Session->setFlash("Je bent al ingeschreven!");
				$this->redirect($this->referer());
				return;
			}
			if($this->CompetitionRegistration->save($this->request->data)){
				$this->Session->setFlash("Je bent ingeschreven!");
				$this->redirect($this->referer());
				return;
			}
		}
	}

	public function delete(){
		$this->request->data['CompetitionRegistration']['gamer_id'] = Configure::read("currentGamer.Gamer.id");
		$this->CompetitionRegistration->deleteAll(array(
			"CompetitionRegistration.gamer_id"       => $this->request->data['CompetitionRegistration']['gamer_id'],
			"CompetitionRegistration.competition_id" => $this->request->data['CompetitionRegistration']['competition_id'],
		));
		$this->redirect($this->referer());
		return;
	}
}