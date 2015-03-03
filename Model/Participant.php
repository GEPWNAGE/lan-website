<?php
/**
 * Class Participant
 */
class Participant extends AppModel{
    public $actsAs = array(
        'Serializable.Serializable' => array(
            'fields' => array("info")
        )
    );
}