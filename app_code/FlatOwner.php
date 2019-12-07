<?php
	
	/**
	* 
	*
	*/

	class FlatOwner extends AnotherClass
	{
		private $firstName;
		private $lastName;
		private $emailId;
		private $mobNo;
		private $passwd;
		private $emailIdVerify;
		private $mobNoVerify;
		

		//Setter and Getter Methods
		//First Name
		public function setFirstName($firstName)
		{
			$this->firstName = $firstName;
		}

		public function getFirstName()
		{
			return $this->firstName;
		}

		//Last Name
		public function setLastName($lastName)
		{
			$this->lastName = $lastName;
		}

		public function getLastName()
		{
			return $this->lastName;
		}

		//Email-ID
		public function setEmailId($emailId)
		{
			$this->emailId = $emailId;
		}

		public function getEmailId()
		{
			return $this->emailId;
		}

		//Mobile No.
		public function setMobNo($mobNo)
		{
			$this->mobNo = $mobNo;
		}

		public function getMobNo()
		{
			return $this->mobNo;
		}

		//Password
		public function setPasswd($passwd)
		{
			$this->passwd = $passwd;
		}

		public function getPasswd()
		{
			return $this->passwd;
		}

		//Verify Email-ID
		public function setEmailIdVerify($emailIdVerify)
		{
			$this->emailIdVerify = $emailIdVerify;
		}

		public function getEmailIdVerify()
		{
			return $this->emailIdVerify;
		}

		//Verify Mobile No.
		public function setMobNoVerify($mobNoVerify)
		{
			$this->mobNoVerify = $mobNoVerify;
		}

		public function getMobNoVerify()
		{
			return $this->mobNoVerify;
		}

	}
	
?>