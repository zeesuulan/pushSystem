<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Push System</title>
    <link rel="stylesheet" href="css/css.css">
</head>

<body>
	<ng-view></ng-view>
</body>
<script src="js/lib/lib.js"></script>
<script src="js/controller/c.js"></script>
<script src="js/directive/d.js"></script>
<script src="js/service/s.js"></script>
<script>
	$(function() {
	    angular.bootstrap(document, ['CS'])
	})
</script>
</html>
