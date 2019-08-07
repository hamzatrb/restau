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
		
		return 	   $meals;

	}

	public function find($mealId)
	{

		$dataBase  = 	 new Database();

		$sql 	   = 'SELECT * FROM meal WHERE Id = ?';
		
		return 	   $dataBase->queryOne($sql, [$mealId]);

	}

}

