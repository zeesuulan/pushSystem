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

		$scope.search = function(evt) {
			$.post("api/searchTask.php", {
				key: $(evt.target).val()
			}, function(data) {
				if (data.no == 0) {
					$scope.tasks = data.data.tasks
				} else {
					alert(data.data)
				}
			}, "json")
		}

		$scope.del = function(evt) {
			if (window.confirm("确定删除任务？")) {
				$.post("api/deleteTask.php", {
					id: $(evt.target).attr("tid")
				}, function(data) {
					if (data.no == 0) {
						getFlashGame()
					} else {
						alert(data.data)
					}
				}, "json")
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
			$.post("api/addTask.php",
				$(this).serialize(),
				function(data) {
					if (data.no == 0) {
						getFlashGame()
						$('#addTaskDialog').modal('hide')
					}
					alert(data.data)
				}, "json")
		})

		$("#task-table").on("mouseenter", "img", function() {
			$(this).stop().animate({
				"width": "150px",
				"height": "150px"
			})
		}).on("mouseleave", "img", function() {
			$(this).stop().animate({
				"width": "30px",
				"height": "30px"
			})
		}).on("mouseover", 'span[data-toggle=tooltip]', function() {
			console.log("as")
			$(this).tooltip('show');
		})

		getFlashGame()

		function getFlashGame() {
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
	}
);