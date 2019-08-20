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

	public function addMeal($meal,$photo)
	{

		$dataBase  = 	 new Database();

	$sql = 'INSERT INTO meal (Name, Description, Photo, QuantityInStock, BuyPrice, SalePrice)

				VALUES(?, ?, ?, ?, ?, ?)';

	$idMeal = $dataBase->executeSql($sql,[
											$meal['lastName'],
											$meal['description'],
											$photo,
											$meal['stockInitial'],
											$meal['prixAchat'],
											$meal['PrixVente']
										]
									);			

	}

	public function removeMeal($mealId)
	{
		$dataBase  = 	 new Database();

		$sql = 'DELETE FROM meal WHERE Id = ?';

		$idDelete = $dataBase->executeSql($sql, [$mealId]);


	}





}

