<!doctype html>
<html>
    <head>
        <title>Load content on Page scroll with AngularJS and PHP</title>
        <!-- CSS -->
        <link href='style.css' rel='stylesheet' type='text/css'>
        
        <!-- Script -->
        <script src="jquery-3.3.1.min.js"></script>
        <script src="angular.min.js"></script>
        <script src="ng-infinite-scroll.min.js"></script>

        <script src="script.js"></script>

    </head>
    <body ng-app='myapp' ng-controller='fetchCtrl' >
        <div class="container" infinite-scroll="getPosts()"   >

            <div class="post" ng-repeat='post in posts'>
                <h1 ng-bind='post.title'></h1>
                <p ng-bind='post.shortcontent'></p>
                <a ng-href="{{ post.link }}" class="more" target="_blank">More</a>
            </div>

            <div ng-show='loading' class='loading'>Loading...</div>
        </div>

        
    </body>
</html>
