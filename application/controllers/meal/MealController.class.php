<?php

/**

 *

 **/
class MealController 
{
	
	
		public function httpGetMethod(Http $http, array $queryFields)
		{
			

            
			$meal = new MealModel();

			$meals = $meal->find($queryFields['id']);

			$http->sendJsonResponse($meals);
			
			 

		
		}

		public function httpPostMethod(Http $http, array $formFields)
		{



		}

	

}