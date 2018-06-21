<?php

use PHPUnit\Framework\TestCase;
use Immobiliare\Models\Contacts;

class ContactsTest extends TestCase {


	public function testInsertNewContact() 
	{
		$ContactsModel = new Contacts();  
		$this->assertTrue($ContactsModel->insertNewContact());
	}


	public function testGetTheName() 
	{
		$ContactsModel = new Contacts();  
		$ContactsModel->setNome("testNome");
		$this->assertEquals($ContactsModel->getNome(), "testNome");
	}

	public function testGetCognome() 
	{
		$ContactsModel = new Contacts();  
		$ContactsModel->setCognome("testCognome");
		$this->assertEquals($ContactsModel->getCognome(), "testCognome");
	}

	public function testGetTelefono() 
	{
		$ContactsModel = new Contacts();  
		$ContactsModel->setTelefono("testTelefono");
		$this->assertEquals($ContactsModel->getTelefono(), "testTelefono");
	}

	public function testGetPrivacy() 
	{
		$ContactsModel = new Contacts();  
		$ContactsModel->setPrivacy("testPrivacy");
		$this->assertEquals($ContactsModel->getPrivacy(), "testPrivacy");
	}






}