<?php 

/**
 * 
 */
class OrderController 
{

		public function httpGetMethod(Http $http, array $queryFields)
		{
			
				$meal  		 =    new MealModel();


				$meals 		 =	$meal->listAll(); 
			

				return ['meals' =>$meals];
			
			 

		
		}

		public function httpPostMethod(Http $http, array $formFields)
		{


		}
	

}

