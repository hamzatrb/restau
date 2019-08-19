<?php 

class MealController 
{
	
	public function httpGetMethod(Http $http, array $queryFields)
	{

		return [ '_form' => new MealForm() ];	
		
	}

	public function httpPostMethod(Http $http, array $formFields)
	{

		$mealModel =  new MealModel();

		

		$photo = $http->moveUploadedFile('photo', '/images/meals');


		

		$mealModel->addMeal($formFields, $photo);

		




	}
}