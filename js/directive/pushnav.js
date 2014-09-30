CS.directive('pushnav', function() {
	return {
		restrict: 'E',
		template: '<ul class="nav nav-tabs" role="tablist"><li role="presentation" class="{{pushsystemcls}}"><a href="#/pushsystem">推送系统首页</a></li><li role="presentation" class="{{pushpoolcls}}"><a href="#/pushpool">推送池</a></li><li role="presentation" class="{{pushlogcls}}"><a href="#/pushlog">查看推送日志</a></li></ul>',
		replace: true,
		link: function() {}
	};
});