//Controller for the admin users page
app.controller('adminUsersCtrl', function($scope,$location) {

	//an object of users
	$scope.users = [];
	$scope.inviteeEmail = "";
	getUsers();

	
	//method to view user's profile
	$scope.viewUserProfile = function(userId) {
		//go to the profile page
		$location.path('/user_profile').search({userId:userId});
	}

	//method to delete a user
	$scope.deleteUser = function(userId) {
		//get the value of the user id and send it to the delete user api
		alert(userId)

		//make http request to delete the user
		//...
	}

	//method to send invite request
	$scope.inviteUser = function() {
		alert($scope.inviteeEmail);
		
		//make http request to send the invite email
		//...
	}

	//a method to show the user invite modal
	$scope.openUserInviteModal = function() {
		var elem = document.querySelector('.user-invite-modal');
  		var instance = new M.Modal(elem);
  		instance.open();
	}

	//method to get users
	function getUsers() {
		//dummy data to rep user's data got from api
		var users = [
			{userId: 1,firstName: 'John',lastName: 'Golang',email:'mail@mail.com',userType:'user'},
			{userId: 2,firstName: 'Sarah',lastName: 'Erlang',email:'mail@send.com',userType:'user'},
			{userId: 3,firstName: 'Christie',lastName: 'Laravel',email:'mail_12@mail.com',userType:'user'},
			{userId: 4,firstName: 'Mike',lastName: 'Pythons',email:'mail@themail.com',userType:'user'},
			{userId: 5,firstName: 'Java',lastName: 'Haskel',email:'jhask@mail.com',userType:'user'},
		];

		$scope.users = users;
	}
});