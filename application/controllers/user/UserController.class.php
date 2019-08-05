<?php

/**
 * 
 */
class UserController 
{
	
	public function httpGetMethod(Http $http, array $queryFields)
	{

		return [ '_form' => new UserForm() ];	
		
	}

	public function httpPostMethod(Http $http, array $formFields)
	{

		try

		{

			$user = new UserModel();

			$formFields['BirthDate'] = $formFields['year']."-".$formFields['month']."-" 
			.$formFields['day'];

			$user->signUp( 
							   $formFields['LastName'],
							   $formFields['FirstName'],
							   $formFields['Email'],
							   $formFields['Password'],
							   $formFields['BirthDate'],
							   $formFields['Address'],
							   $formFields['City'],
							   $formFields['Country'],
							   $formFields['ZipCode'],
							   $formFields['Phone']
						 );


			$http->redirectTo('/');

		}

		catch (DomainException $exception)
		 {
		 	
		    $form = new UserForm();

            $form->bind($formFields);
            
            $form->setErrorMessage($exception->getMessage());

		 	return [ '_form' => $form ];

		 }
		

	}

}
