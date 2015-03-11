<?php
/**
 * Application model for Cake.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 */

App::uses('Model', 'Model');
App::uses('SoftDeletableModel', 'CakeSoftDelete.Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends SoftDeletableModel {
    public $actsAs = array('CakeSoftDelete.SoftDeletable');

	/**
	 * static enums
	 * @access static
	 */
	public static function enum($value, $options, $default = '') {
		if ($value !== null) {
			if (array_key_exists($value, $options)) {
				return $options[$value];
			}
			return $default;
		}
		return $options;
	}
}
