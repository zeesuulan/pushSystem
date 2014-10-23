'use strict'
//Chen's System
var CS = angular.module("CS", ['ngRoute', "angularFileUpload", "ui.bootstrap.datetimepicker"])
	

CS.config(function($routeProvider) {
	$routeProvider.
	when('/index', {
		templateUrl: 'template/index.html',
		controller: "c_index"
	}).
	when('/menu', {
		templateUrl: 'template/menu.html',
		controller: "c_menu"
	}).
	when('/pushsystem', {
		templateUrl: 'template/pushsystem.html',
		controller: "c_pushsystem"
	}).
	when('/pushpool', {
		templateUrl: 'template/pushpool.html',
		controller: "c_pushpool"
	}).
	when('/pushlog', {
		templateUrl: 'template/pushlog.html',
		controller: "c_pushlog"
	}).
	when('/dl_log', {
		templateUrl: 'template/dl_log.html',
		controller: "c_dl_log"
	}).
	when('/pushing', {
		templateUrl: 'template/pushing.html',
		controller: "c_pushing"
	}).
	when('/user', {
		templateUrl: 'template/user.html',
		controller: "c_user"
	}).
	when('/logout', {
		template: "<span>正在退出...</span>",
		controller: "c_logout"
	}).
	otherwise({
		redirectTo: '/index'
	})

})
	.controller("c_logout",
		function($scope, $rootScope) {
			$.cookie("username", null, {
				expires: -1
			})
			$rootScope.group = null
			window.location.hash = "/index"
		})
	.filter("repush", function() {
		var repush = function(value) {
			return value == 1 ? "是" : "否"
		};
		return repush
	})
	.filter("priority", function() {
		var priority = function(value) {
			return value == 1 ? "优先" : "一般"
		};
		return priority
	})
	.filter("success", function() {
		var success = function(s,t) {
			if(t == 0 || !t) return 0
			return (parseFloat(s/t).toFixed(2) * 100)
		};
		return success
	})
	.filter("country", function() {
		var country = function(value) {
			value = value.toUpperCase()
			if(typeof(COUTNRY_LIST[value])){
				return COUTNRY_LIST[value] + "("+ value + ")"
			}
			return value
		};
		return country
	}).filter("cut", function(){
		var cut = function(value) {
			if(value.length > 10) {
				return value.slice(0, 10) + "..."
			}else{
				return value
			}
		}
		return cut
	})