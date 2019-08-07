'use strict';

/////////////////////////////////////////////////////////////////////////////////////////
// FONCTIONS                                                                           //
/////////////////////////////////////////////////////////////////////////////////////////
function runOrderForm()
{
		
		var orderForm;
		var orderStep;

		orderForm = new OrderForm();

		orderStep = $('[data-order-step]').data('order-step');


	switch(orderStep)
	{
		
		case 'run': 
		orderForm.run();
		break;

		case 'succes':
		orderForm.success();
		break;

	}

}



/////////////////////////////////////////////////////////////////////////////////////////
// CODE PRINCIPAL                                                                      //
/////////////////////////////////////////////////////////////////////////////////////////

$(function()
{
	$('#notice').delay(3000).fadeOut('slow');

	if(typeof OrderForm != 'undefined' )
	{
		runOrderForm();
	}


})