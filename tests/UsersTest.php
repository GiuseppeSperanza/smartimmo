<?php

use PHPUnit\Framework\TestCase;
use Immobiliare\Models\Users;

class UsersTest extends TestCase {


	public function testGetArrayAllPublicUsers() 
	{
		$UserModel = new Users();
		$this->assertTrue(is_array($UserModel->getAllUsers()));
	}

	public function testGetIdAndNameOfUser() 
	{
		$UserModel = new Users();
		$this->assertTrue(is_array($UserModel->getIdAndName("supercase@immobiliare.local")));
	}


}