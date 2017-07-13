<!DOCTYPE html>
<html>
	<head lang="en">
		<meta charset="utf-8">
		<title>AngularJS Routing</title>

	</head>
	<body>

		<div ng-app="mainApp">
			<ng-view></ng-view>
		</div>

		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.28/angular.min.js"></script>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.28//angular-route.min.js"></script>
		<script >
					var mainApp = angular.module("mainApp", ['ngRoute']);

					mainApp.config(function ($routeProvider) {
						$routeProvider
								.when('/home', {
									templateUrl: 'home_url',
									controller: 'StudentController'
								})
								.when('/viewStudents', {
									templateUrl: 'viewStudents',
									controller: 'StudentController'
								})
								.otherwise({
									redirectTo: '/home'
								});
					});

					mainApp.controller('StudentController', function ($scope) {
						$scope.students = [
							{name: 'Mark Waugh', city: 'New York'},
							{name: 'Steve Jonathan', city: 'London'},
							{name: 'John Marcus', city: 'Paris'}
						];

						$scope.message = "Click on the hyper link to view the students list.";
					});
		</script>
	</body>
</html>