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
			// if ($scope.filepath.indexOf(".apk") < 0 &&
			// 	$scope.filepath.indexOf(".ipa") < 0) {
			// 	alert("上传文件格式不对")
			// 	$scope.filepath = ""
			// }
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

		var canpush = true
		$scope.pushTask = function(evt) {
			var target = $(evt.target),
				tid = target.attr("tid"),
				title = target.attr("title")

			if (!canpush) {
				alert("有任务正在推送中，稍后再操作");
				return;
			}
			if (window.confirm("确定推送任务『" + title + "』 ？")) {
				canpush = false
				$.post("api/pushTask.php", {
					task_id: tid
				}, function(data) {
					if (typeof(data.data.result) != "object") {
						alert(data.data.result)
					} else {
						var res = data.data.result,
							successNumber = res.success,
							totalNumber = res.total

						alert("共向设备推送消息" + totalNumber + "条，成功推送" + successNumber + "条，失败" + (totalNumber - successNumber) + "条!")
						getFlashGame()
					}
					canpush = true
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
			$.post("api/stickTask.php", {
				id: $(evt.target).attr("tid")
			}, function(data) {
				if (data.no == 0) {
					getTasks()
				} else {
					alert(data.data)
				}
			}, "json")
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

		$scope.deleteHour = function(evt) {
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
).
controller("c_pushing",
	function($scope) {
		$scope.pushing = "active"
		getStaus()

		function getStaus() {
			$.get("cron/push_lock.js?" + Math.random(), function(data) {
				if (data != "stop") {
					setTimeout(function() {
						getStaus()
					}, 1000)
				} else {
					data = ""
				}

				$scope.$apply(function() {
					$scope.pushTxt = data
				})
			}, "html")
		}

		$scope.stopTask = function(argument) {
			$.get("api/stopTask.php", function(data) {
				alert(data.data)
			}, "json");
		}
	}
).
controller("c_dl_log",
	function($scope) {
		$scope.dl_log = "active"

		getLogs()

		function getLogs() {
			$.get("api/getDownloadLogs.php", function(data) {
				if (data.no == 0) {
					$scope.$apply(function() {
						$scope.dl_logs = data.data.download_log
						$scope.total = data.data.total
					})
				}
			}, "json")
		}
	}
)