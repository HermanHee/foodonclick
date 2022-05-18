<?php
	class adminEditUserController extends Users {
		private $userID;
		private $password;
		private $fName;
		private $lName;
		private $phone;
		private $email;
		
		public function __construct($userID, $password, $fName, $lName, $phone, $email){
			$this->userID = $userID;
			$this->password = $password;
			$this->fName = $fName;
			$this->lName = $lName;
			$this->phone = $phone;
			$this->email = $email;
		}

		public function editUsername(){
			$this->getEditUsername($this->userID);
		}
		
		public function editPW(){
			$this->getEditPW($this->password);
		}
		
		public function editFName(){
			$this->getEditFName($this->fName);
		}
		
		public function editLName(){
			$this->getEditLName($this->lName);
		}
		
		public function editPhone(){
			$this->getEditPhone($this->phone);
		}
		
		public function editEmail(){
			$this->getEditEmail($this->email);
		}
	}
?>