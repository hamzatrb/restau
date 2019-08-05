<?php

/**
 * 
 */
class BookingController 
{
	
	
		public function httpGetMethod(Http $http, array $queryFields)
		{
			

		

		}

		public function httpPostMethod(Http $http, array $formFields)
		{
			
			$booking = new BookingModel();


			$formFields['BookingDate']  = $formFields['year']."-".$formFields['month']."-" 
										  .$formFields['day'];


			$formFields['time'] 		= 	$formFields['time'] .":".$formFields['minute'].': 00';


			$userSession = new UserSession();


			$booking->addBooking( $formFields['BookingDate'],
								  $formFields['time'],
								  $formFields['couvert'],
								  $userSession->getUserId()


								);

			$http->redirectTo('/');
			
		}

}