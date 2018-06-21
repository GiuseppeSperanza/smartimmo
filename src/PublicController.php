<?php

namespace Immobiliare;
use Immobiliare\Models\Announcements;
use Immobiliare\Models\Contacts;
use PDO;


class PublicController
{

	public static $messageError;

	public static function create()
    {
        return new self();
    }


    private static function getAllAnnouncements()
    {
    	return Announcements::getAllPublicAnnouncement();
    }


    public function getIndex()
    {
       	$announcements = self::getAllAnnouncements();
        include VIEWS_FOLDER . '/index.php';
    }

    public function getPublicDetail($idAnnuncio, $idAgenzia)
    {	
    	$publicController = new self();

    	$detailPublicAnnouncements = Announcements::getDetailAnnouncements($idAnnuncio, $idAgenzia);

        include VIEWS_FOLDER . '/dettaglio.php';
    }

    public function insertNewContact()
    {

    	$result = Contacts::insertNewContact();

    	if ($result == true) {
            header("Location: /index.php?success=messaggio-inviato");
            exit;
        }
    }




	
}