<?php
	namespace Immobiliare\Models;
	use PDO;


	class Users 
	{

		private static $instanceDB;
		public static $table = "agenzie";
		private static $immobiliareDb = 'immobiliare.db';

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


		public static function getAllUsers()
		{
			$connection = self::getConnection();
			$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			if (!$connection) {
				return "Impossibile creare la connessione!";
			}

            $query = "SELECT * FROM ".self::$table;
            $stmt = $connection->prepare($query);
	        $stmt->execute();
	        $users = array();

	        while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				extract($row);

				$singleUser = array(
	            	"id" => $idAgenzia,
	                "email" => $Email,
	                "ragioneSociale" => $RagioneSociale,
	                "password" => $Password
	            );
				array_push($users, $singleUser);
			}
			return $users;
			
		}

		public static function getIdAndName($email)
		{
			$connection = self::getConnection();
			$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			if (!$connection) {
				return "Impossibile creare la connessione!";
			}

			$query = "SELECT idAgenzia as id, RagioneSociale as Nome FROM ".self::$table." WHERE email = '".$email."';";
			$stmt = $connection->prepare($query);
			$stmt->execute();
			$name = $stmt->fetch(PDO::FETCH_ASSOC);

			return $name;
		}



	}//end class