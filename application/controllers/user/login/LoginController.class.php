<?php
/**
 * 
 */
class loginController 
{
	
	
		public function httpGetMethod(Http $http, array $queryFields)
		{
			
			return ['_form' => new  LoginForm() ];

		}

		public function httpPostMethod(Http $http, array $formFields)
		{

			try

			{

			// Récupération de l'utilisateur

			$user  		= new UserModel();

			$resultUser = $user->findWithEmailPassword($formFields['email'],$formFields['password']);

			//creation du session 

			$userSession = new UserSession();


			$userSession->create(
									$resultUser['Id'],
									$resultUser['FirstName'],
									$resultUser['LastName'],
									$resultUser['Email'],
									$resultUser['Admin']
								);



			// Redirection vers la page d'accueil.

            $http->redirectTo('/');

            }

			catch(DomainException $exception)
			{
	           
	            // affichage du formulaire avec un message d'erreur.
	            
	            $form = new LoginForm();

	            $form->bind($formFields);

	            $form->setErrorMessage($exception->getMessage());

				return [ '_form' => $form ];
			}



		}


}


