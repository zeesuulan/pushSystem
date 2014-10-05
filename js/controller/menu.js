'use strict'
angular.module("CS")
	.controller("c_menu",
		function($scope) {

			$.get("api/checkLogin.php", function(data) {
				if (data.no == 0) {
					$scope.$apply(function() {
						$scope.isAdmin = data.data.group == 1

						if (!$scope.isAdmin) {
							window.location.hash = "/menu"
						}
					})
				}
			}, "json")

		}
);