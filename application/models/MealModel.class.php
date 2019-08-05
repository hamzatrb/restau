<?php 

/**
 * 
 */
class MealModel 
{
	
	
	public function listAll()
	{

		$dataBase  = 	 new Database();

		$sql  	   = 	'SELECT * FROM meal';

		$meals     =  	 $dataBase->query($sql);

		return $meals;

	}
}

