'use strict'

angular.module("CS")
	.controller("c_pushsystem",
		function($scope, $rootScope) {
			$scope.list = []

			$.get("api/checkLogin.php", function(data) {
				if (data.no != 0) {
					window.location.hash = "/index"
					return
				}
			}, "json")

			$.get("api/getFlashGames.php", function(data) {
				if (data.no == 0) {
					$scope.$apply(function(){
						$scope.list = data.data.games
					})
					return
				}
			}, "json")
			
		}
);