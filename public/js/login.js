//var myApp = angular.module('myApp', ['ngRoute']);
var myApp = angular.module('myApp', []);
myApp.controller('loginController', function ($scope, $http, $window) {
	$scope.fail_message = false;
	$scope.submit = function () {
		$http.post('login', $scope.formData).then(function (response) {
			if (response.data.isError === true) {
				$scope.fail_message = true;
			} else {
				$window.location.href = "welcome";
			}
		});
	};
});
myApp.controller('registerController', function ($scope, $http, $window) {
	$scope.submit = function () {
		$http.post('register', $scope.formData).then(function (response) {
			$window.location.href = "welcome";
		});
	};
});
myApp.directive("compareTo", function ()
{
	return {
		require: "ngModel",
		scope:
				{
					confirmPassword: "=compareTo"
				},
		link: function (scope, element, attributes, modelVal)
		{
			modelVal.$validators.compareTo = function (val)
			{
				return val == scope.confirmPassword;
			};
			scope.$watch("confirmPassword", function ()
			{
				modelVal.$validate();
			});
		}
	};
});
//myApp.controller("sidebarController", function ($scope) {
//
//});
//myApp.controller("contentController", function ($scope) {
//
//});
//myApp.config(function ($routeProvider,$locationProvider) {
//	$routeProvider.when("/", {
//		templateUrl: "/login",
//	}).when("/register", {
//		templateUrl: "/register",
//	});
//	
//});