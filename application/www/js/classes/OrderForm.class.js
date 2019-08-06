'use-strict';


var OrderForm = function()
{
	this->$form 			= $('#order-form');
	this->$meal 			= $('#meal');
	this->$mealDetails  	= $('#meal-details');
	this->$orderSummary 	= $('#order-summary');
	this->$validateOrder 	= $('#validate-order');

	this->basketSession 	=  new BasketSession();
} 

OrderForm.prototype.onAjaxClickValidateOrder = function(result)
{

};

OrderForm.prototype.onAjaxRefreshOrderSummary = function(basketViewHtml)
{

};