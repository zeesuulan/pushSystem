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
'use strict'

angular.module("CS").
controller("c_pushsystem",
	function($scope, $upload) {
		$scope.games = []

		$scope.lan = window.LAN
		$scope.imagepath = ""

		$scope.$watch('data.date', function(newValue, oldValue) {
			$scope.dateformat = moment(newValue).format("YYYY-MM-DD HH:m")
			$scope.repush = false
		});

		$scope.repushChanged = function() {
			if ($scope.repush) {
				$scope.dateformat = ""
			}
		}

		////==========上传========
		$scope.onFileSelect = function($files, $type, $ele_id) {
			var file = $files[0];
			if (file.type.indexOf('image') == -1) {
				$scope.error = 'image extension not allowed, please choose a JPEG or PNG file.'
			}
			if (file.size > 2097152) {
				$scope.error = 'File size cannot exceed 2 MB';
			}
			//上传文件
			$scope.upload = $upload.upload({
				url: 'api/doUpload.php',
				data: {
					fname: $scope.fname,
					type: $type
				},
				file: file,
			}).success(function(data, status, headers, config) {
				if (data.no == 0) {
					if ($type == 'image') {
						$scope.imagepath = data.data.filepath
					} else {
						$scope.filepath = data.data.filepath
					}
				} else {
					alert(data.data)
				}
			});
		}
		////==========上传========

		$.get("api/checkLogin.php", function(data) {
			if (data.no != 0) {
				window.location.hash = "/index"
				return
			}
		}, "json")

		$("#addTask").on("submit", function() {
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