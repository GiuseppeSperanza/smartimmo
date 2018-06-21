<?php

use Immobiliare\ImmobileController;
use Immobiliare\UserController;
use Immobiliare\PublicController;
use Immobiliare\Models\Announcements;
use Immobiliare\Models\Contacts;

require_once __DIR__.'/../src/boot.php';

$controller = ImmobileController::create();

$userController = UserController::create();

$PublicController = PublicController::create();

$AnnouncementModel = new Announcements();

$ContactsModel = new Contacts();

session_start();


if (isset($_POST['logout-form'])) {
    $userController->logout();
 }




if (isset($_POST['form-login'])) {
	$email = htmlspecialchars(strip_tags($_POST['email']));
	$psw = htmlspecialchars(strip_tags($_POST['password']));
	if (!($userController->login($email, $psw))) {
		header("Location: /login?error=1");
	}
}



if (isset($_POST['update-form'])) {

	$category = ucfirst(strtolower(htmlspecialchars(strip_tags($_POST['category']))));
    $AnnouncementModel->setCategory($category);

    $typology = ucfirst(strtolower(htmlspecialchars(strip_tags($_POST['typology']))));
    $AnnouncementModel->setTypology($typology);

	$contract = ucfirst(strtolower(htmlspecialchars(strip_tags($_POST['contract']))));
    $AnnouncementModel->setContract($contract);

	$price = htmlspecialchars(strip_tags($_POST['price']));
    $AnnouncementModel->setPrice($price);

	$comune = ucfirst(strtolower(htmlspecialchars(strip_tags($_POST['comune']))));
    $AnnouncementModel->setComune($comune);

    $surface = htmlspecialchars(strip_tags($_POST['surface']));
    $AnnouncementModel->setSurface($surface);

    $locals = htmlspecialchars(strip_tags($_POST['locals']));
    $AnnouncementModel->setLocals($locals);

    $id = $_POST['idAnnouncement'];

    $controller->updateAnnouncement($id);
 }


if (isset($_POST['contact-form'])) {
	$doQuery = 0;

	$nome = ucfirst(strtolower(htmlspecialchars(strip_tags($_POST['name']))));
	$ContactsModel->setNome($nome);

	$cognome = ucfirst(strtolower(htmlspecialchars(strip_tags($_POST['lastname']))));
	$ContactsModel->setCognome($cognome);


	$telefono = htmlspecialchars(strip_tags($_POST['telNumber']));
	$ContactsModel->setTelefono($telefono);

	$note = htmlspecialchars(strip_tags($_POST['note']));
	$ContactsModel->setNote($note);

	if (isset($_POST['email'])) {
		if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			
        	$email = htmlspecialchars(strip_tags($_POST['email']));
        	$ContactsModel->setEmail($email);
        	$doQuery += 1;
        }else{
			$PublicController::$messageError = "Formato email non valido!";
			$doQuery -= 1;
		}
	}else{
		$PublicController::$messageError = "Inserire Email!";
		$doQuery -= 1;
	}
	


	if (isset($_POST['privacy'])) {
		if ( htmlspecialchars(strip_tags($_POST['privacy'])) == "on"  ) {
			$ContactsModel->setPrivacy("true");
			$doQuery += 1;
		}
	}else{
		$PublicController::$messageError = "Accettare le condizioni di privacy obbligatorie.";
		$doQuery -= 1;
	}

	if ($doQuery > 0) {
		$PublicController->insertNewContact();
	}
	

}



if (isset($_POST['deleteIdAnnouncement'])) {
	$id = $_POST['deleteIdAnnouncement'];
	$controller->deleteAnnouncement($id);
}

if (isset($_POST['new-announcement'])) {
	Announcements::$category = ucfirst(strtolower(htmlspecialchars(strip_tags($_POST['category']))));
	Announcements::$typology = ucfirst(strtolower(htmlspecialchars(strip_tags($_POST['typology']))));
	Announcements::$contract = ucfirst(strtolower(htmlspecialchars(strip_tags($_POST['contract']))));
	Announcements::$price = htmlspecialchars(strip_tags($_POST['price']));
	Announcements::$comune = ucfirst(strtolower(htmlspecialchars(strip_tags($_POST['comune']))));
	Announcements::$surface = htmlspecialchars(strip_tags($_POST['surface']));
	Announcements::$locals = htmlspecialchars(strip_tags($_POST['locals']));
	
	Announcements::$image = $_FILES["inputImg"];


	$controller->addNewAnnouncement();

}



$urlParts = parse_url($_SERVER['REQUEST_URI']);

if (preg_match('#^/dettaglio/([^/]+)$#', $urlParts['path'], $matches)) {

	$controller->getDettaglio($matches[1]);
    
} elseif (preg_match('#^/login#', $urlParts['path'])) {  

   	$userController->getLogin();

} elseif (preg_match('#^/dettaglio/([^/]+)/([^/]+)$#', $urlParts['path'], $matches)) {  


	$idAgenzia = $matches[2];
	$idAnnuncio = (explode("-", $matches[1]))[0];

	$PublicController->getPublicDetail($idAnnuncio, $idAgenzia);
	
}
 elseif (preg_match('#^/nuovo/annuncio#', $urlParts['path'])) {  

   	$controller->getAddAnnouncement();

}
  elseif  (preg_match('#^/index.php#', $urlParts['path']) || preg_match('#^/#', $urlParts['path'])) {

  	if (!isset($_SESSION['name'])) { 
		$PublicController->getIndex();
	}else{
		 $controller->getIndex();
	}
	

}