//Controller for the login page
app.controller('loginCtrl', function($scope,$http,$location){
	$scope.login = {}; //object to hold user login details
	$scope.resMsg = ""; //scope variable to display the login response message
	$scope.userDetails = {}; //object to hold user details after successful login

	//method to log user in
	$scope.loginUser = function() {
		$http.post('bootcamp.mv/api/users/login',$scope.login) //make http request to the endpoint url
		.then(function success(response) { //if the http request was successful
			if (response == "Error from data typed" || response == " E-mail not registered ") { //if any of the error messages is shown
				$scope.resMsg = "Login Failed. Wrong Username Or Password";
			} else {	//if no error messages are shown
				$scope.userDetails = response; //set the user details object with the user's details from the db
				$scope.resMsg = "Login Successful."; //show response message on template
				$location.path('/home'); //relocate the user to appropriate page, home page for now.
			}
			

		}, function error(error) { // if the http request was not successful
			$scope.resMsg = "Could Not Log Into Your Account. Please Try Again."; // show this error message on the template
		});
	}
});