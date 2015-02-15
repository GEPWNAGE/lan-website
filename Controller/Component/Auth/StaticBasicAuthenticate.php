<?php
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
App::uses('BasicAuthenticate', 'Controller/Component/Auth');

class StaticBasicAuthenticate extends BasicAuthenticate {
    /**
     * Find user in environment settings
     *
     * @param array|string $username
     * @param null $password
     * @return mixed
     */
    protected function _findUser($username, $password = null) {
        $settings = Configure::read("StaticBasicAuth");
        $passwordHasher = new SimplePasswordHasher(array('hashType' => 'sha256'));

        $users = $settings;
        if(isset($settings['User'])){
            $users = array($settings);
        }

        foreach ($users as $user){
            if(isset($user['User']) && $user['User']['username'] == $username && $user['User']['password'] == $passwordHasher->hash($password)){
                return $user;
            }
        }
    }
}