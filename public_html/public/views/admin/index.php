<!doctype html>
<html ng-app="adminApp" class="full">
<head>
    <meta charset="utf-8"/>
    <meta name="generator" content="Bootply"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <title>Cyclone Music Space Admin</title>
    <link rel="stylesheet" href="../../vendor/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="../../vendor/bootstrap/dist/css/font-awesome.css">
    <link rel="stylesheet" href="../../vendor/angular-xeditable/css/xeditable.css">
    <link rel="stylesheet" href="../../vendor/textAngular-master/src/textAngular.css">
</head>
<body>
<header>
    <nav class="navbar navbar-inverse" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html">Admin</a>
        </div>
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li><a href="#/comments" is-active-nav><span class="fa fa-envelope-o"></span> Отзывы </a></li>
                <li><a href="#/blog" is-active-nav><span class="fa fa-newspaper-o"></span> Блог </a></li>
            </ul>
        </div>
    </nav>
</header>
<div class="container" ng-view></div>

<footer id="footer" class="footer">
</footer>

<script src="../../vendor/jquery/jquery.js"></script>
<script src="../../vendor/angular/angular.js"></script>
<script src="../../vendor/angular-route/angular-route.js"></script>
<script src="../../vendor/angular-resource/angular-resource.js"></script>
<script src="../../vendor/angular-xeditable/js/xeditable.min.js"></script>
<script src="../../vendor/ng-flow/dist/ng-flow-standalone.js"></script>
<script src="../../vendor/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../../vendor/textAngular-master/dist/textAngular.min.js"></script>
<script src="../../vendor/textAngular-master/dist/textAngular-sanitize.min.js"></script>
<script src="../../vendor/textAngular-master/dist/textAngular-rangy.min.js"></script>
<script src="../../js/admin.js"></script>
<script src="../../js/controllers/admin/ReviewsController.js"></script>
<script src="../../js/services/reviewsService.js"></script>
<script src="../../js/controllers/admin/BlogController.js"></script>
<script src="../../js/services/blogService.js"></script>
</body>
</html>
