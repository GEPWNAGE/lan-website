<?php
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class PasswordHashShell extends AppShell {
    public function main() {
        if(!isset($this->args[0])){
            $this->out("<error>Give a password to hash as an argument plz</error>");
            return;
        }
        $passwordHasher = new SimplePasswordHasher(array('hashType' => 'sha256'));
        $this->out($passwordHasher->hash($this->args[0]));
    }
}