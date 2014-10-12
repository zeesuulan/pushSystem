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
							$.cookie("username", data.data.username)
							window.location.hash = "/menu"
						} else {
							alert(data.data)
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
'use strict'

angular.module("CS").
controller("c_pushsystem",
	function($scope, $upload, $rootScope) {
		$scope.games = []
		$scope.pushsystemcls = "active"
		$scope.lan = window.LAN
		$scope.imagepath = ""
		$scope.c_all = false
		$scope.l_all = false
		$scope.isAdmin = true

		$.get("api/checkLogin.php", function(data) {
			if (data.no != 0) {
				window.location.hash = "/index"
				return
			} else {
				$scope.isAdmin = (data.data.group == 1)
			}
		}, "json")


		$scope.$watch('data.date', function(newValue, oldValue) {
			$scope.dateformat = moment(newValue).format("YYYY-MM-DD HH:mm")
			$scope.repush = false
		});

		$scope.repushChanged = function() {
			if ($scope.repush) {
				$scope.dateformat = ""
			}
		}

		$scope.filepathChanged = function() {
			if ($scope.filepath.indexOf(".apk") < 0 &&
				$scope.filepath.indexOf(".ipa") < 0) {
				alert("上传文件格式不对")
				$scope.filepath = ""
			}
		}
		$scope.c_all_click = function() {
			angular.forEach($scope.countrys, function(c) {
				c.s = !$scope.c_all;
			});
		}

		$scope.l_all_click = function() {
			angular.forEach($scope.lan, function(l) {
				l.s = !$scope.l_all;
			});
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

		$scope.pushTask = function(evt) {
			var target = $(evt.target),
				tid = target.attr("tid"),
				title = target.attr("title")

			if (window.confirm("确定推送任务『" + title + "』 ？")) {
				$.post("api/pushTask.php", {
					task_id: tid
				}, function(data) {
					alert(data.data)
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

		$("#addTask").on("submit", function() {
			$.post("api/addTask.php",
				$(this).serialize(),
				function(data) {
					if (data.no == 0) {
						getFlashGame()
						$('#addTaskDialog').modal('hide').find("input").val("").find("textarea").val("").find("img").attr("src", "")
						$scope.imagepath = ""
						$scope.filepath = ""
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
			$(this).tooltip('show');
		})

		getFlashGame()

		function getFlashGame() {
			$.get("api/getFlashGames.php", {
				repush: 0
			}, function(data) {
				if (data.no == 0) {
					$scope.$apply(function() {
						$scope.games = data.data.games
						$scope.priority_tasks = data.data.priority_tasks
						$scope.nomarl_tasks = data.data.nomarl_tasks
						$scope.countrys = data.data.countrys
					})
					return
				}
			}, "json")
		}
	}
).controller("c_pushpool",
	function($scope) {
		$scope.pushpoolcls = "active"

		getTasks()

		function getTasks() {
			$.get("api/getRepushTask.php", function(data) {
				if (data.no == 0) {
					$scope.$apply(function() {
						$scope.repush_tasks = data.data.repush_tasks
					})
				}
			}, "json")
		}

		$("#single-log-table").on("mouseenter", "img", function() {
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
			$(this).tooltip('show');
		})

		$scope.$watch('data.date', function(newValue, oldValue) {
			$scope.dateformat = moment(newValue).format("HH")
		});

		$scope.stick = function(evt) {

		}

		$scope.hour = 0

		$scope.addHour = function() {
			$.post("api/setTimeConfig.php", {
				hour: $scope.hour,
				type: "add"
			}, function(data) {
				if (data.no != 0) {
					alert(data.data)
				} else {
					$scope.$apply(function() {
						$scope.hours = data.data.hour.split("")
					})
				}
			}, "json")
		}

		$scope.deleteHour = function(evt){
			var t = $(evt.target)
			$.post("api/setTimeConfig.php", {
				hour: t.attr("hid"),
				type: "del"
			}, function(data) {
				if (data.no != 0) {
					alert(data.data)
				} else {
					$scope.$apply(function() {
						$scope.hours = data.data.hour.split("")
					})
				}
			}, "json")
		}

		$.get("api/getTimeConfig.php", function(data) {
			if (data.no != 0) {
				alert(data.data)
			} else {
				$scope.$apply(function() {
					$scope.hours = data.data.hour.split("")
				})
			}
		}, 'json')
	}
).controller("c_pushlog",
	function($scope) {
		$scope.pushlogcls = "active"

		getLogs()

		function getLogs() {
			$.get("api/getLogs.php", function(data) {
				if (data.no == 0) {
					$scope.$apply(function() {
						$scope.singleLogs = data.data.singleLogs
						$scope.repushlogs = data.data.repushlogs
					})
				}
			}, "json")
		}
	}
).controller("c_dl_log",
	function($scope) {
		$scope.dl_log = "active"

		getLogs()

		function getLogs() {
			$.get("api/getDownloadLogs.php", function(data) {
				if (data.no == 0) {
					$scope.$apply(function() {
						$scope.dl_logs = data.data.download_log
						$scope.totle = data.data.totle
					})
				}
			}, "json")
		}
	}
)
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