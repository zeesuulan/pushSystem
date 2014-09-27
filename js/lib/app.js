'use strict'
//Chen's System
var CS = angular.module("CS", ['ngRoute'])

CS.config(function($routeProvider) {
	$routeProvider.
	when('/index', {
		templateUrl: 'template/index.html',
		controller: "c_index"
	}).
	otherwise({
		redirectTo: '/index'
	});
})