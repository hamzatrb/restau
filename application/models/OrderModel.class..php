<?php 
/**
 * 
 */
class OrderModel 
{
	
	public function find($orderId)
	{
		
		$database = new Database();


		$sql 	  = 'SELECT * FROM order WHERE Id = ?';


		return $database->queryOne($sql, [$orderId]);

	}

	

	public function findOrderLines($orderId)
	{

		$database = new Database();


		// récuperation de la ligne de la commande specifié

		$sql 	  = 'SELECT QuantityOrdered, PriceEach, Name, Photo 

					FROM orderline o

					INNER JOIN meal m 

	                on m.Id = o.Meal_Id

					WHERE Order_Id = ?';


		$listeOrderLine = $database->query($sql,[$orderId]);


		return $listeOrderLine;



	}

	public function validate($userId, array $basketItems)
	{

		$Database 			= new Database();


		$sqlInsertOrder 	= 'INSERT INTO order

						       (User_Id, TaxRate, CreationTimestamp)

						       VALUES (?, 20.0, NOW()) ';


		$orderId 			= $database->executeSql($sqlInsertOrder, [$userId]);




	 	$sqlInsertOrderLine =    		'INSERT INTO orderline

		 	 							(QuantityOrdered, Meal_Id, Order_Id, PriceEach)

		 								VALUES (?, ?, ?, ?)';

		$totalAmount 		= 0;	


		foreach ($basketItems as  $basketItem)
		{


		 	 $totalAmount+= $basketItem['QuantityOrdered'] * $basketItem['PriceEach'];

		 		

		 	 $database->executeSql($sqlInsertOrderLine, [ 
		 	 												$basketItem['QuantityOrdered'],
										 	        		$basketItem['Meal_Id'],
										 	 	   			$orderId,
										 	 	   			$basketItem['PriceEach']
										 	 	        ]
								  );	
		}
					 
		$sqlUpdate = 'UPDATE order SET  CompleteTimestamp = NOW(),

										TotalAmount = ?,

										TaxAmount 	= ? * TaxRate / 100

										WHERE Id = ? ';


		$database->executeSql($sqlUpdate,[ 
		 									$totalAmount,
		 									$totalAmount,
		 								    $orderId
		 								  ]
		 					 );  

		



	}
}