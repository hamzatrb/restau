<?php 

/**
 * 
 */
class UserModel 
{
	
	public function hashPassword($password)
	{

		$salt = '$2y$11$'.substr(bin2hex(openssl_random_pseudo_bytes(32)), 0, 22);

		return crypt($password, $salt);

	}
	public function verifyPassword($password,$hashed_password)
	{

		return crypt($password,$hashed_password) == $hashed_password;

	}

	public function find($id)
	{

		$database = new Database();

        // Récupération de l'utilisateur ayant l'email spécifié 

        $sql = 'SELECT * FROM user WHERE Id = ?';


        $user = $database->queryOne($sql,[$id]);

        return $user;


	}

	 public function findWithEmailPassword($email, $password)
	
    {
        
        $database = new Database();

        // Récupération de l'utilisateur ayant l'email spécifié 

        $sql = 'SELECT * FROM user WHERE Email = ?';


        $user = $database->queryOne($sql,[$email]);

        // Est-ce qu'on a bien trouvé un utilisateur 

        if(empty($user))
        {
        	 throw new DomainException
            (
                "Il n'y a pas de compte utilisateur associé à cette adresse email"
            );

        }
          

        if ($this->verifyPassword($password,$user['Password']) == false )
        {
        	throw new DomainException
        	
        	('le mot de passe specifié nest pas correcte ');

        	
        }

        return $user;

    }

	public function signUp
	(
		$lastName,
		$firstName,
		$email,
		$password,
		$birthdate,
		$addresse,
		$city,
		$country,
		$zipcode,
		$phone
	)

	{

		$db  	= 	 new Database();

		$sql 	=    " SELECT * FROM user WHERE Email = ? ";

		$req 	=    $db->queryOne($sql,[$email]);	

		if(empty($req) ==  false)
		{
  			throw new DomainException
            (
                "Il existe déjà un compte utilisateur avec cette adresse e-mail"
            );		
        }

		$sql 	=  ' INSERT INTO user (LastName,FirstName,Email,Password,BirthDate,

			   	 	 Address,City,Country,ZipCode,Phone)

			    	 VALUES (?,?,?,?,?,?,?,?,?,?)';


		$password = $this->hashPassword($password);	  

	    // Insertion de l'utilisateur dans la base de données.  

	    $user   =  $db->executeSql($sql,[	
										$lastName,
										$firstName,
										$email,
										$password,
										$birthdate,
										$addresse,
										$city,
										$country,
										$zipcode,
										$phone
								     ]
						  		);

	    // Ajout d'un message de notification qui s'affichera sur la page d'accueil.

	    $flashBag = new FlashBag();

	    $flashBag->add('Votre compte utilisateur a bien été créé.');

	}
}