<?php
/**
 * Class Competition
 */
class Competition extends AppModel{
	public $actsAs = array(
		'Serializable.Serializable' => array(
			'fields' => array("info")
		),
		'Slugomatic.Slugomatic' => array(
			'fields' => 'name',
		)
	);

	public $hasAndBelongsToMany = array("Participant");

	/**
	 * static enum: Model::function()
	 * @access static
	 */
	public static function gameModes($value = null) {
		$options = array(
			self::MODE_KNOCKOUT => __('Knockout',true),
		);
		return parent::enum($value, $options);
	}

	const MODE_KNOCKOUT = 0;
}