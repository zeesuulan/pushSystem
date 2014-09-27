'use strict'

angular.module("CS")
	.controller("c_pushsystem",
		function($scope, $rootScope) {
			$scope.games = []

			$scope.lan = window.LAN

			$.get("api/checkLogin.php", function(data) {
				if (data.no != 0) {
					window.location.hash = "/index"
					return
				}
			}, "json")

			$("#addTask").on("submit", function(){
				console.log($(this).serialize())
			})

			$.get("api/getFlashGames.php", function(data) {
				if (data.no == 0) {
					$scope.$apply(function() {
						$scope.games = data.data.games
						$scope.tasks = data.data.tasks
						$scope.countrys = data.data.countrys
					})
					return
				}
			}, "json")

		}
);