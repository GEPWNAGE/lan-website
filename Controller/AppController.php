<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 */

App::uses('Controller', 'Controller');
App::uses("StaticBasicAuthenticate", "Controller/Component/Auth");

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	public $components = array(
        "DebugKit.Toolbar",
        'Cookie',
        'Session',
        "Auth" => array(
            "logoutRedirect" => array(
                "controller" => "pages",
                "action" => "display",
                "home"
            ),
            "authenticate" => array(
                "StaticBasic"
            )
        )
    );

	public $uses = array("Gamer");

	public function beforeFilter(){
		parent::beforeFilter();

        AuthComponent::$sessionKey = false;

        if($this->request->param('prefix') != "admin"){
            $this->Auth->allow();
        }

		if(preg_match("/^10\.37\.42\./", $this->request->clientIp())){
			$this->redirect("http://registration.gepwnage.lan");
			return;
		}

		Configure::write("localmode", (preg_match("/^10\.13\.37\./", $this->request->clientIp()) || true));

		if(Configure::read("localmode")){
			Configure::write("currentGamer", $this->Gamer->findByIp($this->request->clientIp()));
			$this->set("currentGamer", Configure::read("currentGamer"));
			Configure::write("Menu", array(
				"nl" => array(
					array(
						"title" => "Competities",
						"url" => array(
							"controller" => "competitions",
							"action" => "index",
						)
					),
				),
				"en" => array(
					array(
						"title" => "Competitions",
						"url" => array(
							"controller" => "competitions",
							"action" => "index",
						)
					),
				)
			));
			Configure::write("Menu.nld", Configure::read("Menu.nl"));
			Configure::write("Menu.eng", Configure::read("Menu.en"));
		}

		$this->_setLanguage();

		//set admin theme if in admin environment
		if($this->request->param('prefix') == 'admin'){
			$this->theme = "Admin";
		}
	}

	private function _setLanguage() {
    	//if the cookie was previously set, and Config.language has not been set
    	//write the Config.language with the value from the Cookie
        if ($this->Cookie->read('lang') && !$this->Session->check('Config.language')) {
            $this->Session->write('Config.language', $this->Cookie->read('lang'));
            Configure::write('Config.language', $this->Cookie->read('lang'));
        }
        //if the user clicked the language URL
        else if (isset($this->params['language']) && ($this->params['language'] !=  $this->Session->read('Config.language'))) {
            //then update the value in Session and the one in Cookie
            $this->Session->write('Config.language', $this->params['language']);
            $this->Cookie->write('lang', $this->params['language'], false, '20 days');
            Configure::write('Config.language', $this->Cookie->read('lang'));
        }
    }

	//override redirect
	public function redirect( $url, $status = NULL, $exit = true ) {
        if (is_array($url) && !isset($url['language']) && $this->Session->check('Config.language')) {
            $url['language'] = $this->Session->read('Config.language');
        }
        parent::redirect($url,$status,$exit);
    }
}
