<?php 

class AdminController 
{
	
	public function httpGetMethod(Http $http, array $queryFields)
	{
		
		$order  = new OrderModel();

		$orders = $order->listAll();
		var_dump($queryFields['idOrder']);
		die();
		
		$result = $orders->findOrderLines($queryFields['idOrder']);

		$http->sendJsonResponse($result);


		return [ 'orders' => $orders ];

		
		
	}

	public function httpPostMethod(Http $http, array $formFields)
	{






	}
}