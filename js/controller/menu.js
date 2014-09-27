'use strict'
angular.module("CS")
	.controller("c_menu",
		function($scope) {

			$.get("api/checkLogin.php", function(data) {
				if (data.no != 0) {
					window.location.hash = "/index"
					return
				}
			}, "json")
			
		}
);