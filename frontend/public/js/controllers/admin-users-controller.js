//Controller for the admin users page
app.controller('adminUsersCtrl', function($scope,$location) {

	
	
	//method to view user's profile
	$scope.viewUserProfile = function(userId) {
		//get the value of the user id and send it to the get user details api
	}

	//method to delete a user
	$scope.deleteUser = function(userId) {
		//get the value of the user id and send it to the delete user api
	}

	//method to send invite request
	$scope.inviteUser = function() {
		//get the value of the user email and send it to the invite email api
	}
});