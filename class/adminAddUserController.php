<?php
class adminAddUserController extends Users {
	private $userID;
    private $password;
    private $fName;
    private $lName;
    private $phone;
    private $email;
	private $type;
	
	public function __construct($userID, $password, $fName, $lName, $phone, $email, $type){
        $this->userID = $userID;
        $this->password = $password;
		$this->fName = $fName;
        $this->lName = $lName;
        $this->phone = $phone;
		$this->email = $email;
		$this->type = $type;
    }
	
	public function addUser(){
        $this->getAddUser($this->userID, $this->password, $this->fName, $this->lName, $this->phone ,$this->email, $this->type);
    }

    // Error functions and valid input
    private function emptyInput() {
        $result;
        if(empty($this->userID) || empty($this->password) || empty($this->fName) || empty($this->lName) || empty($this->phone) || empty($this->email) || empty($this->type))
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
?>