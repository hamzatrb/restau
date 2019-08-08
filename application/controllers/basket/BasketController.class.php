<?php

class BasketController
{


		public function httpGetMethod(Http $http, array $queryFields)
		{
			

            
		
		}

		public function httpPostMethod(Http $http, array $formFields)
		{

			if(array_key_exists('basketItems', $formFields) == false)
			{
 				$formFields['basketItems'] = [];
			}

			//var_dump($formFields['basketItems']); die();


			return [	
						'_raw_template'=>true,

						'basketItems' => $formFields['basketItems']
				   ]; 



		}
}		


