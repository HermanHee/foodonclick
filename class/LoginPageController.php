<?php

class LoginPageController extends Users {
    
    // assigning uid, password for controller
    private $userid;
    private $password;
	private $type;

    public function __construct($userid, $password, $type){
        $this->userid = $userid;
        $this->password = $password;
		$this->type = $type;
    }

    // LoginUser main function to run the login
    public function loginUser(){
        if($this->emptyInput() == false) {
            // Empty Input from user
            header("location: adminLoginPage.php?error=emptyInput");
            exit();
        }

        $this->getloginUser($this->userid, $this->password, $this->type);
    }

    // Error Handler functions to be check within LoginUser
    // check empty input from boundary
    private function emptyInput() {
        $result;
        if(empty($this->userid) || empty($this->password))
        {
            $result = false;
        }
        else
        {
            $result = true;
        }

        return $result;
    }
}