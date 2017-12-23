var app = angular.module("mvApp",["ngRoute"]);

app.config(function($routeProvider) {
	$routeProvider
	.when("/", {
		templateUrl: "pages/home.html"
	});
})