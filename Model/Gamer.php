<?php
/**
 * Class Gamer
 */
class Gamer extends AppModel{
	public $actsAs = array(
		'Serializable.Serializable' => array(
			'fields' => array("info")
		),
	);

	public $hasAndBelongsToMany = array("Competition");

	public $hasMany = array("RegistrationKey");

	public $validate = array(
		"name" => array(
			"notEmpty" => array(
				"rule" => "notEmpty",
				"message" => "Je naam is verplicht",
				'required' => true,
				'allowEmpty' => false,
			),
			"alpha" => array(
				"rule" => '/^([a-z\s])*$/i',
				'required' => true,
				"message" => "Heb jij special chars in je naam? Awesome!"
			),
			"between" => array(
				"rule" => array("minLength", 5),
				'required' => true,
				"message" => "Is je naam korter dan 5 tekens? Wauw."
			),
		),
		"nickname" => array(
			"between" => array(
				"rule" => array("between", 3, 50),
				'required' => true,
				"message" => "Je nickname moet tussen 3 en 50 characters zijn"
			),
		),
		"hostname" => array(
			"unique" => array(
				"rule" => "isUnique",
			    "message" => "Deze hostname is al in gebruik"
			),
			"between" => array(
				"rule" => array("between", 3, 20),
				'required' => true,
				"message" => "Je hostname moet tussen 3 en 20 characters zijn"
			),
			"alpha" => array(
				"rule" => "alphaNumeric",
				'required' => true,
				"message" => "Je hostname moet alfanumeriek zijn"
			)
		),
	    "key" => array(
		    "required" => array(
			    "rule" => "notEmpty",
			    "required" => true,
			    "message" => "Je moet een key hebben"
		    ),
			"exists" => array(
				"rule" => "keyExists",
				"message" => "Deze key bestaat helemaal niet!"
			),
		    "notInUse" => array(
			    "rule" => "keyNotInUse",
			    "message" => "Deze key is al in gebruik"
		    )
		)
	);

	public function keyExists($check){
		return $this->RegistrationKey->hasAny(array("RegistrationKey.key" => $check['key']));
	}
	public function keyNotInUse($check){
		$this->RegistrationKey->hasAny(array("RegistrationKey.key" => $check['key'], "RegistrationKey.lease NOT" => null, "RegistrationKey.mac_address NOT" => $this->getMacAddress($_SERVER['REMOTE_ADDR'])));
		return false;
	}

	public function getMacAddress($ip){
		return "";
		$line = exec("arp | grep ". $ip);
		if(!preg_match("/([0-9a-f]{2}:[0-9a-f]{2}:[0-9a-f]{2}:[0-9a-f]{2}:[0-9a-f]{2}:[0-9a-f]{2})/i", $line, $matches)) {
			$leases = new File("/var/lib/dhcp/dhcpd.leases");

			if(!preg_match("/lease ". $ip ."[^{]*{[^}]*hardware ethernet ([0-9a-f]{2}:[0-9a-f]{2}:[0-9a-f]{2}:[0-9a-f]{2}:[0-9a-f]{2}:[0-9a-f]{2})/i", $leases->read(), $matches)) {
				throw new InternalErrorException("Haal er maar iemand van GEPWNAGE bij");
			}
		}
		return $matches[1];
	}
}