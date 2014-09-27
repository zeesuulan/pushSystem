'use strict'
//Chen's System
var CS = angular.module("CS", ['ngRoute'])

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
	when('/logout', {
		template: "<span>正在退出...</span>",
		controller: "c_logout"
	}).
	otherwise({
		redirectTo: '/index'
	})

}).controller("c_logout",
	function($scope, $rootScope) {
		$.cookie("username", null, {
			expires: -1
		})
		$rootScope.group = null
		window.location.hash = "/index"
	})