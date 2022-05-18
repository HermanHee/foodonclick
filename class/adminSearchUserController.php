<?php
class adminSearchUserController extends Users {
	private $userID;
    private $fName;
    private $lName;
    private $phone;
    private $email;

    public function __construct($userID, $fName, $lName, $phone, $email){
        $this->userID = $userID;
		$this->fName = $fName;
        $this->lName = $lName;
        $this->phone = $phone;
		$this->email = $email;
    }
	
	public function searchUser(){
        $this->getSearchUser($this->userID, $this->fName, $this->lName, $this->phone ,$this->email);
    }
}
?>