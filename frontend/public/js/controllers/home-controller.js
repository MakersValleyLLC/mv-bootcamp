//Controller for the home page
app.controller('homeCtrl', function($scope){
	
	//Get the value of this year and send it to template
	const currentYear = new Date().getFullYear();
	$scope.thisYear = currentYear;
});