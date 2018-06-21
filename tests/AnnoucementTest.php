<?php

use PHPUnit\Framework\TestCase;
use Immobiliare\Models\Announcements;

class AnnoucementTest extends TestCase {
	

	public function testGetTheCategory() 
	{
		$AnnouncementModel = new Announcements();
		$AnnouncementModel->setCategory("testCategory");
		$this->assertEquals($AnnouncementModel->getCategory(), "testCategory");
	}

	public function testGetTheTypology() 
	{
		$AnnouncementModel = new Announcements();
		$AnnouncementModel->setTypology("testTypology");
		$this->assertEquals($AnnouncementModel->getTypology(), "testTypology");
	}

	public function testGetTheContract() 
	{
		$AnnouncementModel = new Announcements();
		$AnnouncementModel->setContract("testContract");
		$this->assertEquals($AnnouncementModel->getContract(), "testContract");
	}

	public function testGetThePrice() 
	{
		$AnnouncementModel = new Announcements();
		$AnnouncementModel->setPrice("testPrice");
		$this->assertEquals($AnnouncementModel->getPrice(), "testPrice");
	}

	public function testGetTheComune() 
	{
		$AnnouncementModel = new Announcements();
		$AnnouncementModel->setComune("testComune");
		$this->assertEquals($AnnouncementModel->getComune(), "testComune");
	}

	public function testGetTheSurface() 
	{
		$AnnouncementModel = new Announcements();
		$AnnouncementModel->setSurface("testSurface");
		$this->assertEquals($AnnouncementModel->getSurface(), "testSurface");
	}

	public function testGetTheLocals() 
	{
		$AnnouncementModel = new Announcements();
		$AnnouncementModel->setLocals("testLocals");
		$this->assertEquals($AnnouncementModel->getLocals(), "testLocals");
	}


	public function testGetArrayAllPublicAnnouncements() 
	{
		$AnnouncementModel = new Announcements();
		$this->assertTrue(is_array($AnnouncementModel->getAllPublicAnnouncement()));
	}

	public function testGetArrayPreviewAnnouncementsOfSpecificCompany() 
	{
		$AnnouncementModel = new Announcements();
		$this->assertTrue(is_array($AnnouncementModel->getPreviewAnnouncements(1)));
	}

	public function testGetArrayPublicDetailAnnouncementsOfSpecificCompanyWhenUserIsNotLogged() 
	{
		$AnnouncementModel = new Announcements();
		$this->assertTrue(is_array($AnnouncementModel->getPublicDetailAnnouncements(1,1)));
	}

	public function testGetArrayPublicDetailAnnouncementsOfSpecificCompanyWhenUserIsLogged() 
	{
		$AnnouncementModel = new Announcements();
		$this->assertTrue(is_array($AnnouncementModel->getDetailAnnouncements(1,1)));
	}


	public function testUpdateAnnouncement() 
	{
		$AnnouncementModel = new Announcements();
		$this->assertTrue($AnnouncementModel->updateAnnouncements(1,1));
	}


	public function testDeleteAnnouncement() 
	{
		$AnnouncementModel = new Announcements();
		$this->assertTrue($AnnouncementModel->deleteAnnouncements(1,1));
	}



}