<?php


namespace Immobiliare\Models;
use PDO;
use CURLFile;	


class Contacts 
{

	private static $instanceDB;
	private static $table = "contatti";
	public static $nome;
	public static $cognome;
	public static $email;
	public static $telefono;
	public static $note;
	public static $privacy;

	public function setNome($nome)
	{
		self::$nome = $nome;
	}

	public function getNome()
	{
		return self::$nome;
	}

	public function setCognome($cognome)
	{
		self::$cognome = $cognome;
	}

	public function getCognome()
	{
		return self::$cognome;
	}

	public function setTelefono($telefono)
	{
		self::$telefono = $telefono;
	}

	public function getTelefono()
	{
		return self::$telefono;
	}

	public function setNote($note)
	{
		self::$note = $note;
	}


	public function getNote()
	{
		return self::$note;
	}

	public function setPrivacy($privacy)
	{
		self::$privacy = $privacy;
	}


	public function getPrivacy()
	{
		return self::$privacy;
	}

	public function setEmail($email)
	{
		self::$email = $email;
	}


	public function getEmail()
	{
		return self::$email;
	}

	



	public function getConnection()
	{	
		if (self::$instanceDB === null) { 
			self::$instanceDB  = new PDO('sqlite:'.__DIR__ .'/../../data/immobiliare.db');
		}

		if (self::$instanceDB) {
			return self::$instanceDB;
		}else{
			return false;
		}
	}


	public static function insertNewContact()
	{
		$connection = self::getConnection();
		$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		if (!$connection) {
			return "Impossibile creare la connessione!";
		}


		$query = "INSERT INTO ".self::$table." (Nome, Cognome, Email, Telefono, Note, Privacy) 
				values (:Nome, :Cognome, :Email, :Telefono, :Note, :Privacy) ;";


		$stmt = $connection->prepare($query);

		$stmt->bindParam(':Nome', self::$nome);
        $stmt->bindParam(':Cognome', self::$cognome);
        $stmt->bindParam(':Email', self::$email);
        $stmt->bindParam(':Telefono', self::$telefono);
        $stmt->bindParam(':Note', self::$note);
        $stmt->bindParam(':Privacy', self::$privacy);
   	

        if($stmt->execute()){
	          return true;
	      }

  		return false;
	}





}