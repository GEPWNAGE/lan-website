<?php
App::uses('AppController', 'Controller');
class ParticipantsController extends AppController{

    public function listing(){
        $participants = $this->Participant->find('all');
        $this->set(compact("participants"));
    }
}