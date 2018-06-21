<?php

namespace Immobiliare;
use Immobiliare\Models\Announcements;
use PDO;


class ImmobileController
{
    /**
     * Index Action
     */
    public function getIndex()
    {
        if (isset($_SESSION['name'])) {
            $previewAnnouncements = self::previewAnnouncements($_SESSION['id']);
        }
        include VIEWS_FOLDER . '/index.php';
    }
    
    public static function previewAnnouncements($idUser)
    {   
        return Announcements::getPreviewAnnouncements($idUser);
    }


    public function getDettaglio($idAnnouncement)
    {   

        if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 
        if(isset($_SESSION['id']))
        {
             $idAgenzia = $_SESSION['id'];
        } 
       
        $detailAnnouncements = Announcements::getDetailAnnouncements($idAnnouncement,  $idAgenzia);

        include VIEWS_FOLDER . '/dettaglio.php';
    }

    public function getAddAnnouncement()
    {
        include VIEWS_FOLDER . '/nuovo.php';
    }

    public function updateAnnouncement($idAnnouncement)
    {   
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 
        $idAgenzia = $_SESSION['id'];

        $result = Announcements::updateAnnouncements($idAnnouncement, $idAgenzia);

        if ($result) {
            header("Location: /index.php?success=aggiornamento-annuncio-effettuato");
            exit;
        }

    }



    public function deleteAnnouncement($idAnnouncement)
    {   
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 
        $idAgenzia = $_SESSION['id'];

        $result = Announcements::deleteAnnouncements($idAnnouncement, $idAgenzia);

        if ($result) {
            header("Location: /index.php?success=eliminazione-annuncio-effettuata");
            exit;
        }
  
    }

    public function addNewAnnouncement()
    {
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 
        $idAgenzia = $_SESSION['id'];

        $result = Announcements::createNewAnnoucement($idAgenzia);

        if ($result) {
            header("Location: /index.php?success=invio-annuncio-effettuato");
            exit;
        }
    }



    /**
     * @return ImmobileController
     */
    public static function create()
    {
        return new self();
    }
    
}