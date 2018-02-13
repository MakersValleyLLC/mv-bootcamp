var app = angular.module("mvApp",["ngRoute"]);

app.config(function($routeProvider) {
	$routeProvider
	.when("/", {
		templateUrl: "pages/home.html",
		controller: "homeCtrl"
	})
	.when("/login", {
		templateUrl: "pages/login.html",
		controller: "loginCtrl"
	})
	.when("/forgotpassword", {
		templateUrl: "pages/forgotpassword.html",
		controller: "forgotCtrl"
	})
	.when("/signup", {
		templateUrl: "pages/signup.html",
		controller: "signupCtrl"
	})
	.when("/admin_users", {
		templateUrl: "pages/admin-users.html",
		controller: "adminUsersCtrl"
	})
	.when("/user_profile", {
		templateUrl: "pages/user-profile.html",
		controller: "userProfileCtrl"
	})
	.when("/error_404", {
		templateUrl: "pages/error-404.html"
	})
	.otherwise({
		redirectTo: "/error_404"
	})
})
