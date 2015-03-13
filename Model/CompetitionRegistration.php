<?php
class CompetitionRegistration extends AppModel {
	public $belongsTo = array(
		'Competition', 'Gamer'
	);
}