<?php 

class MealController 
{
	
	public function httpGetMethod(Http $http, array $queryFields)
	{

		
        $melaModel      =  new MealModel();
        
        $meal           =  $melaModel->listAll();


        return  [   'meals' => $meal,
                    '_form' => new MealForm()
                ];

		
	}

	public function httpPostMethod(Http $http, array $formFields)
	{



		$mealModel =  new MealModel();
		
		if(isset($formFields['envoyer']))
		{
			if($formFields['envoyer'] == 'Supprimer')
			{
				if (count($formFields['choix']) > 0)

					{
					    foreach ($formFields['choix'] as $choix)
					    {
					        $mealModel->removeMeal($choix);
					    }
					}

				

			}
		}
		else
		{


		$mealModel =  new MealModel();

		

		$photo = $http->moveUploadedFile('photo', '/images/meals');
	

		$mealModel->addMeal($formFields, $photo);

		}
		
		$http->redirectTo('/admin/meal');

		




	}
}