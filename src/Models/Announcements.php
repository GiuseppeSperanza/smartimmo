<?php
	namespace Immobiliare\Models;
	use PDO;
	use CURLFile;	


	class Announcements 
	{

		private static $instanceDB;
		private static $table = "annunci";
		public static $category;
		public static $typology;
		public static $contract;
		public static $price;
		public static $comune;
		public static $surface;
		public static $locals;
		public static $image;


		public function setCategory($category)
		{
			self::$category = $category;
		}

		public function getCategory()
		{
			return self::$category;
		}

		public function setTypology($typology)
		{
			self::$typology = $typology;
		}

		public function getTypology()
		{
			return self::$typology;
		}

		public function setContract($contract)
		{
			self::$contract = $contract;
		}

		public function getContract()
		{
			return self::$contract;
		}

		public function setPrice($price)
		{
			self::$price = $price;
		}

		public function getPrice()
		{
			return self::$price;
		}

		public function setComune($comune)
		{
			self::$comune = $comune;
		}

		public function getComune()
		{
			return self::$comune;
		}

		public function setSurface($surface)
		{
			self::$surface = $surface;
		}

		public function getSurface()
		{
			return self::$surface;
		}


		public function setLocals($locals)
		{
			self::$locals = $locals;
		}

		public function getLocals()
		{
			return self::$locals;
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


		public static function getAllPublicAnnouncement()
		{
			$connection = self::getConnection();
			$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			if (!$connection) {
				return "Impossibile creare la connessione!";
			}

			$query = "SELECT * FROM ".self::$table;
			  
			$stmt = $connection->prepare($query);

			$stmt->execute();

			$announcements = array();

			while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				extract($row);

				$singleAnnouncement = array(
					"idAgenzia" => $idAgenzia,
	            	"idAnnuncio" => $idAnnuncio,
	            	"Categoria" => $Categoria,
	                "Tipologia" => $Tipologia,        
	                "Immagine" => $Immagine
	            );
				array_push($announcements, $singleAnnouncement);
			}
			return $announcements;

		}



		public static function getPreviewAnnouncements($id)
		{
			$connection = self::getConnection();
			$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			if (!$connection) {
				return "Impossibile creare la connessione!";
			}

            $query = "SELECT idAnnuncio as id, Tipologia, Immagine FROM ".self::$table." WHERE idAgenzia = :id";

            $stmt = $connection->prepare($query);

            $stmt->bindParam(":id", $id);

	        $stmt->execute();

	        $previewAnnouncements = array();

	        while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				extract($row);

				$singlePreview = array(
	            	"id" => $id,
	                "Tipologia" => $Tipologia,        
	                "Immagine" => $Immagine
	            );
				array_push($previewAnnouncements, $singlePreview);
			}
			return $previewAnnouncements;
		}


		public static function getPublicDetailAnnouncements($idAnnucio, $idAgenzia)
		{
			$connection = self::getConnection();
			$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			if (!$connection) {
				return "Impossibile creare la connessione!";
			}

			$query = "SELECT Categoria, Tipologia, Contratto, Prezzo, Comune, Superficie, NumeroLocali, Immagine FROM ".self::$table." WHERE idAnnuncio = :idAnnuncio AND IdAgenzia = :idAgenzia";

			$stmt = $connection->prepare($query);

			$stmt->bindParam(":idAnnuncio", $idAnnucio);

			$announcementsStmt = $stmt->execute();

	        $announcements = array();

	        while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				extract($row);

				$singleAnnouncement = array(
	            	"Categoria" => $Categoria,
	                "Tipologia" => $Tipologia,
	                "Contratto" => $Contratto,
	                "Prezzo" => $Prezzo,
	                "Comune" => $Comune,
	                "Superficie" => $Superficie,
	                "NumeroLocali" => $NumeroLocali,
	                "Immagine" => $Immagine
	            );
				array_push($announcements, $singleAnnouncement);
			}
			return $announcements;
		}


		public static function getDetailAnnouncements($idAnnucio, $idAgenzia)
		{
			$connection = self::getConnection();
			$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			if (!$connection) {
				return "Impossibile creare la connessione!";
			}

            $query = "SELECT Categoria, Tipologia, Contratto, Prezzo, Comune, Superficie, NumeroLocali, Immagine FROM ".self::$table." WHERE idAnnuncio = :idAnnuncio AND IdAgenzia = :idAgenzia";

            $stmt = $connection->prepare($query);

            $stmt->bindParam(":idAnnuncio", $idAnnucio);
            $stmt->bindParam(":idAgenzia", $idAgenzia);

	        $announcementsStmt = $stmt->execute();

	        $announcements = array();

	        while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				extract($row);

				$singleAnnouncement = array(
	            	"Categoria" => $Categoria,
	                "Tipologia" => $Tipologia,
	                "Contratto" => $Contratto,
	                "Prezzo" => $Prezzo,
	                "Comune" => $Comune,
	                "Superficie" => $Superficie,
	                "NumeroLocali" => $NumeroLocali,
	                "Immagine" => $Immagine
	            );
				array_push($announcements, $singleAnnouncement);
			}
			return $announcements;
		}


		public static function updateAnnouncements($idAnnucio, $idAgenzia)
		{
			$connection = self::getConnection();
			$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			if (!$connection) {
				return "Impossibile creare la connessione!";
			}

			$query = "UPDATE
                  " . self::$table . "
              SET
                  Categoria = :Categoria,
                  Tipologia = :Tipologia,
                  Contratto = :Contratto,
                  Prezzo = :Prezzo,
                  Comune = :Comune,
                  Superficie = :Superficie,
                  NumeroLocali = :NumeroLocali
              WHERE
                  idAgenzia = :idAgenzia
              AND
                  idAnnuncio = :idAnnuncio";

            $stmt = $connection->prepare($query);

            $stmt->bindParam(':Categoria', self::$category);
            $stmt->bindParam(':Tipologia', self::$typology);
            $stmt->bindParam(':Contratto', self::$contract);
            $stmt->bindParam(':Prezzo', self::$price);
            $stmt->bindParam(':Comune', self::$comune);
            $stmt->bindParam(':Superficie', self::$surface);
            $stmt->bindParam(':NumeroLocali', self::$locals);
            $stmt->bindParam(':idAgenzia', $idAgenzia);
            $stmt->bindParam(':idAnnuncio', $idAnnucio);

            if($stmt->execute()){
		          return true;
		      }

      		return false;
		}

		public function deleteAnnouncements($idAnnucio, $idAgenzia)
		{
			$connection = self::getConnection();
			$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			if (!$connection) {
				return "Impossibile creare la connessione!";
			}

			$query = "DELETE FROM annunci WHERE idAgenzia = :idAgenzia AND idAnnuncio = :idAnnuncio";

			$stmt = $connection->prepare($query);

			$stmt->bindParam(':idAgenzia', $idAgenzia);
            $stmt->bindParam(':idAnnuncio', $idAnnucio);

            if($stmt->execute()){
		          return true;
		      }

      		return false;

		}

		public static function createNewAnnoucement($idAgenzia)
		{
			$connection = self::getConnection();
			$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			if (!$connection) {
				return "Impossibile creare la connessione!";
			}

			//retrieve last id of announcement
			$queryLastId = "SELECT idAnnuncio FROM ".self::$table." ORDER BY idAnnuncio DESC";
			$lastIdStmt = $connection->prepare($queryLastId);
			$lastIdStmt->execute();  
			$result = $lastIdStmt->fetch(PDO::FETCH_ASSOC); //ultimo id annuncio da mettere nella query
			$idToSave = $result['idAnnuncio'] + 1;
			


			//check validity of image  $_FILES["inputImg"]["name"]
			$target_dir = "http://smartimmo.altervista.org/img/";
			$target_file = $target_dir . basename(Announcements::$image["name"]);

			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			$check = getimagesize(Announcements::$image["tmp_name"]);

			if($check !== false) {
		        $uploadOk = 1;
		    } else {
		        return "Il file non è un'immagine";
		        $uploadOk = 0;
		    }


		    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
			    return "Formati ammessi: JPG | JPEG | PNG | GIF";
			    $uploadOk = 0;
			}

			if ($uploadOk == 0) {
			    return "Ops.. Sembra esserci qualche problema con il caricamento dell'immagine..";
			} else {

				//send img to remote server
				$ch = curl_init();
				$cFile = new CURLFile(Announcements::$image["tmp_name"], Announcements::$image["type"], "announcementImg");
				$data = array('announcementImg' => $cFile);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_URL, "http://smartimmo.altervista.org/img.php");
				curl_setopt($ch, CURLOPT_POST, true);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
				$response = curl_exec($ch);

				$response = basename($response);

				if ($response == "false") {
					return "Ops.. Sembra esserci qualche problema con il caricamento dell'immagine.. ";
				}else{
					$pathToSave = str_replace('"',"",$target_dir . $response);
					curl_close($ch);
				}

			}


			$query = "INSERT INTO ".self::$table." (idAgenzia, idAnnuncio, Categoria, Tipologia, Contratto, Prezzo, Comune, Superficie, NumeroLocali, Immagine) values (:idAgenzia, :idAnnuncio, :Categoria, :Tipologia, :Contratto, :Prezzo, :Comune, :Superficie, :NumeroLocali, :Immagine);";

			$stmt = $connection->prepare($query);
			$stmt->bindParam(':idAgenzia', $idAgenzia);
			$stmt->bindParam(':idAnnuncio', $idToSave);
			$stmt->bindParam(':Categoria', self::$category);
			$stmt->bindParam(':Tipologia', self::$typology);
            $stmt->bindParam(':Contratto', self::$contract);
            $stmt->bindParam(':Prezzo', self::$price);
            $stmt->bindParam(':Comune', self::$comune);
            $stmt->bindParam(':Superficie', self::$surface);
            $stmt->bindParam(':NumeroLocali', self::$locals);
            $stmt->bindParam(':Immagine', $pathToSave);

            if($stmt->execute()){
		          return true;
		      }

      		return false;

		}


	}

