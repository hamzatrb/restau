<?php 

/**
 * 
 */
class BookingModel 
{
	
	public function addBooking($bookingDate,$bookingTime,$numberOfSeats,$user_Id)
	{

		
		$database = new Database();


		$sql = 'INSERT INTO booking (BookingDate, BookingTime, NumberOfSeats, User_Id, CreationTimestamp)

				VALUES(?, ?, ?, ?, NOW())';

		$idBooking = $database->executeSql($sql,[
												 $bookingDate,
												 $bookingTime,
												 $numberOfSeats,
												 $user_Id
												]
										  );	

		  // Ajout d'un message de notification qui s'affichera sur la page d'accueil.

	    $flashBag = new FlashBag();

	    $flashBag->add('Votre Reservation  à  été effectué avec succées.');



	}
}