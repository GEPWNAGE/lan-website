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

	public $hasMany = array("CompetitionRegistration");

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
			),
            "reserved" => array(
                "rule" => "notInReservedHostnames",
                "message" => "Sommige hostnames zijn reserved! (voornamelijk gepwnage dingen)"
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
        //key is in use if a lease is given and the mac address is not owned by the current user
		$inUse = $this->RegistrationKey->hasAny(
            array(
                "RegistrationKey.key" => $check['key'],
                "RegistrationKey.lease NOT" => null,
                "RegistrationKey.mac_address NOT" => $this->getMacAddress($_SERVER['REMOTE_ADDR'])
            )
        );
		return !$inUse;
	}
    public function notInReservedHostnames($check){
        $banregexes = array(
            "/^gepwn/", // gepwnage mogen alleen wij natuurlijk :p
            "/^pwn/", // alleen wij pwnen
            "/^reg/", // reg.gepwnage.lan is deze server
            "/^gepe/",  // dingen als gepeeweenaazje
        );
        foreach($banregexes as $regex) {
            if(preg_match($regex, $check['hostname'])) {
                return false;
            }
        }
        return true;
    }

	public function getMacAddress($ip){
		return "";
		$line = exec("arp | grep ". $ip);
		if(!preg_match("/([0-9a-f]{2}:[0-9a-f]{2}:[0-9a-f]{2}:[0-9a-f]{2}:[0-9a-f]{2}:[0-9a-f]{2})/i", $line, $matches)) {
			$leases = new File("/var/lib/dhcp/dhcpd.leases");

			if(!preg_match("/lease ". $ip ."[^{]*{[^}]*hardware ethernet ([0-9a-f]{2}:[0-9a-f]{2}:[0-9a-f]{2}:[0-9a-f]{2}:[0-9a-f]{2}:[0-9a-f]{2})/i", $leases->read(), $matches)) {
				throw new InternalErrorException("Haal er maar Vincent of Simone van GEPWNAGE bij");
			}
		}
		return $matches[1];
	}
}