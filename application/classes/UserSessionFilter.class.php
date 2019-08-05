<?php 

/**
 * 
 */
class UserSessionFilter implements InterceptingFilter
{
	
	public function run(http $http, array $queryFields, array $formFields)
	{

		return 
		[
			'userSession' => new UserSession()
		];

	}
}