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

function runFormValidation()
{
	var $form;
	var formValidator;

	$form = $('form: not([data-no-validation=true])');

	if($form.length == 1)
	{
		
		formValidator = new FormValidator($form);

		formValidator.run();
	}
}



/////////////////////////////////////////////////////////////////////////////////////////
// CODE PRINCIPAL                                                                      //
/////////////////////////////////////////////////////////////////////////////////////////

$(function()
{
	$('#notice').delay(3000).fadeOut('slow');

	runFormValidation();

	if(typeof OrderForm != 'undefined' )
	{
		runOrderForm();

	}


})