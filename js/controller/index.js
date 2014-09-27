'use strict'
angular.module("CS")
	.controller("c_index",
		function($scope, $rootScope) {

			$scope.showLogin = false

			$.get("api/checkLogin.php", function(data) {
				if (data.no == 0) {
					window.location.hash = "/menu"
				}
				$scope.$apply(function() {
					$scope.showLogin = true
				})
			}, "json")

			$scope.submit = function(ele) {
				$.post("api/login.php",
					$(ele.target).serialize(),
					function(data) {
						if (data.no == 0) {
							$rootScope.group = data.data.group
							$.cookie("username", data.data.username)
							window.location.hash = "/menu"
						} else {
							alert(data.msg)
						}
					}, "json")
			}
		}
);