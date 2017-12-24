var app = angular.module("mvApp",["ngRoute"]);

app.config(function($routeProvider) {
	$routeProvider
	.when("/", {
		templateUrl: "pages/home.html",
		controller: "homeCtrl"
	})
	.when("/error_404", {
		templateUrl: "pages/error-404.html"
	})
	.otherwise({
		redirectTo: "/error_404"
	})
})