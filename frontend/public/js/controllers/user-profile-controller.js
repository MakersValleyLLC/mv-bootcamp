//Controller for the user profile page
app.controller('userProfileCtrl', function($scope){
	
	/*
		An object of the user's details. Should be updated after the real values are
		got from the datab
	*/
	$scope.user = {
		firstName: "John",
		lastName: "Doe",
		email: "mail@mail.com",
		type: "userType"
	};


});