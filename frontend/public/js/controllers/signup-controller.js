//Controller for the signup page
app.controller('signupCtrl', function($scope,$http,$location){
	$scope.signup = {};
	$scope.resMsg = "";

	$scope.signupUser = function() {
		$http.post('bootcamp.mv/api/users/create/user',$scope.signup).then(function success(response) {
			if (response == "400 - error json") {
				$scope.resMsg = "Could Not Sign Up";
			} else if (response == "User Created") {
				$scope.resMsg = "Signup Successful";
			}
		}, function error(error) {
			$scope.resMsg = "Could Not Sign Up. Please Try Again.";
		})
	}
});