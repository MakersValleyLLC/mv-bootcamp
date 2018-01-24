//Controller for the user profile page
app.controller('userProfileCtrl', function($scope,$location){
	
	/*
		An object of the user's details. Should be updated after the real values are
		got from the datab
	*/

	var urlParams = $location.search();
	alert('user id is ' + urlParams.userId);

	$scope.user = {
		firstName: "John",
		lastName: "Doe",
		email: "mail@mail.com",
		type: "userType"
	};


});