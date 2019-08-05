<?php 

/**
 * 
 */
class UserSession 
{
	
	function __construct()
	{
		if(session_status() == PHP_SESSION_NONE) 

		// si le module activé et la session n'existe pas alors on cree la session()
		{
			session_start();
		}
	}

	public function create($userId, $firstName, $lastName,$email, $admin )
	{
		//construction de la session utilisatuer

		$_SESSION['user']['Id'] 		= $userId;
		$_SESSION['user']['FirstName']  = $firstName;
		$_SESSION['user']['LastName']	= $lastName;
		$_SESSION['user']['Email']		= $email;
		$_SESSION['user']['Admin'] 		= $admin;

	}

	public function destroy()
	{
		//destruction de l'ensemble de la session.
		session_unset();	//vider les session
		session_destroy();	// supprimer les session

	}

	public function getEmail()
	{
		if($this->isAuthenticated())
		{
			return $_SESSION['user']['Email'];
		}

		else

			return NULL;
		

	}

	public function getFirstName()
	{
		if($this->isAuthenticated())
		{
			return $_SESSION['user']['FirstName'];

		}
		else

			return NULL;

		

	}

	public function getFullName()
	{
		if($this->isAuthenticated())
		{

			return  $_SESSION['user']['FirstName']." ".$_SESSION['user']['LastName'];
		}
		 

		return NULL;

	}

	public function getLastName()
	{

		if($this->isAuthenticated())
		{

			return $_SESSION['user']['LastName'];

		}
		

		return NULL;

		
	}

	public function getUserId()
	{
		if($this->isAuthenticated())
		{

			return $_SESSION['user']['Id'] ;

		}
		 

			return NULL;

		

	}

	public function isAuthenticated()
	{
		
		if(isset($_SESSION['user']))
		{
			if(!empty($_SESSION['user']))
			{
				return true;
			}
			
				
		}


		return false;

	}
}