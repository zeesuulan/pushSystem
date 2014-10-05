'use strict'
angular.module("CS")
	.controller("c_user",
		function($scope, $rootScope) {

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

			$scope.submit = function(evt) {
				if (evt.target) {
					$.post("api/adduser.php",
						$(evt.target).serialize(),
						function(data) {
							if (data.no == 0) {
								$(evt.target).find("input").val("")
								getUsers()
							} else {
								alert(data.data)
							}
						}, "json")
				}
			}

			$scope.delUser = function(evt) {
				var btn = $(evt.target)
				if (window.confirm("确认要删除?")) {
					$.post("api/del.php", {
						type: "user",
						id: btn.attr("uid"),
					}, function(data) {
						if (data.no == 0) {
							getUsers()
						} else {
							alert(data.data)
						}
					}, "json");
				}
			}

			getUsers()

			function getUsers() {
				$.get("api/getUsers.php", function(data) {
					if (data.no == 0) {
						$scope.$apply(function() {
							$scope.users = data.data.users
						})
					}
				}, "json")
			}

		});