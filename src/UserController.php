<?php

	namespace Immobiliare;
	use Immobiliare\Models\Users;
	use PDO;

	class UserController
	{

		public static $messageError = "Dati incorretti!";
	   
	    public static function create()
	    {
	        return new self();
	    }

	    public function getLogin()
	    {   
	    	$userController = new self();
	        include VIEWS_FOLDER . '/login.php';
	    }

	    public function login($email, $password)
	    {	
	    	//Check if user exist 
	    	$users = Users::getAllUsers();
	    	$crypt= md5($password);
	    	$query = "SELECT COUNT(*) FROM " . Users::$table . "  
                WHERE email = '".$email."' and password = '".$crypt."';";
            $stmt =  Users::getConnection()->prepare($query);  
            $stmt->execute();
            $result = $stmt->fetchColumn(); //1 = exist

            if ($result == 0) {
            	return false;
            }else{
            	$userDate = Users::getIdAndName($email);
            	
            	session_start();
            	$_SESSION['id'] = $userDate['id'];
            	$_SESSION['name'] = $userDate['Nome'];
            	$_SESSION['email'] = $email;
            	header("Location: /");

            	exit;
            }
	    }

	     public function logout()
	     {
	     	session_start();
	     	session_destroy();
	     	header("Location: /");
	     	exit;
	     }
	    
	}

