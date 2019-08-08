<?php 


class ValidationController 
{

		public function httpGetMethod(Http $http, array $queryFields)
		{
			
				
		
		}

		public function httpPostMethod(Http $http, array $formFields)
		{

			


			$userSession   =  new UserSession();

			$userId 	   =  $userSession->getUserId();

			$orderModel    =  new OrderModel();

			$validateOrder =  $orderModel->validate($userId, $formFields['basketItems']);

			


			$http->sendJsonResponse($validateOrder);

			

			


		}
	

}