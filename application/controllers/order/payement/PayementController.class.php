<?php 

class PayementController 
{

		public function httpGetMethod(Http $http, array $queryFields)
		{
			
			
			$userModel   = new UserModel();

			$userSession = new UserSession();

			$customer = $userModel->find($userSession->getUserId());

			$orderModel = new OrderModel();



			$order = $orderModel->find($queryFields['id']);

		 	//var_dump($order);die();

			$oderLines =  $orderModel->findOrderLines($queryFields['id']); 


			return [ 	'customer'   => $customer,
					 	'order'      => $order,
						'orderLines'  => $oderLines
				   ];



		
		}

		public function httpPostMethod(Http $http, array $formFields)
		{


		}
	

}

